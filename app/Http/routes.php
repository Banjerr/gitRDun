<?php

use GitRDun\Task;
use Illuminate\Http\Request;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;
use GrahamCampbell\GitHub\Facades\GitHub;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Display Home
 */
Route::get('/', function () {

    if (Auth::check()) {
        // The user is logged in...
        $user = Auth::user();
        $data = array(
            'fullname' => $user->full_name,
            'nickname' => $user->nickname,
            'avatar'   => $user->avatar,
        );
        return view('home')->with($data);
    }
    else
    {
        return view('home');
    }
});

/**
 * Display Dashboard
 */
Route::get('/dashboard', function () {

    if (Auth::check()) {
        // The user is logged in...
        $user = Auth::user();

        // Get their info
        $data = array(
            'fullname' => $user->full_name,
            'nickname' => $user->nickname,
            'avatar'   => $user->avatar,
        );

        // Get the repos for the authenticated user
        $repos = GitHub::user()->repositories($user->nickname);

        return view('dashboard')->with([$data, $repos]);
    }
    else
    {
        return view('home');
    }
});

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});

/**
 * Get the code for their oAuth token
 */
Route::get('github/authorize', function() {
    return SocialAuth::authorize('github');
});

/**
 * Get the code for their oAuth token
 */
Route::get('github/login', function() {

    SocialAuth::login('github', function( $user, $userDetails ) {
        $user->email = $userDetails->email;
        $user->nickname = $userDetails->nickname;
        $user->full_name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;
        $user->save();
    });

    // Current user is now available via Auth facade
    $user = Auth::user();

    $data = array(
        'fullname' => $user->full_name,
        'nickname' => $user->nickname,
        'avatar'   => $user->avatar,
    );

    // Get the repos for the authenticated user
    $repos = GitHub::user()->repositories($user->nickname);

    return view('dashboard')->with([$data, $repos]);
});

/**
 * For SSL
 */
Route::get('github/authorize', function() {
    return SocialAuth::authorize('github');
});
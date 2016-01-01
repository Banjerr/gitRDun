<?php

use GitRDun\Task;
use Illuminate\Http\Request;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;
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
 * Display All Tasks
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
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

    return redirect('/');
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
        $user->save();
    });

    // Current user is now available via Auth facade
    $user = Auth::user();

    return 'Howdy there, ' . $user;
});
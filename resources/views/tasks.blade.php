@extends('layouts.gitrdun')

@section('content')
<img style="display:block; text-align:center; margin:0 auto; width:80%; max-width: 830px;" src="/images/gunShowCat.png">
<h1 style="font-family:'Ruda', sans-serif;text-align:center;">Git R Dun</h1>
<h2 style="font-family:'Ruda', sans-serif;text-align:center;">- Coming Soon -</h2>
<h2 style="font-family:'Ruda', sans-serif;text-align:center;"><a class="icon-gunShowCat" style="text-decoration: none;" target="_blank" href="//github.com/banjerr/gitrdun">GitHub</a></h2>

<!-- TODO set up in the right way -->
<a style="display:block;text-decoration:none; font-size:18px; font-family:'Ruda', sans-serif;text-align:center;" href="https://github.com/login/oauth/authorize/?client_id=37bb75932ff23a375233">Click here to get started</a>

@if( ! empty( $code ) )
    // echo get code
    <p>{{$code}}</p>
@endif

<!-- Create Task Form... -->

<!-- Current Tasks -->
@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>

                        <!-- Delete Button -->
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button>Delete Task</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
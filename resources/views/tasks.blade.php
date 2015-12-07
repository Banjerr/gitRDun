@extends('layouts.gitrdun')

@section('content')
<section class="comingSoon">
    <img alt="GunShowOctoCat" src="images/gunShowCat.png">
    <h1>Git R Dun</h1>
    <h2>- Coming Soon -</h2>
    <h2><a class="icon-gunShowCat" target="_blank" href="//github.com/banjerr/gitrdun">GitHub</a></h2>
    <!-- TODO set up in the right way -->
    <a class="authenticateYourself" href="/github/login">Click here to get started</a>
</section><!--.comingSoon-->

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
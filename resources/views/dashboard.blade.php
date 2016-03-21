@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy {{ $data['nickname'] }}</h2>
    <img class="userAvatar" src="{{ $data['avatar'] }}" alt="{{ $data['nickname'] }}">

    @if ($repos)
        <?php
        foreach ($repos as $repo)
        {
            echo '<pre>';
            print_r($repo);
            echo '</pre>';
        }
        ?>
    @else
        <p>No repos yet</p>
    @endif
@endsection
@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy {{ $data['nickname'] }}</h2>
    <img class="userAvatar" src="{{ $data['avatar'] }}" alt="{{ $data['nickname'] }}">

    <?php dd($repos); ?>

    {{--@if ($repos)--}}
        {{--<?php--}}
        {{--foreach ($repos as $repo)--}}
        {{--{--}}
            {{--while ($repo['full_name'])--}}
            {{--{--}}
                {{--print_r($repo);--}}
            {{--}--}}
        {{--}--}}
        {{--?>--}}
    {{--@else--}}
        {{--<p>No repos yet</p>--}}
    {{--@endif--}}
@endsection
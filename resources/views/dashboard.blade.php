@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy {{ $nickname }}</h2>
    <img class="userAvatar" src="{{ $avatar }}" alt="{{ $nickname }}">

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
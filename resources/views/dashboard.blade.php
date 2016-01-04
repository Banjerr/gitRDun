@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy <?php echo $nickname; ?></h2>
    <img class="userAvatar" src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
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
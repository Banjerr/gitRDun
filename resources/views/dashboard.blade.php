@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy <?php echo $nickname; ?></h2>
    <img class="userAvatar" src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
    <?php
    // if has_issues is true add it to the array
    foreach($repos as $repo)
    {
        $withIssues = array();
        dd($repo);
        while($repo['has_issues'] == true)
        {
            echo $repo{full_name];
            $withIssues['name'] = $repo['full_name'];
            //array_push( $withIssues, $this );
        }
    }

    print_r($withIssues);
    ?>
@endsection
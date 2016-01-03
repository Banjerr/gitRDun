@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy <?php echo $nickname; ?></h2>
    <img class="userAvatar" src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
    <?php
    // if has_issues is true add it to the array
    foreach($repos as $repo)
    {
        $withIssues = array();
        while($repo['has_issues'] == true)
        {
            $withIssues[] = $repo['name'];
            //array_push( $withIssues, $this );
        }
    }
    ?>
@endsection
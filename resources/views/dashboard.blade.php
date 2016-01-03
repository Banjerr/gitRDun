@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy <?php echo $nickname; ?></h2>
    <img class="userAvatar" src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
    <?php
    // if has_issues is true add it to the array
    echo $repos;
    ?>
@endsection
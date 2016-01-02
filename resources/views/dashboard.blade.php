@extends('layouts.gitrdun')

@section('content')
    <h2>Howdy <?php echo $nickname; ?></h2>
    <img src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
@endsection
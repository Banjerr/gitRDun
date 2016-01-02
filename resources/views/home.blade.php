@extends('layouts.gitrdun')

@section('content')
<section class="comingSoon">
    <img alt="GunShowOctoCat" src="images/gunShowCat.png">
    <h1>Git R Dun</h1>
    <h2>- Coming Soon -</h2>
    <h2><a class="icon-gunShowCat" target="_blank" href="//github.com/banjerr/gitrdun">GitHub</a></h2>
    <!-- TODO set up in the right way -->
    @if (Auth::check())
        <h2>Howdy <?php echo $nickname; ?></h2>
        <img class="userAvatar" src="<?php echo $avatar; ?>" alt="<?php echo $nickname; ?>">
        <p>Check out the <a href="/dashboard">Dashboard</a></p>
    @else
        <a class="authenticateYourself" href="/github/authorize">Click here to get started</a>
    @endif

</section><!--.comingSoon-->
@endsection
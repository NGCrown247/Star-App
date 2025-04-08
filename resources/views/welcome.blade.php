<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  @extends('layouts.app')
</head>
<body>


<section class="hero-section" x-data="userApp">
@include('layouts.header')

<div class="hero">

<div class="star-hero-img-box">

@include('layouts.vision-svg')

</div>

<div class="star-hero-content">
  <h1>Every Action Count </h1>
  <p>We've revolutionized the way you engage with online content, offering multiple avenues for you to turn your
  time into income effortlessly!</p>

  @guest
  <div class="hero-action-box">
  <button type="button" class="btn get-started shadow"  @click=" openRegister()">Get Started</button>
  <button type="button" class="read-more shadow">Read More</button>
  </div>
  @endguest

</div>
</div>
</section>

<div class="my-container ">

<h4 class="promise-text text-center mt-5">Our Promise</h4>


@include('layouts.about-us')


{{-- @include('layouts.caruosel') --}}


@include('layouts.plan-card')



@include('auth.register')
@include('auth.login')

</div>
<!-- IMAGES SLIDE -->


<!-- PLAN SECTION -->






<footer class="star-footer">

  @include('layouts.footer')
  @include('layouts.social-icons')

</footer>


</body>
</html>

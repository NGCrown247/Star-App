<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
</head>
<body>


<section class="hero-section" x-data="userApp">
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="hero">

<div class="star-hero-img-box">

<?php echo $__env->make('layouts.vision-svg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<div class="star-hero-content">
  <h1>Every Action Count </h1>
  <p>We've revolutionized the way you engage with online content, offering multiple avenues for you to turn your
  time into income effortlessly!</p>

  <?php if(auth()->guard()->guest()): ?>
  <div class="hero-action-box">
  <button type="button" class="btn get-started shadow"  @click=" openRegister()">Get Started</button>
  <button type="button" class="read-more shadow">Read More</button>
  </div>
  <?php endif; ?>

</div>
</div>
</section>

<div class="my-container ">

<h4 class="promise-text text-center mt-5">Our Promise</h4>


<?php echo $__env->make('layouts.about-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php echo $__env->make('layouts.plan-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->make('auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<!-- IMAGES SLIDE -->


<!-- PLAN SECTION -->






<footer class="star-footer">

  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('layouts.social-icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</footer>


</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crown/Desktop/star/resources/views/welcome.blade.php ENDPATH**/ ?>
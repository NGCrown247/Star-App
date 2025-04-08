<div x-data="userApp" class="offcanvas offcanvas-start star-sidebar" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header star-sidebar-header d-flex align-items-center">
    <?php echo $__env->make('layouts.logo-svg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('component.close-sidebar-btn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

  <div class="offcanvas-body">

    <?php if(auth()->guard()->guest()): ?>

    <ul class="navbar-nav star-sidebar-ul" id="accordionFlushExample">
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">
          <i class='bx bx-home-heart' ></i>Blog</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">
          <i class='bx bx-info-square'></i>About</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">
          <i class='bx bx-book-reader'></i>How it works</a>
      </li>

      <li class="star-nav-item">
        <a class="star-nav-link" href="#">
          <i class='bx bx-comment-check'></i>Reviews</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">
          <i class='bx bx-support'></i>Contact</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#" @click="openRegister()">
          <i class='bx bxs-user-plus'></i>Register</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#" @click="openLogin()">
          <i class='bx bx-log-in-circle' ></i>
          Login</a>
      </li>

      </ul>
      <?php endif; ?>





<?php if(auth()->guard()->check()): ?>
    <!-- AUTHENTICATED -->
    <ul class="navbar-nav star-sidebar-ul accordion accordion-flush" id="accordionFlushExample">

      <li class="nav-item star-nav-item">
        <a class="nav-link star-nav-link" href="<?php echo e(route('users.dashboard')); ?>">
          <i class='bx bxl-windows'></i>Dashboard
        </a>
      </li>

      <li class="nav-item star-nav-item">
        <a class="nav-link star-nav-link" href="<?php echo e(route('user.notification')); ?>">
          <i class='bx bxs-bell'></i>Notifications
        </a>
      </li>

  <!-- Activities Dropdown -->
<li class="nav-item star-nav-item">
  <a class="nav-link star-nav-link d-flex justify-content-between align-items-center collapsed"
     data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
    <i class='bx bxs-bookmark-alt-minus'></i> Activities
    <i class="bi bi-chevron-down toggle-icon"></i>
  </a>
  <div id="flush-collapseOne" class="accordion-collapse collapse p-0 mt-2 star-sidebar-dropdown" data-bs-parent="#accordionFlushExample">
    <ul class="nav flex-column">
      <li class="nav-item"><a href="<?php echo e(route('play.video')); ?>" class="nav-link star-nav-dropdown-link">Play Video</a></li>
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Play Music</a></li>
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Countdown Engagement</a></li>
    </ul>
  </div>
</li>

      <!-- Recruits -->
      <li class="nav-item star-nav-item">
        <a class="nav-link star-nav-link" href="">
          <i class='bx bxs-group'></i> Referrals
        </a>
      </li>


       <!-- Withdrawal Dropdown -->
<li class="nav-item star-nav-item">
  <a class="nav-link star-nav-link d-flex justify-content-between align-items-center collapsed"
     data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo">
    <i class='bx bxs-bookmark-alt-minus'></i> Withdrawal
    <i class="bi bi-chevron-down toggle-icon"></i>
  </a>
  <div id="flush-collapsetwo" class="accordion-collapse collapse p-0 mt-2 star-sidebar-dropdown" data-bs-parent="#accordionFlushExample">
    <ul class="nav flex-column">
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Withdraw</a></li>
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Transactions</a></li>
    </ul>
  </div>
</li>

 <!-- Upgrade Dropdown -->
<li class="nav-item star-nav-item">
  <a class="nav-link star-nav-link d-flex justify-content-between align-items-center collapsed"
     data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapsetwo">
    <i class='bx bxs-bookmark-alt-minus'></i> Upgrade
    <i class="bi bi-chevron-down toggle-icon"></i>
  </a>
  <div id="flush-collapse3" class="accordion-collapse collapse p-0 mt-2 star-sidebar-dropdown" data-bs-parent="#accordionFlushExample">
    <ul class="nav flex-column">
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Bronze</a></li>
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Silver</a></li>
      <li class="nav-item"><a href="#" class="nav-link star-nav-dropdown-link">Gold</a></li>
    </ul>
  </div>
</li>


<?php endif; ?>


    <?php echo $__env->make('layouts.social-icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>
<?php /**PATH /home/crown/Desktop/star/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>
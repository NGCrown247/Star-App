
<div class="w-100" x-data="userApp">

<nav  class="star-navbar w-100  align-items-center">

<?php echo $__env->make('layouts.logo-svg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


   <?php if(auth()->guard()->guest()): ?>

    <ul class="star-ul gap-4 align-items-center w-100 justify-content-center">
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">Blog</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">About</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">How it works</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">Reviews</a>
      </li>
      <li class="star-nav-item">
        <a class="star-nav-link" href="#">Contact</a>
      </li>

      </ul>


<div class="star-action-box gap-3">
  <button class="star-action-btn star-nav-regiester-btn"  @click="openRegister()">Register</button>
  <button class="star-action-btn star-nav-login-btn"  @click="openLogin()">Login</button>
  </div>

  <?php endif; ?>


<?php if(auth()->guard()->check()): ?>
<ul class="star-ul gap-4 align-items-center w-100 justify-content-center" id="accordionFlushExample">
  <li class="star-nav-item">
    <a class="star-nav-link" href="<?php echo e(route('users.dashboard')); ?>">Dashboard</a>
  </li>
  <li class="star-nav-item">
    <a class="star-nav-link" href="#">Notification</a>
  </li>


  <li class="star-nav-item">
    <a class="star-nav-link accordion-button collapsed"
       data-bs-toggle="collapse"
       data-bs-target="#dropdown-menu1"
       aria-expanded="false"
       aria-controls="dropdown-menu1"
       href="#">
      Tasks <i class="bi bi-chevron-down star-dropdown-toggle"></i>
    </a>
    <ul class="accordion-collapse collapse my-navdrop" id="dropdown-menu1" data-bs-parent="#accordionFlushExample">
      <li><a class="dropdown-item" href="<?php echo e(route('play.video')); ?>">Play Videos</a></li>
      <li><a class="dropdown-item" href="#">Play Music</a></li>
      <li><a class="dropdown-item" href="#">CountDown Engagement</a></li>
    </ul>
  </li>


  <li class="star-nav-item">
    <a class="star-nav-link" href="#">Referrals</a>
  </li>
  <li class="star-nav-item">
    <a class="star-nav-link" href="#">Withdrawal</a>
  </li>


  <li class="star-nav-item">
    <a class="star-nav-link accordion-button collapsed" type="button"
       data-bs-toggle="collapse"
       data-bs-target="#dropdown-menu2"
       aria-expanded="false"
       aria-controls="dropdown-menu2"
       href="#">
      Upgrade <i class="bi bi-chevron-down star-dropdown-toggle"></i>
    </a>
    <ul class="accordion-collapse collapse my-navdrop" id="dropdown-menu2" data-bs-parent="#accordionFlushExample">
      <li><a class="dropdown-item" href="#">Bronze</a></li>
      <li><a class="dropdown-item" href="#">Silver</a></li>
      <li><a class="dropdown-item" href="#">Gold</a></li>
    </ul>
  </li>

  </ul>



  <div class="my-user-row">
    <div class="top-earners-box">
      <a href="<?php echo e(route('users.topEarners')); ?>">
        <h5>Top Earners</h5>
      </a>
    </div>
    <a class="notification-link" href="<?php echo e(route('user.notification')); ?>">
    <div class="my-user-notification">
      <i class='bx bxs-bell'></i>
    </div>
  </a>


    <div class="my-user-user-point">

      <a href=""
      class=""
      type="button"
      data-bs-toggle="dropdown"
      aria-expanded="false">

      <div class="my-user-img-box">
        <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="">
      </div>
    </a>


        

    <div class="dropdown-menu my-header-profile-menu">

      <div class="my-header-user-profile">
        <div class="my-user-img-box">
          <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="">
        </div>
        <h5>Prince</h5>
        <p>prince@gmail.com</p>

        <div class="my-header-user-profile-dropdown">



      <li><a class="dropdown-item" href="#">
        <i class='bx bxs-cog'></i>Withdrawal</a>
      </li>

      <li>
        <a class="dropdown-item" href="#">
        <i class='bx bx-user'>
          </i>Profile</a></li>
          <div class="divider"></div>

      <li><a class="dropdown-item" href="#">
        <i class='bx bxs-cog'></i>Settings</a>
      </li>

      <div class="divider"></div>
      <li><a class="dropdown-item"  href="#"  @click="handleLogout()">
        <i class='bx bx-log-out-circle'></i>Logout</a></li>

        </div>
      </div>
    </div>




      <div class="my-user-balance  gap-1">
        <h5>BALANCE</h5>
        <div class="my-user-points">
          <?php echo $__env->make('layouts.icon-svg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <h4>1000</h4>
        </div>

      </div>
    </div>



  </div>
<?php endif; ?>

<button class="star-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
<i class='bx bx-menu-alt-right' ></i>
</button>


</nav>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php /**PATH /home/crown/Desktop/star/resources/views/layouts/header.blade.php ENDPATH**/ ?>
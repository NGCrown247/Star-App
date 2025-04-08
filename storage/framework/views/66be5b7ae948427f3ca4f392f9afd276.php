<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
</head>
<body>

<!-- <?php if(!Auth::check() || (Auth::user()->role !== 'user' && Auth::user()->role !== 'admin')): ?>
    <?php
        header("Location: " . route('welcome')); // Replace 'home' with the correct route
        exit();
    ?>
<?php endif; ?> -->


  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<div class="my-container">

  <div class=" my-dash-row gap-3" x-show="showDashboard">

    <div class="my-dash-conent d-flex gap-3">

      <div class="my-dash-card d-flex  w-100 shadow rounded">
        <div class="my-dash-card-items">
        <h5 class="card-header w-100">Total Balance</h5>
        <h4>5000</h4>

      <p>Accumulated Points</p>

      </div>

      <div class="my-dash-card-icon-box">
        <?php echo $__env->make('layouts.xing-icon-dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      </div>

      


      <div class="my-dash-card d-flex w-100 shadow rounded">
        <div class="my-dash-card-items">
        <h5 class="card-header w-100">Videos</h5>
        <h4>500</h4>

      <p>Total played videos</p>

      </div>

      <div class="my-dash-card-icon-box">
        <i class='bx bx-camera-movie'></i>
      </div>
      </div>
      


      <div class="my-dash-card d-flex w-100 shadow rounded">
        <div class="my-dash-card-items">
        <h5 class="card-header w-100">Music</h5>
        <h4>300</h4>

      <p>Total played music</p>

      </div>

      <div class="my-dash-card-icon-box">
        <i class='bx bx-music' ></i>
      </div>
      </div>


      

      <div class="my-dash-card d-flex w-100 shadow rounded">
        <div class="my-dash-card-items">
        <h5 class="card-header w-100">Quiz</h5>
        <h4>5000</h4>

      <p>Total quiz taken</p>

      </div>

      <div class="my-dash-card-icon-box">
        <i class='bx bx-task' ></i>
      </div>
      </div>

      

      <div class="my-dash-card d-flex w-100 shadow rounded">
        <div class="my-dash-card-items">
        <h5 class="card-header w-100">Active screen</h5>
        <h4>1000</h4>

      <p>Number of times claimed</p>

      </div>

      <div class="my-dash-card-icon-box">
        <i class='bx bx-devices' ></i>
      </div>
      </div>


    </div>





    <div class="my-dash-sub-row rounded">


    <div class="my-dash-transaction-history rounded">

      <div class="transaction-history-header rounded">
        <h5>Transaction History</h5>
      </div>


      <div class="transaction-history-t-head gap-4 align-items-center rounded d-flex justify-content-between">
        <h6>Reference</h6>
        <h6>Type</h6>
        <h6>Date</h6>
        <h6>Time</h6>
        <h6>Status</h6>
      </div>
      
      <div class="transaction-history-td gap-4 p-3 d-flex">
        <small>648rgfh7467</small>
        <small>Withdrawal</small>
        <small>03/05/2025</small>
        <small>3:48pm</small>
        <small><p class="transaction-status text-success bg-success bg-opacity-10">Success</p></small>
      </div>



      <div class="transaction-history-td align-items-center gap-4 p-3 d-flex">
        <small>648rgfh7467</small>
        <small>Withdrawal</small>
        <small>03/05/2025</small>
        <small>3:48pm</small>
        <small><p class="transaction-status text-danger bg-danger bg-opacity-10">Rejected</p></small>
      </div>


      <div class="transaction-history-td align-items-center gap-4 p-3 d-flex">
        <small>648rgfh7467</small>
        <small>Withdrawal</small>
        <small>03/05/2025</small>
        <small>3:48pm</small>
        <small><p class="transaction-status text-warning bg-warning bg-opacity-10">Pending</p></small>
      </div>

      <div class="transaction-history-td align-items-center gap-4 p-3 d-flex">
        <small>648rgfh7467</small>
        <small>Withdrawal</small>
        <small>03/05/2025</small>
        <small>3:48pm</small>
        <small><p class="transaction-status text-warning bg-warning bg-opacity-10">Pending</p></small>
      </div>



  </div>



      <div class="my-dash-latest-referral rounded">
        <div class="my-dash-latest-eferral-header">
          <h5>Latest Referrals</h5>
        </div>

          

          <div class="latest-referrals-notice d-flex align-items-center">
            <div class="latest-referrals-img-box">
              <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="user">
            </div>
            <div class="latest-referrals-details">
              <h6>John Doe</h6>
              <li class="w-100 text-muted">xxxxdoe@gmail.com
              <span class="bg-success bg-opacity-10 rounded-5 p-2 text-muted ms-4">Gold</span></li>
            </div>
          </div>
          
          <div class="latest-referrals-notice d-flex align-items-center">
            <div class="latest-referrals-img-box">
              <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="user">
            </div>
            <div class="latest-referrals-details">
              <h6>John Doe</h6>
              <li class="w-100 text-muted">xxxxdoe@gmail.com
                 <span class="bg-success bg-opacity-10 rounded-5 p-2 text-muted ms-4">Wood</span></li>
            </div>
          </div>
          
          <div class="latest-referrals-notice d-flex align-items-center ">
            <div class="latest-referrals-img-box">
              <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="user">
            </div>
            <div class="latest-referrals-details">
              <h6>John Doe</h6>
              <li class="w-100 text-muted">xxxxdoe@gmail.com
                <span class="bg-success bg-opacity-10 rounded-5 p-2 text-muted ms-4">Wood</span></li>
            </div>
          </div>

          
          <div class="latest-referrals-notice d-flex align-items-center ">
            <div class="latest-referrals-img-box">
              <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="user">
            </div>
            <div class="latest-referrals-details">
              <h6>John Doe</h6>
              <li class="w-100 text-muted">xxxxdoe@gmail.com
                 <span class="bg-success bg-opacity-10 rounded-5 p-2 text-muted ms-4">Bronze</span></li>
            </div>
          </div>

          
          <div class="latest-referrals-notice d-flex align-items-center">
            <div class="latest-referrals-img-box">
              <img src="<?php echo e(asset('images/lady.jpg')); ?>" alt="user">
            </div>
            <div class="latest-referrals-details">
              <h6>John Doe</h6>
              <li class="w-100 text-muted">xxxxdoe@gmail.com
                <span class="bg-success bg-opacity-10 rounded-5 p-2 text-muted ms-4">Wood </span></li>
            </div>
          </div>

      </div>
    </div>

  </div>

</div>


</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crown/Desktop/star/resources/views/users/dashboard.blade.php ENDPATH**/ ?>
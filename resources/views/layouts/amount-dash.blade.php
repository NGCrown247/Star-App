<div class="card star-dashboard-card  " style="width: 18rem;">


<div class="star-user-link-box">
        <a class="star-user-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="star-user-img-box">
              <img src="/images/person-placeholder.png" alt="">
            </div>

            <div class="user-details">
            <h6 class="dropdown-toggle">
              {{ Auth::user()->full_name }}</h6>
            <!-- <p>{{ Auth::user()->email }}</p> -->
            </div>
                  </a>
                  <div class="divider"></div>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#" @click="handleLogout()">Logout</a></li>
            </ul>

        </div>


  <div class="card-body star-dashboard-card-body">
    <h5 class="card-title mt-3">
    Available Stars</h5>

    <strong class="mt-2" >
      <img src="/images/star-brand.png" alt="">
      5000
    </strong>
    <i class='bx bxs-dollar-circle star-i'></i>
  <small>Current Star Balance</small>
  </div>
</div>

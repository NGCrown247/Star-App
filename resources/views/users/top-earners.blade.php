<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Top earners</title>

  @extends('layouts.app')
</head>
<body>

  @include('layouts.header')

  <div class="my-container" x-data="pagesApp">
  <div class="my-dash-row p-4">

    <div class="top-earners-content w-100 border rounded align-items-center">

      <h5 class="top-earners-head w-100 p-3">Top Earners</h4>


      <div class="top-earners-th d-flex w-100 justify-content-around align-items-center ">
        <h6 class="w-100 align-items-center text-center">Profile</h6>
          <h6 class="w-100 text-center">Name</h6>
          <h6 class="w-100 text-center" >Withdrawal</h6>
        </div>
        <div class="divider"></div>

        {{-- -------------------------------------- --}}
      <div class="top-earners-td d-flex w-100 justify-content-around align-items-center p-3">
        <div class="top-earner-img-cover w-100 d-flex justify-content-center align-items-center">
          <div class="latest-referrals-img-box top-earners-img-box">
            <img src="{{ asset('images/lady.jpg') }}" alt="user">
          </div>
        </div>
          <h6 class="w-100 text-center">john doe</h6>
          <h6 class="top-earners-amount w-100 text-center ">&#8358;1,000,000</h6>
        </div>

        {{-- -------------------------------------- --}}
      <div class="top-earners-td d-flex w-100 justify-content-around align-items-center p-3">
        <div class="top-earner-img-cover w-100 d-flex justify-content-center align-items-center">
          <div class="latest-referrals-img-box top-earners-img-box">
            <img src="{{ asset('images/lady.jpg') }}" alt="user">
          </div>
        </div>
          <h6 class="w-100 text-center">john doe</h6>
          <h6 class="top-earners-amount w-100 text-center ">&#8358;3,000,000</h6>
        </div>

        {{-- -------------------------------------- --}}
      <div class="top-earners-td d-flex w-100 justify-content-around align-items-center p-3">
        <div class="top-earner-img-cover w-100 d-flex justify-content-center align-items-center">
          <div class="latest-referrals-img-box top-earners-img-box">
            <img src="{{ asset('images/lady.jpg') }}" alt="user">
          </div>
        </div>
          <h6 class="w-100 text-center">john doe</h6>
          <h6 class="top-earners-amount w-100 text-center ">&#8358;300,000</h6>
        </div>

    </div>



  </div>

  </div>


</body>
</html>

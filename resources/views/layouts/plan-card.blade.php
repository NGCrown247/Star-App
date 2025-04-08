

<div  x-data="planApp" class="shadow row star-row mb-5" x-effect="sendAccessCode()">

<!-- -----WOOD PLAN -->
<template x-for="plan in plans" :key="plan.id">

<div class="shadow card star-plan-card p-3" style="width: 18rem;">
  <div class="card-body star-plan-card-body">

  <div class="card-title" >
    <img :src="plan.image" alt="plan-image">
    <h4 class="mt-3" x-text="plan.plan_title">  </h4>
</div>

    <h1 class="star-plan-amount">&#8358;<span x-text="plan.plan_price"></span> </h1>
    <h5 class="daily-earning mt-1" x-text="plan.plan_earn_daily"></h5>
      <div class="divider" ></div>

  <button type="button" class="shadow btn btn-subscribe mt-3 w-100 " @click="openPlanModal(plan)">Activate for &#8358;<span x-text="plan.plan_price"></span> </button>

    <h6 class="mt-3" x-text="plan.Benefit_header"></h6>

    <p class="card-text">
    <i class='bx bx-chevrons-right'></i> <span x-text="plan.play_video"></span> </p>


    <p class="card-text">
    <i class='bx bx-chevrons-right'></i>
    <span x-text="plan.play_music"></p>

    <p class="card-text">
    <i class='bx bx-chevrons-right'></i>
    <span x-text="plan.answer_quiz"></span></p>


    <p class="card-text">
    <i class='bx bx-chevrons-right'></i>
    <span x-text="plan.countDown_engagement"></span><i class='bx bx-info-circle'></i></p>
    <small class="countdown-engage-Warining" x-text="plan.countDown_engagement_warning"></small>
  </div>

</div>

</template>



<!-- MODAL -->
<div class="modal fade rounded-3" id="subscribePlanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog rounded-3 modal-dialog-centered">
    <div class="modal-content rounded-3">

      <div class="modal-body rounded-3">

      <div class="modal-header ">
        <h1 class="modal-title text-center w-100 fs-5" id="staticBackdropLabel" x-text="modalTitle"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <p class="text-center " x-text="paragraphTitle"></p>

    <div class="form-group mt-3">
      <input type="email" class="form-control  p-2" value="{{ old('email') }}" placeholder="Email" x-model="email">
    <span class="error-message text-danger" x-text="errors.email"></span>
    </div>


    <button :disabled="btnDisabled" type="submit" class="btn-submit btn btn-primary mt-4 mb-3" @click=" handlePlanSubmit()">
    <span x-show="isLoading" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
     Get Code</button>


      </div>


    </div>
  </div>
</div>


<!-- SECOND MODAL / VERIFICATION CODE-->
<div class="modal fade rounded-3" id="verifyPlanCodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog rounded-3 modal-dialog-centered">
    <div class="modal-content rounded-3">

      <div class="modal-body rounded-3">

      <div class="modal-header ">
        <h1 class="modal-title text-center w-100 fs-5" id="staticBackdropLabel" x-text="modalTitle"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <p class="text-center " x-text="paragraphTitle"></p>

    <div class="form-group mt-3">
      <input type="email" class="form-control  p-2"  placeholder="Verification Code" x-model="token">
    <span class="error-message text-danger" x-text="errors.token"></span>
    </div>


    <button :disabled="btnDisabled" type="submit" class="btn-submit btn btn-primary mt-4 mb-3" @click="handleOtpVerify()">
    <span x-show="isLoading" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
     Verify</button>


      </div>


    </div>
  </div>
</div>

</div>

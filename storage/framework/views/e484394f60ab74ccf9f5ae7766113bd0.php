

<div x-data="userApp" class="modal fade rounded-3"
:class="{'shake': hasError}"
id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog rounded-3 modal-dialog-centered">
    <div class="modal-content rounded-3">

      <div class="modal-body rounded-3">

      <div class="modal-header ">
        <button class="modal-header-login" @click=" openRegister()">Register</button>
        <h1 class="modal-title text-center w-100 fs-5" id="staticBackdropLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <div class="form-group mt-3">
      <input type="email"
      class="form-control  p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.email}"
      value="<?php echo e(old('email')); ?>"
      placeholder="Email"
      x-model="userForm.email"
      autocomplete="email"></div>

    <div class="form-group mt-3">
      <input type="text"
      class="form-control  p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.password}"
      placeholder="Password"
      x-model="userForm.password">


      <div class="form-check d-flex mt-2 justify-content-between">
        <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
        <a class="forgot-password me-2" href="">Forgot Password</a>
      </div>
    </div>
    <span class="error-message text-danger ms-2" x-text="errors.password"></span>


    <button :disabled="btnDisabled" type="submit" class="btn-submit btn btn-primary mt-4 mb-3" @click="handleLogin()">
    <span x-show="isLoading" class="value-border spinner-border-sm" aria-hidden="true"></span>
     Login</button>
      </div>


    </div>
  </div>
<?php /**PATH /home/crown/Desktop/star/resources/views/auth/login.blade.php ENDPATH**/ ?>
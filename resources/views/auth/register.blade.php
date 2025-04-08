

<div x-data="userApp" class="modal fade rounded-3"
:class="{'shake': hasError}"
 id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog rounded-3 modal-dialog-centered">
    <div class="modal-content rounded-3">

      <div class="modal-body rounded-3 justify-content-center">

      <div class="modal-header ">
        <button class="modal-header-login" @click="openLogin()">Login</button>
        <h1 class="modal-title text-center w-100 fs-5" id="staticBackdropLabel">Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <div class="form-group mt-4">
      <input type="text"
      class="form-control p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.full_name}"
      value="{{ old('full_name') }}"
      placeholder="Full name"
      x-model="userForm.full_name"
      autocomplete="full_name">
    </div>
    <span class="error-message text-danger ms-2 " x-text="errors.full_name"></span>


 <div class="form-group">
    <input type="email"
           class="form-control p-2"
           :class="{'border border-danger bg-danger bg-opacity-10 ': errors.email}"
           name="email"
           placeholder="Email"
           x-model="userForm.email"
           autocomplete="email">
</div>
<span class="error-message text-danger ms-2 " x-text="errors.email ? errors.email[0] : ''"></span>





    <div class="form-group">
      <input type="tel"
      class="form-control p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.phone_number}"
      value="{{ old('phone_number') }}"
      placeholder="Phone number"
      x-model="userForm.phone_number"
      autocomplete="phone_number">
    </div>
    <span class="error-message text-danger ms-2 " x-text="errors.phone_number"></span>


    <div class="form-group">
      <input type="text"
      class="form-control p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.address}"
      value="{{ old('address') }}"
      placeholder="Address"
      x-model="userForm.address"
      autocomplete="address">
    </div>
    <span class="error-message text-danger ms-2 " x-text="errors.address"></span>


    <div class="form-control input-group d-flex star-form-group-access-token">
      <input type="text"
      class="form-control access-token-input p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.access_code}"
      placeholder="Access token"
      x-model="userForm.access_code">

      <button type="button" class="get-access-token">GET</button>
    </div>
    <span class="error-message text-danger ms-2 " x-text="errors.access_code ? errors.access_code[0] : ''"></span>


    <div class="form-group">
      <input type="text"
      class="form-control  p-2"
      :class="{'border border-danger bg-danger bg-opacity-10 ': errors.password}"
      placeholder="Password"
      x-model="userForm.password">

    <span class="error-message text-danger" x-text="errors.password"></span>

    </div>


    <div class="form-group">
    <small class=" register-terms-and-privacy ms-2">Click to read <a class="" href="#">Terms of Services</a> and <a href="#">Privacy Policy</a> </small>

    <button :disabled="btnDisabled" type="submit" class="btn-submit btn btn-primary mt-3 mb-3" @click="handleSubmit()">
    <span x-show="isLoading" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
    Register
  </button>
</div>
      </div>


    </div>
  </div>
</div>

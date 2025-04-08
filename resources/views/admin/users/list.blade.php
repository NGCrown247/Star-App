@extends('layouts.contentNavbarLayout')

@section('title', 'Cards basic   - UI elements')

@section('vendor-script')
@vite('resources/assets/vendor/libs/masonry/masonry.js')
@endsection
@vite(['resources/js/app.js'])
@section('content')
<div  class="row g-6 mb-6">
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">4</h4>
                <p class="text-success mb-0">(100%)</p>
              </div>
              <small class="mb-0">Total Users</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="bx bx-user bx-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading" x-text="name">Verified Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">0</h4>
                <p class="text-success mb-0">(+95%)</p>
              </div>
              <small class="mb-0">Recent analytics </small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="bx bx-user-check bx-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Duplicate Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">0</h4>
                <p class="text-success mb-0">(0%)</p>
              </div>
              <small class="mb-0">Recent analytics</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-danger">
                <i class="bx bx-group bx-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Verification Pending</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">4</h4>
                <p class="text-danger mb-0">(+6%)</p>
              </div>
              <small class="mb-0">Recent analytics</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="bx bx-user-voice bx-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div x-data="adminApp()"  class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title mb-0">Search Filter</h5>

        <div class="row">
          <div class="col-6">
            <input type="text" @input="handleSearch()" x-model="queryParam" class="form-control" placeholder="Search here">
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-primary float-end" @click="openModal()">Add User</button>
          </div>
        </div>

    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <template  x-for="user in users" :key="user.id">
                    <tr>
                        <td x-text="user.id"></td>
                        <td x-text="user.full_name"></td>
                        <td x-text="user.email"></td>
                        <td x-text="user.phone_number"></td>
                        <td x-text="user.role"></td>
                        <td>
                            <span class="d-flex gap-2">
                                <button class="btn btn-sm btn-primary" @click="editUser(user)"> <i class='bx bxs-edit'></i></button>
                                <button class="btn btn-sm btn-danger" @click="deleteUser(user)"> <i class='bx bxs-trash-alt'></i></button>
                            </span>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title border-bottom w-100 pb-2" id="exampleModalLabel1" x-text="modalTitle"></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                  <div class="deletingggg">
                    <p class="text-danger" x-show="deleteConfirmText">Are you sure you want to delete? This action cannot be undone.</p>
                  </div>

                    <div class="row">
                        <div class="col mb-4">
                            <label for="nameBasic" class="form-label">Full Name</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" x-model="userForm.full_name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" id="emailBasic" class="form-control" placeholder="Email" x-model="userForm.email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <label for="phoneBasic" class="form-label">Phone Number</label>
                            <input type="text" id="phoneBasic" class="form-control" placeholder="Phone Number" x-model="userForm.phone_number" autocomplete="phone_number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-4">
                            <label for="phoneBasic" class="form-label">Address</label>
                            <input type="text" id="phoneBasic" class="form-control" placeholder="Address" x-model="userForm.address">
                        </div>
                    </div>

                    <div class="row">
                      <div class="col mb-4">
                        <select class="form-select" aria-label="Default select example" x-model="userForm.role">
                          <option selected>Select Role</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                      </div>
                  </div>
{{-- ----------------------------------------------------- --}}
                  <div class="row" x-show="accessCodeInput">
                    <div class="col mb-4">
                        <label for="accessCodeBasic" class="form-label">Access Code</label>
                        <input type="text" id="accessCodeBasic" value="palmpoint" class="form-control" x-model="userForm.access_code">
                    </div>
                </div>
{{-- --------------------------------------------------------- --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="passwordBasic" class="form-label">Password</label>
                            <input type="password" id="passwordBasic" class="form-control" x-model="userForm.password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="handleSubmit()" x-text="buttonActionType === 'Update' ? 'Update' : (buttonActionType === 'Delete' ? 'Delete' : 'Create')">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

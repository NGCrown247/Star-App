@extends('layouts.contentNavbarLayout')

@section('title', 'Cards basic   - UI elements')

@section('vendor-script')
@vite('resources/assets/vendor/libs/masonry/masonry.js')
@endsection

@section('content')
<div class="row g-6 mb-6">
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">TASK</span>
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
              <span class="text-heading">Verified Users</span>
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


  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Search Filter</h5>
      <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#basicModal">Add User</button>
    </div>
 
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th></th>
            <th>Id</th>
            <th>User</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Offcanvas to add new user -->
   <!-- Modal -->
   <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-6">
              <label for="nameBasic" class="form-label">Name</label>
              <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
            </div>
          </div>
          <div class="row g-6">
            <div class="col mb-0">
              <label for="emailBasic" class="form-label">Email</label>
              <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
            </div>
            <div class="col mb-0">
              <label for="dobBasic" class="form-label">DOB</label>
              <input type="date" id="dobBasic" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </div>

@endsection
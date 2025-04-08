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


  <div x-data="codeGeneratorApp()"  class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title mb-0">Search Filter</h5>
       
        <div class="row">
          <div class="col-6">
            <input type="text" @input="handleSearch()" x-model="queryParam" class="form-control" placeholder="Search here">
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-primary float-end" @click="openModal()">New Access Code</button>
          </div>
        </div>

    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codes</th>
                    <th>Plan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <template  x-for="code in codes" :key="code.id">
                    <tr>
                        <td x-text="code.id"></td>
                        <td x-text="code.code"></td>
                        <td x-text="code.plan.plan_title"></td>
                        <td>
                            <span class="d-flex gap-2">
                                <button class="btn btn-sm btn-primary" @click="editCode(code)"> <i class='bx bxs-edit'></i></button>
                                <button class="btn btn-sm btn-danger" @click="deleteCode(code)"> <i class='bx bxs-trash-alt'></i></button>
                            </span>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="codeModal" tabindex="-1">
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




  <!-- ------------------------SELECT PLAN------------------------------- -->
                    <div class="row">
                      <div class="col mb-4">
                        <select class="form-select" aria-label="Default select example" x-model="codeForm.plan_id" >
                          <option selected>Select Plan</option>
                           <template x-for="plan in plans">
                           <option :value="plan.id" x-text="plan.plan_title">Admin</option>
                        
                           </template>
                        </select>
                      </div>
                  </div>

  <!-- ------------------------CODE LENGTH------------------------------- -->
                    <div class="row">
                        <div class="col mb-4">
                            <label for="nameBasic" class="form-label">Code Length</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Code Length" x-model="codeForm.code_length">
                        </div>
                    </div>
{{-- ----------------------------------------------------- --}}
                  <div class="row">
                    <div class="col mb-4">
                        <label for="accessCodeBasic" class="form-label">Number of codes</label>
                        <input type="text" id="accessCodeBasic" value="palmpoint" placeholder="Number of codes" class="form-control" x-model="codeForm.number_of_codes">
                    </div>
                </div>
{{-- --------------------------------------------------------- --}}

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

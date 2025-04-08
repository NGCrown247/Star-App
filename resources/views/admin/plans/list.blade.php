<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>





</body>

</html>@extends('layouts.contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
@vite('resources/assets/vendor/libs/masonry/masonry.js')
@endsection
@vite(['resources/js/app.js'])
@section('content')

<div class="row g-6 mb-6">
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


<div x-data="planApp()" class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title mb-0">Search Filter</h5>

        <div class="row">
            <div class="col-6">
                <input type="text" @input="handleSearch()" class="form-control" placeholder="Search here">
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary float-end" @click="openModal('planModal')">Create
                    Plan</button>
            </div>
        </div>

    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>


                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Plan Title</th>
                    <th>Plan Price</th>
                    <th>Daily Earning</th>
                    <th>Benefit header</th>
                    <th>Watch Video</th>
                    <th>Answer Quiz</th>
                    <th>Listen to music</th>
                    <th>CountDown Engagement</th>
                    <th>Warning</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                <template x-for="plan in plans" :key="plan.id">
                    <tr>
                        <td x-text="plan.id"></td>
                        <td><img x-bind:src=" '/' + plan.image" alt="Plan Image" width="50"></td>
                        <td x-text="plan.plan_title"></td>
                        <td x-text="plan.plan_price"></td>
                        <td x-text="plan.plan_earn_daily"></td>
                        <td x-text="plan.Benefit_header"></td>
                        <td x-text="plan.play_video"></td>
                        <td x-text="plan.answer_quiz"></td>
                        <td x-text="plan.play_music"></td>
                        <td x-text="plan.countDown_engagement"></td>
                        <td x-text="plan.countDown_engagement_warning"></td>
                        <td>
                            <span class="d-flex gap-2">
                                <button class="btn btn-sm btn-primary" @click="editPlan(plan)"> <i
                                        class='bx bxs-edit'></i></button>
                                <button class="btn btn-sm btn-danger" @click="deletePlan(plan)"> <i
                                        class='bx bxs-trash-alt'></i></button>
                            </span>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal" id="planModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title border-bottom w-100 pb-2" id="exampleModalLabel1" x-text="modalTitle"></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <div class="row">
                        <div class="col mb-4">
                            <input type="file" id="file" @change="handleFile($event)" class="form-control">
                        </div>
                    </div>


                    <div class="d-flex gap-2">
                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Plan Title"
                                    x-model="planForm.plan_title">
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Plan Price"
                                    x-model="planForm.plan_price">
                            </div>
                        </div>


                        {{-- flex --}}
                    </div>

                    <div class="d-flex gap-2">
                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Daily Earning"
                                    x-model="planForm.plan_earn_daily">
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Benefit Header"
                                    x-model="planForm.Benefit_header">
                            </div>
                        </div>
                        {{-- flex --}}
                    </div>

                    <div class="d-flex gap-2">
                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Play Video"
                                    x-model="planForm.play_video">
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Answer Quiz"
                                    x-model="planForm.answer_quiz">
                            </div>
                        </div>
                        {{-- flex --}}
                    </div>

                    <div class="d-flex gap-2">

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Play Music"
                                    x-model="planForm.play_music">
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="CountDown Engagement"
                                    x-model="planForm.countDown_engagement">
                            </div>
                        </div>

                        <div class="row w-100">
                            <div class="col mb-4">
                                <input type="text" id="" class="form-control" placeholder="Warning"
                                    x-model="planForm.countDown_engagement_warning">
                            </div>
                        </div>
                        {{-- flex --}}
                    </div>

                </div>

                <div class="modal-footer gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="handleSubmit()"
                        x-text="buttonActionType === 'Update' ? 'Update' : (buttonActionType === 'Delete' ? 'Delete' : 'Create Plan')">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



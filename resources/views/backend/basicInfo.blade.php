@extends('backend.dashboard')

@section('content')
    <main role="main" class="main-content ">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row">

                        <div class="col-md-11">
                            <div class="card shadow mb-4">
                                <div class="card-header text-center">
                                    <strong class="card-title">Basic Information</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POSt"
                                        action="{{ route('user.information.store') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">Name</label>
                                            <input type="text" name="name" id="address-wpalaceholder"
                                                class="form-control" placeholder="Enter your Name">

                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail2">Email address</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail2" aria-describedby="emailHelp1" placeholder="Enter your Email" required>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="custom-phone">Phone Number</label>
                                                <input class="form-control input-phoneus" name="phone" id="custom-phone"
                                                    maxlength="14" placeholder="Enter your phone" required>

                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">Address</label>
                                            <input type="text" name="address" id="address-wpalaceholder"
                                                class="form-control" placeholder="Enter your address">

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">city</label>
                                            <input type="text" name="city" id="address-wpalaceholder"
                                                class="form-control" placeholder="Enter your city">

                                        </div>


                                        <div class="text-center">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

    </main>
@endSection

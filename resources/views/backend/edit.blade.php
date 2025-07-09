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
                                    <strong class="card-title">Baisc Information</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POSt"
                                        action="{{ route('user.information.update') }}">
                                        @csrf

                                        <input type="hidden" name="id" value={{$information->id}}>
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">Name</label>
                                            <input type="text" value ={{ $information->name }} name="name" 
                                                class="form-control" placeholder="Enter your Name">
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail2">Email address</label>
                                                <input type="email" value ={{ $information->email }} name="email" class="form-control"
                                                    id="exampleInputEmail2" aria-describedby="emailHelp1" required>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="custom-phone">Phone Number</label>
                                                <input class="form-control " value ={{ $information->phone }} name="phone" 
                                                    required>

                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">Address</label>
                                            <input type="text" value ={{ $information->address }} name="address" id="address-wpalaceholder"
                                                class="form-control" placeholder="Enter your address">

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">city</label>
                                            <input type="text" value ={{ $information->city }} name="city" id="address-wpalaceholder"
                                                class="form-control" placeholder="Enter your city">

                                        </div>

                                        {{-- <div class="bootstrap-tagsinput"><span class="tag label label-info">Amsterdam<span
                                                    data-role="remove"></span></span> <span
                                                class="tag label label-info">Washington<span
                                                    data-role="remove"></span></span> <span
                                                class="tag label label-info">Sydney<span data-role="remove"></span></span>
                                            <span class="tag label label-info">Beijing<span
                                                    data-role="remove"></span></span> <span
                                                class="tag label label-info">Cairo<span data-role="remove"></span></span>
                                            <input type="text" placeholder="">
                                        </div>

 --}}



                                        <button class="btn btn-primary" type="submit">Update</button>
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

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
                                    <strong class="card-title">Edit Profile</strong>
                                    <p class="text-muted">Edit Your Description</p>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POSt" action="{{ route('user.skills.update') }}">
                                        @csrf
                                        
                                        <input type="hidden" name="skill_id" value="{{ $skill->id }}">

                                        <div class="form-group mb-3">
                                            <label for="skills">Skills</label>

                                           <input name="skill_name" id="skills" value="{{ $skill->skill_name }}">
                                        </div>



                                        <button class="btn btn-primary btn-block btn-lg shadow mb-4 "
                                            type="submit">Save</button>
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

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
                                    <strong class="card-title">Edit Education Information</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POSt" action="{{ route('user.edu.update') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $edu->id }}">
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">University/School/Institute</label>
                                            <input type="text" value="{{ $edu->edu }}" name="edu"
                                                id="address-wpalaceholder" class="form-control" placeholder="Enter ...">
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail2">Start Date</label>
                                                <input type="text" value="{{ $edu->start_date }}" name="start_date"
                                                    class="form-control drgpicker" id="date-input1" value="04/24/2020"
                                                    aria-describedby="button-addon2">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="custom-phone">End Date</label>
                                                <input type="text" value="{{ $edu->end_date }}" name="end_date"
                                                    class="form-control drgpicker" id="date-input2" value="04/24/2024"
                                                    aria-describedby="button-addon2">
                                            </div>
                                        </div> <!-- /.form-row -->

                                        <div class="form-group mb-3">
                                            <label for="example-select">Kind Of Edu</label>
                                            <select name="level_id" class="form-control" id="example-select">
                                                <option selected disabled>Select Edu</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}"
                                                        @if ($level->id == $edu->level_id) selected @endif>
                                                        {{ $level->level_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address-wpalaceholder">Postition/Field</label>
                                            <input type="text" value="{{ $edu->field }}" name="field"
                                                id="address-wpalaceholder" class="form-control" placeholder="Enter ...">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="example-textarea"> Describe what You have do !</label>
                                            <textarea class="form-control" name="desc" id="example-textarea" rows="4">{{ $edu->desc }}</textarea>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Save</button>
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

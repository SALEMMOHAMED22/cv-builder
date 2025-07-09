@extends('backend.dashboard')


@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">


                        <!-- Small table -->
                        <div class="col-md-12 my-4">
                            <h2 class="h4 mb-1">Edit Education Details</h2>

                            <div class="card shadow">
                                <div class="card-body">
                                    <table class="table table-borderless table-hover">
                                        <thead class="thead-light text-muted text-small text-uppercase">
                                            <tr>
                                                <th>#</th>
                                                <th class="text-left">Name Of Universirty/School/Institute</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Education</th>
                                                <th>Field/Postion</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educations as $education)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted">
                                                            <strong>{{ $education->level->level_name }}</strong>
                                                        </p>
                                                        {{-- <small class="mb-0 text-muted">2474</small> --}}
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted">
                                                            <strong>{{ $education->start_date }}</strong>
                                                        </p>
                                                        {{-- <small class="mb-0 text-muted">Ap #331-7123 Lobortis Avenue</small> --}}
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted">
                                                            <strong>{{ $education->end_date }}</strong>
                                                        </p>
                                                        {{-- <small class="mb-0 text-muted">Ap #331-7123 Lobortis Avenue</small> --}}
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted"><strong>{{ $education->edu }}</strong>
                                                        </p>
                                                        {{-- <small class="mb-0 text-muted">Nigeria</small> --}}
                                                    </td>
                                                    <td><small
                                                            class="text-muted"><strong>{{ $education->field }}</strong></small>
                                                    </td>
                                                    <td class="text-muted"
                                                        style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        <strong>{{ $education->desc }}</strong>
                                                    </td>
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class=" sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.edu.edit', $education->id) }}">Edit</a>
                                                            <a class="dropdown-item" id="deleteEdu"
                                                                href="{{ route('user.edu.delete', $education->id) }}">Remove</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- customized table -->
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
@push('js')
    <script>
        $('#deleteEdu').on('click', function(e) {
            e.preventDefault();
            var link = $(this).attr('href') ;
            Swal.fire({
                title: "Are you sure?",
                text: "Delete This Data",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link ;
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endpush


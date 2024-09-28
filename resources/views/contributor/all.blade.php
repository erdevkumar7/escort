@extends('admin.layout')
@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Contributors<small>(Detail)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.addContributorForm') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Add contributor">
                                    Add contributor
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>

                        {{--  --}}
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="all_datatables_id"
                                        class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allContributors->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allContributors as $contributor)
                                                    <tr id="contributor-row-{{ $contributor->id }}"
                                                        class="all-detail-table-content">
                                                        <th>{{ $loop->iteration }}
                                                        </th>
                                                        <td>{{ $contributor->name }}</td>
                                                        <td>{{ $contributor->phone_number }}</td>
                                                        <td>{{ $contributor->email }}</td>
                                                        <td>{{ $contributor->role ? $contributor->role : 'Not Available' }}
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.editContirbutorForm', $contributor->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#deleteConfirmModal"
                                                                data-deleted-id="{{ $contributor->id }}"
                                                                class="delete-escort-btn" title="Delete">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                            <form id="deleteConfirmForm" method="POST"
                                                                style="display: none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.viewContirbutor', $contributor->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-primary">view</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- sweetalert2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- delete confirm  script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                if (event.target.closest('.delete-escort-btn')) {
                    const deleteId = event.target.closest('.delete-escort-btn').getAttribute(
                        'data-deleted-id');

                    // Show SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, submit the delete form
                            const deleteForm = document.getElementById('deleteConfirmForm');
                            deleteForm.action =
                                `/escorts/admin/delete-contributor/${deleteId}`;
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>
    <!-- /page content -->
@endsection

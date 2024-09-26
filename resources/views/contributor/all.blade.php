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
                                                        <th>{{ $loop->iteration + ($allContributors->currentPage() - 1) * $allContributors->perPage() }}
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
                                                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                                data-deleted-id="{{ $contributor->id }}">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
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
                                    <!-- Pagination Links -->
                                    <div class="d-flex justify-content-center all-pagination">
                                        {{ $allContributors->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- delete confirm modal script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll(
                '[data-bs-toggle="modal"][data-bs-target="#staticBackdrop"]');
            const deleteForm = document.getElementById('deleteConfirmForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteId = this.getAttribute('data-deleted-id');
                    deleteForm.action = `/escorts/admin/delete-contributor/${deleteId}`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

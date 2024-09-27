@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Agencies<small>(registered)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.addagency_form') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add agency">
                                    Add agency
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
                                                <th>Agency Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Counter</th>
                                                <th>Action</th>
                                                <th>Agency View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allagencies as $agency)
                                                <tr id="agency-row-{{ $agency->id }}" class="all-detail-table-content">
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $agency->name }}</td>
                                                    <td>{{ $agency->phone_number }}</td>
                                                    <td>{{ $agency->email }}</td>
                                                    <td>{{ $agency->counter ? $agency->counter : 'Not Available' }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_agency_form', $agency->id) }}">
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            data-deleted-id="{{ $agency->id }}">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.agency.escorts', $agency->id) }}">
                                                            <button type="button" class="btn btn-primary">view</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    {{-- delete confirm modal script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll(
                '[data-bs-toggle="modal"][data-bs-target="#staticBackdrop"]');
            const deleteForm = document.getElementById('deleteConfirmForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteId = this.getAttribute('data-deleted-id');
                    deleteForm.action = `/escorts/admin/agency/${deleteId}`;
                });
            });
        });
    </script>

    {{-- datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.colVis.min.js"></script>
    <script>
        new DataTable('#all_datatables_id', {
            layout: {
                topStart: {
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                }
            }
        });
    </script>
    <!-- /page content -->
@endsection

@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Escorts<small>(registered)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.add.escorts') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add">
                                    Add escort
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>
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
                                                <th>Nickname</th>
                                                {{-- <th>Phone number</th> --}}
                                                <th>email</th>
                                                <th>City</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                                <th>Media View</th>
                                                <th>Escort View </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allescorts->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allescorts as $escorts)
                                                    <tr class="all-detail-table-content"
                                                        id="escorts-row-{{ $escorts->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $escorts->nickname ?? 'Not Available' }}</td>
                                                        {{-- <td>{{ $escorts->phone_number ?? 'Not Available' }}</td> --}}
                                                        <td>{{ $escorts->email ?? 'Not Available' }}</td>
                                                        <td>{{ $escorts->city ?? 'Not Available' }}</td>
                                                        <td>{{ $escorts->type ?? 'Not Available' }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.edit_escorts_form', $escorts->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#deleteConfirmModal"
                                                                data-deleted-id="{{ $escorts->id }}"
                                                                class="delete-escort-btn" title="Delete">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.getAdminEscortsPictures', $escorts->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Photo">
                                                                    <i class="fa fa-photo"></i>
                                                                </button>
                                                            </a>
                                                            <a
                                                                href="{{ route('admin.getAdminEscortsVideos', $escorts->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Video">
                                                                    <i class="fa fa-video-camera"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.get.scorts', $escorts->id) }}">
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
    {{-- delete confirm modal script --}}   
    {{-- sweetalert2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                if (event.target.closest('.delete-escort-btn')) {
                    const deleteId = event.target.closest('.delete-escort-btn').getAttribute(
                        'data-deleted-id');
                    const deleteForm = document.getElementById('deleteConfirmForm');
                    deleteForm.action = `/my_project/escorts/admin/escort/${deleteId}/delete`;

                    // Open the modal (Bootstrap automatically opens it due to the data-bs attributes)
                    const deleteConfirmModal = new bootstrap.Modal(document.getElementById(
                        'deleteConfirmModal'));
                    deleteConfirmModal.show();
                }
            });
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     document.body.addEventListener('click', function(event) {
        //         if (event.target.closest('.delete-escort-btn')) {
        //             const deleteId = event.target.closest('.delete-escort-btn').getAttribute(
        //                 'data-deleted-id');

        //             // Show SweetAlert confirmation dialog
        //             Swal.fire({
        //                 title: 'Are you sure?',
        //                 text: "You won't be able to revert this!",
        //                 icon: 'warning',
        //                 showCancelButton: true,
        //                 confirmButtonColor: '#d33',
        //                 cancelButtonColor: '#3085d6',
        //                 confirmButtonText: 'Yes, delete it!'
        //             }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     // If confirmed, submit the delete form
        //                     const deleteForm = document.getElementById('deleteConfirmForm');
        //                     deleteForm.action =
        //                         `/my_project/escorts/admin/escort/${deleteId}/delete`;
        //                     deleteForm.submit();
        //                 }
        //             });
        //         }
        //     });
        // });
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

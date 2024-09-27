@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Escorts <small>({{ $agency->name }})</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.agency.add_escorts_form', $agency->id) }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add">
                                    Add escort
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
                                                <th>Nickname</th>
                                                <th>Phone number</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                                <th>Media View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allescorts->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allescorts as $escorts)
                                                    <tr id="escorts-row-{{ $escorts->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $escorts->nickname }}</td>
                                                        <td>{{ $escorts->phone_number }}</td>
                                                        <td>{{ $escorts->email }}</td>
                                                        <td>{{ $escorts->city }}</td>
                                                        <td>{{ $escorts->type }}</td>
                                                        <td style="display: flex">
                                                            <a href="{{ route('admin.get.scorts', $escorts->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="view">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </a>
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
                                                            <form id="deleteConfirmForm" method="POST"
                                                                style="display: none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
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
                        console.log('rrrrrr', result)
                        if (result.isConfirmed) {
                            // If confirmed, submit the delete form
                            const deleteForm = document.getElementById('deleteConfirmForm');
                            deleteForm.action =
                                `/escorts/admin/escort/${deleteId}/delete`;
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>
    <!-- /page content -->
@endsection

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

                                                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                                data-deleted-id="{{ $escorts->id }}">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll(
                '[data-bs-toggle="modal"][data-bs-target="#staticBackdrop"]');
            const deleteForm = document.getElementById('deleteConfirmForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteId = this.getAttribute('data-deleted-id');
                    deleteForm.action = `/escorts/admin/escort/${deleteId}/delete`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

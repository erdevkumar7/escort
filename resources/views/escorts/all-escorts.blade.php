@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Escorts <small>(registered)</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Escorts<small>Details</small></h2>
                            <div class="nav navbar-right panel_toolbox">
                                <a href="{{ route('admin.add.escorts') }}">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                        title="Add">
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
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nickname</th>
                                                    <th>Phone number</th>
                                                    <th>email</th>
                                                    <th>City</th>
                                                    <th>Origin</th>
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
                                                            <td>{{ $loop->iteration + ($allescorts->currentPage() - 1) * $allescorts->perPage() }}
                                                            </td>
                                                            <td>{{ $escorts->nickname ?? 'Not Available' }}</td>
                                                            <td>{{ $escorts->phone_number ?? 'Not Available' }}</td>
                                                            <td>{{ $escorts->email ?? 'Not Available' }}</td>
                                                            <td>{{ $escorts->city ?? 'Not Available' }}</td>
                                                            <td>{{ $escorts->origin ?? 'Not Available' }}</td>
                                                            <td>{{ $escorts->type ?? 'Not Available' }}</td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('admin.edit_escorts_form', $escorts->id) }}">
                                                                    <button data-toggle="tooltip" data-placement="top"
                                                                        title="Edit">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                </a>
                                                                <button data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
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
                                        <!-- Pagination Links -->
                                        <div class="d-flex justify-content-center all-pagination">
                                            {{ $allescorts->links() }}
                                        </div>
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
                    deleteForm.action = `/escorts/admin/escort/${deleteId}/delete`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

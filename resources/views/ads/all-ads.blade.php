@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Advertises</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Ads<small>Details</small></h2>
                            <div class="nav navbar-right panel_toolbox">
                                <a href="{{ route('admin.ads.create') }}">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                        title="Create Ads">
                                        Create Ads
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
                                                    <th>Ads Name</th>
                                                    <th>Price (In-CHF)</th>
                                                    <th>Time Duration (In-Days)</th>
                                                    {{-- <th>Remark</th> --}}
                                                    <th>Ads Description</th>
                                                    <th>Action</th>
                                                    <th>Ads View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($advertises as $ads)
                                                    <tr class="all-detail-table-content">
                                                        <td style="text-align:left;">{{ $loop->iteration }}</td>
                                                        <td>{{ $ads->name }}</td>
                                                        <td style="text-align:left;">{{ $ads->price }}</td>
                                                        <td style="text-align:left;">{{ $ads->time_duration }}</td>
                                                        <td class="all-desc-content">{{ $ads->description }}</td>

                                                        <td class="ads-actions">
                                                            <a href="{{ route('admin.ads_edit', $ads->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#deleteConfirmModal"
                                                                data-deleted-id="{{ $ads->id }}"
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
                                                            <a href="{{ route('admin.ads.show', $ads->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-primary">view</button></a>
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
                            deleteForm.action = `/escorts/admin/ads/${deleteId}`;
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>
    <!-- /page content -->
@endsection

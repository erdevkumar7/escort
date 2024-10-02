@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Badges<small>(Detail)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.add.badge_form') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Badge">
                                    Add Badge
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>

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
                                                <th>Badge Name</th>
                                                <th>Applied</th>
                                                <th>Color</th>
                                                <th>Description</th>
                                                <th>Badge Icon</th>
                                                <th>Action</th>
                                                <th>Badge View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allbadges as $badge)
                                                <tr class="all-detail-table-content">
                                                    <td style="text-align:left;">{{ $loop->iteration }}</td>
                                                    <td>{{ $badge->name }}</td>
                                                    <td>{{ $badge->how_is_it_applied }}</td>
                                                    <td>{{ $badge->hexa_color }}</td>
                                                    <td class="all-desc-content">{{ $badge->description }}</td>
                                                    <td><img src="{{ asset('/public/images/badge_icons') . '/' . $badge->icon }}"
                                                            width="40px" height="30px" alt="Icon"></td>
                                                    <td class="badges-actions">
                                                        <a href="{{ route('admin.badge_edit', $badge->id) }}">
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <button data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"
                                                            data-deleted-id="{{ $badge->id }}" class="delete-escort-btn"
                                                            title="Delete">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </button>
                                                        <form id="deleteConfirmForm" method="POST" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.badge.show', $badge->id) }}">
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
                            deleteForm.action = `/escorts/admin/badge/${deleteId}`;
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>
    <!-- /page content -->
@endsection

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
                                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            data-deleted-id="{{ $badge->id }}">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </button>
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

    {{-- delete confirm modal script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll(
                '[data-bs-toggle="modal"][data-bs-target="#staticBackdrop"]');
            const deleteForm = document.getElementById('deleteConfirmForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteId = this.getAttribute('data-deleted-id');
                    deleteForm.action = `/escorts/admin/badge/${deleteId}`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

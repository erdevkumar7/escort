@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Users<small>(registered)</small></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('admin.addUserForm') }}">
                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add User">
                                    Add User
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
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>E-mail</th>
                                                <th>Gender</th>
                                                <th>Action</th>
                                                <th>View User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allusers->isEmpty())
                                                <tr>
                                                    <td colspan="7" class="text-center">No data available</td>
                                                </tr>
                                            @else
                                                @foreach ($allusers as $user)
                                                    <tr id="user-row-{{ $user->id }}" class="all-detail-table-content">
                                                        <td>{{ $loop->iteration + ($allusers->currentPage() - 1) * $allusers->perPage() }}
                                                        </td>
                                                        <td class="editable">{{ $user->fname }}</td>
                                                        <td class="editable">{{ $user->lname }}</td>
                                                        <td class="editable">{{ $user->email }}</td>
                                                        <td class="editable">{{ $user->gender }}</td>
                                                        <td>

                                                            <a href="{{ route('admin_edit_user_form', $user->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#deleteConfirmModal"
                                                                data-deleted-id="{{ $user->id }}"
                                                                class="delete-escort-btn" title="Delete">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.viewUser', $user->id) }}">
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
                                        {{ $allusers->links() }}
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
            document.body.addEventListener('click', function(event) {
                if (event.target.closest('.delete-escort-btn')) {
                    const deleteId = event.target.closest('.delete-escort-btn').getAttribute(
                        'data-deleted-id');
                    const deleteForm = document.getElementById('deleteConfirmForm');
                    deleteForm.action = `/my_project/escorts/admin/delete-user/${deleteId}`;

                    // Open the modal (Bootstrap automatically opens it due to the data-bs attributes)
                    const deleteConfirmModal = new bootstrap.Modal(document.getElementById(
                        'deleteConfirmModal'));
                    deleteConfirmModal.show();
                }
            });
        });
    </script>
    <!-- /page content -->
@endsection

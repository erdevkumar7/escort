@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Agency <small>registered</small></h3>
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
                            <h2>Agency<small>Details</small></h2>
                            <div class="nav navbar-right panel_toolbox">
                                <a href="{{ route('admin.addagency_form') }}">
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                        title="Add agency">
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
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Agencyname</th>
                                                    <th>Email</th>
                                                    <th>Phone number</th>
                                                    <th>Address</th>
                                                    <th>Counter</th>
                                                    <th>Action</th>
                                                    <th>Escort View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allagencies as $agency)
                                                    <tr id="agency-row-{{ $agency->id }}">
                                                        <td>{{ $agency->name }}</td>
                                                        <td>{{ $agency->email }}</td>
                                                        <td>{{ $agency->phone_number }}</td>
                                                        <td>{{ $agency->address ? $agency->address : 'Not Available' }}</td>
                                                        <td>{{ $agency->counter ? $agency->counter : 'Not Available' }}</td>
                                                        <td style="display: flex">
                                                            {{-- <a href="{{route('admin.agency', $agency->id)}}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="view">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </a> --}}
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
    {{-- delete confirm modal script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll(
                '[data-bs-toggle="modal"][data-bs-target="#staticBackdrop"]');
            const deleteForm = document.getElementById('deleteConfirmForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const deleteId = this.getAttribute('data-deleted-id');
                    deleteForm.action = `/admin/agency/${deleteId}`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

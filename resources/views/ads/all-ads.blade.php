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
                                                            <a href="{{route('admin.ads_edit', $ads->id)}}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                                data-deleted-id="{{ $ads->id }}">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.ads.show', $ads->id)}}">
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
                    deleteForm.action = `/escorts/admin/ads/${deleteId}`;
                });
            });
        });
    </script>
    <!-- /page content -->
@endsection

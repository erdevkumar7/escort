@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Escorts <small>that recently register</small></h3>
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
                                    <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add">
                                        Add
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
                                                    <th>Nickname</th>
                                                    <th>Phone number</th>
                                                    <th>age</th>
                                                    <th>Canton</th>
                                                    <th>City</th>
                                                    <th>Description</th>
                                                    <th>Origin</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allescorts as $escorts)
                                                    <tr id="escorts-row-{{ $escorts->id }}">
                                                        <td>{{ $escorts->nickname }}</td>
                                                        <td>{{ $escorts->phone_number }}</td>
                                                        <td>{{ $escorts->age }}</td>
                                                        <td>{{ $escorts->canton }}</td>
                                                        <td>{{ $escorts->city }}</td>
                                                        <td>{{ $escorts->text_description }}</td>
                                                        <td>{{ $escorts->origin }}</td>
                                                        <td>{{ $escorts->type }}</td>
                                                        <td style="display: flex">
                                                            <a href="{{ route('admin.get.scorts', $escorts->id) }}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="view">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{route('admin.edit_escorts_form', $escorts->id)}}">
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <form id="delete-escorts"
                                                                action="{{route('admin.delete.escorts', $escorts->id)}}"
                                                                method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                    <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                            </form>
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
    <!-- /page content -->
@endsection

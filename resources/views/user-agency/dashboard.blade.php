@extends('user.layout')
@section('page_content')
    <style>
        td {
            word-break: break;

        }
    </style>

    <div class="container" style="margin-top:10px; margin-bottom:100px;">
        <table id="new-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nick Name</th>
                    <th>Phone number</th>
                    <th>Age</th>
                    <th>Origin</th>
                    <th>City</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allescorts as $escort)
                    <tr>
                        <td>{{ $escort->nickname ?? 'Not Available'}}</td>
                        <td>{{ $escort->phone_number ?? 'Not Available'}}</td>
                        <td>{{ $escort->age ?? 'Not Available'}}</td>
                        <td>{{ $escort->origin ?? 'Not Available'}}</td>
                        <td>{{ $escort->city ?? 'Not Available'}}</td>
                        <td>{{ $escort->type ?? 'Not Available'}}</td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

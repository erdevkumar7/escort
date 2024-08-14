@extends('user.layout')
@section('page_content')
    <div class="container" style="margin-top:10px; margin-bottom:100px;">
        <table id="agencies_escort" class="display">
            <thead>
                <tr>
                    <th>Nick Name</th>
                    <th>Phone number</th>
                    <th>Age</th>
                    <th>Origin</th>
                    <th>City</th>
                    <th>Type</th>
                    <th>Action</th>
                    <th>View escort</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allescorts as $escort)
                    <tr>
                        <td>{{ $escort->nickname ?? 'Not Available' }}</td>
                        <td>{{ $escort->phone_number ?? 'Not Available' }}</td>
                        <td>{{ $escort->age ?? 'Not Available' }}</td>
                        <td>{{ $escort->origin ?? 'Not Available' }}</td>
                        <td>{{ $escort->city ?? 'Not Available' }}</td>
                        <td>{{ $escort->type ?? 'Not Available' }}</td>
                        <td>Edit</td>
                        <td>
                            <a href="{{ route('escort.detail_by_id', $escort->id) }}">
                                <button type="button" class="btn btn-primary">view</button></a>
                        </td>
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
                    <th>Action</th>
                    <th>View escort</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@extends('user.layout-auth')
@section('auth_content')
    <div class="container" style="margin-top:10px; margin-bottom:100px;">
        <div class="add-agency-escort">
            <h3>Escorts Detail</h3>
            <a href="{{route('agency.add.escortform', Auth::guard('agency')->user()->id)}}" ><button type="button" class="btn btn-success" >Add escort</button></a>
        </div>

        <table id="agencies_escort" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nick Name</th>
                    <th>Phone number</th>
                    <th>Age</th>
                    <th>Origin</th>
                    <th>City</th>
                    <th>Type</th>
                    {{-- <th>Action</th> --}}
                    <th>View escort</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allescorts as $escort)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $escort->nickname ?? 'Not Available' }}</td>
                        <td>{{ $escort->phone_number ?? 'Not Available' }}</td>
                        <td>{{ $escort->age ?? 'Not Available' }}</td>
                        <td>{{ $escort->origin ?? 'Not Available' }}</td>
                        <td>{{ $escort->city ?? 'Not Available' }}</td>
                        <td>{{ $escort->type ?? 'Not Available' }}</td>
                        {{-- <td>Edit</td> --}}
                        <td>
                            <a href="{{ route('agency.escort.detail', ['agency_id' => Auth::guard('agency')->user()->id, 'escort_id' => $escort->id]) }}">
                                <button type="button" class="btn btn-primary">view</button></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nick Name</th>
                    <th>Phone number</th>
                    <th>Age</th>
                    <th>Origin</th>
                    <th>City</th>
                    <th>Type</th>
                    {{-- <th>Action</th> --}}
                    <th>View escort</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection

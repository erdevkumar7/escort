@extends('user.layout-auth')
@section('auth_content')
    {{-- <div class="container" style="margin-top:10px; margin-bottom:100px;">
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
                
                    <th>View escort</th>
                </tr>
            </tfoot>
        </table>
    </div> --}}

    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0" href="{{route('agency.dashboard', $agency->id)}}">Dashboard</a>
                <a class="nav-link" href="{{ route('agency.profile', $agency->id) }}">Profile</a>
                <a class="nav-link active" href="#">My Listing</a>

            </nav>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="card mb-4">
                    {{-- <div class="add-agency-escort">
                        <a href="{{route('agency.add.escortform', Auth::guard('agency')->user()->id)}}" ><button type="button" class="btn btn-success" >Add escort</button></a>
                    </div> --}}
                    <div class="card-header">
                        <a href="{{route('agency.add.escortform', Auth::guard('agency')->user()->id)}}" ><button type="button" class="btn btn-primary" >Add escort</button></a>
                    </div>
                    <div class="card-body p-0">
                        <!-- Billing history table-->
                        <div class="table-responsive table-billing-history">
                            {{-- <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-gray-200" scope="col">Transaction ID</th>
                                        <th class="border-gray-200" scope="col">Date</th>
                                        <th class="border-gray-200" scope="col">Amount</th>
                                        <th class="border-gray-200" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#39201</td>
                                        <td>06/15/2021</td>
                                        <td>$29.99</td>
                                        <td><span class="badge bg-light text-dark">Pending</span></td>
                                    </tr>
                                  
                                </tbody>
                            </table> --}}
                            <table id="agencies_escort" class="display table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nick Name</th>
                                        <th>Phone number</th>
                                        <th>Age</th>
                                        <th>Origin</th>
                                        <th>City</th>
                                        <th>Type</th>
                                       
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
                                    
                                        <th>View escort</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

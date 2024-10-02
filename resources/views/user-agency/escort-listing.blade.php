@extends('user.layout-agency')
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
                <a class="nav-link ms-0" href="{{ route('agency.dashboard', $agency->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('agency.profile', $agency->id) }}">Profile</a>
                <a class="nav-link active" href="#">My Listing</a>

            </nav>
            <hr class="mt-0 mb-4">
            <div class="row agency-escort-list">
                <div class="card mb-4">
                    <div class="agency-add-escort-title">
                        <h3>Escort-Listing</h3>
                        <a href="{{ route('agency.add.escortform', Auth::guard('agency')->user()->id) }}"><button
                                type="button" class="btn btn-primary">Add escort</button></a>
                    </div>
                    {{-- <div class="card-header">
                        <a href="{{route('agency.add.escortform', Auth::guard('agency')->user()->id)}}" ><button type="button" class="btn btn-primary" >Add escort</button></a>
                    </div> --}}
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
                            <table id="agencies_escort" class="display table mb-0 agency-escort-listing">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nick Name</th>
                                        <th>Phone number</th>
                                        <th>Age</th>
                                        <th>Origin</th>
                                        <th>City</th>
                                        <th>Category type</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                            <td>{{ $escort->status == 1 ? 'Active' : 'Not-Active' }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('agency.edit_escorts_form', ['agency_id' => Auth::guard('agency')->user()->id, 'id' => $escort->id]) }}">
                                                    <button class="agency-escort-edit-button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                                <button class="agency-escort-delete-button" type="button" onclick="confirmDelete({{ $escort->id }})"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('agency.escort.detail', ['agency_id' => Auth::guard('agency')->user()->id, 'escort_id' => $escort->id]) }}">
                                                    <button type="button" class="btn btn-primary agency-escort-view-button">view</button></a>
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
                                        <th>Category type</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this escort?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(escortId) {
            // Set the action URL for the delete form with the escort ID
            const url = '{{ route('agency.delete.escorts', ['id' => '__id__']) }}'.replace('__id__', escortId);
            document.getElementById('deleteForm').action = url;

            // Show the modal
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {});
            deleteModal.show();
        }
    </script>
@endsection

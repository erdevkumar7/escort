@extends('admin.layout')

@section('page_content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_content">
            <br />
            <form action="{{ route('admin_update_user', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="first-name" name="fname" value="{{$user->fname}}" class="form-control ">
                    </div>
                    @error('fname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="last-name" name="lname" value="{{$user->lname}}" class="form-control">
                    </div>
                    @error('lname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control ">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="phone" value="{{$user->phone}}" name="phone" class="form-control ">
                    </div>
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="address" name="address" value="{{$user->address}}" class="form-control ">
                    </div>
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="gender">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    @error('gender')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy"
                            type="text" name="dob" value="{{$user->dob}}" type="text" onfocus="this.type='date'"
                            onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                            onmouseout="timeFunctionLong(this)">
                        <script>
                            function timeFunctionLong(input) {
                                setTimeout(function() {
                                    input.type = 'text';
                                }, 60000);
                            }
                        </script>
                    </div>
                    @error('dob')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

            </form>
            <script>
                function removeErr(id) {

                }
            </script>
        </div>
    </div>
</div>
@endsection
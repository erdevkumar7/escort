@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add Badge</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.badge_edit_submit', $badge->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="item form-group p-2">
                                    {{-- Badge Name --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name">Badge Name * </label>
                                        <input type="text" name="name" value="{{ $badge->name }}"
                                            class="form-control" disabled>
                                    </div>
                                    {{-- how_is_it_applied --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="how_is_it_applied">Applied * </label>
                                        <select class="form-control" id="how_is_it_applied" name="how_is_it_applied"
                                            oninput="removeError('appliedErr')">
                                            <option value="">Select Applied</option>
                                            <option value="manually"
                                                {{ $badge->how_is_it_applied == 'manually' ? 'selected' : '' }}>Manually
                                            </option>
                                            <option value="automatically"
                                                {{ $badge->how_is_it_applied == 'automatically' ? 'selected' : '' }}>
                                                Automatically
                                            </option>
                                        </select>
                                        @error('how_is_it_applied')
                                            <span class="text-danger" id="appliedErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group p-2">
                                    {{-- hexa_color --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="hexa_color">Hex Color *</label>
                                        <select class="form-control" id="hexa_color" name="hexa_color"
                                            oninput="removeError('colorErr')">
                                            <option value="">Select Hexa Color</option>
                                            <option value="#00FF00" {{ $badge->hexa_color == '#00FF00' ? 'selected' : '' }}>
                                                Green (#00FF00) </option>
                                            <option value="#7DF9FF" {{ $badge->hexa_color == '#7DF9FF' ? 'selected' : '' }}>
                                                Blue (#7DF9FF) </option>
                                            <option value="#FFBF00" {{ $badge->hexa_color == '#FFBF00' ? 'selected' : '' }}>
                                                Yellow (#FFBF00) </option>
                                            <option value="#CF9FFF" {{ $badge->hexa_color == '#CF9FFF' ? 'selected' : '' }}>
                                                Purple (#CF9FFF) </option>
                                            <option value="#FF7518" {{ $badge->hexa_color == '#FF7518' ? 'selected' : '' }}>
                                                Orange (#FF7518) </option>
                                            <option value="#D2042D" {{ $badge->hexa_color == '#D2042D' ? 'selected' : '' }}>
                                                Red (#D2042D) </option>
                                        </select>
                                        @error('hexa_color')
                                            <span class="text-danger" id="colorErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- icon --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="icon"> Badge Icon </label>
                                        <input type="file" class="form-control" name="icon"
                                            oninput="removeError('iconErr')">
                                        @error('icon')
                                            <span class="text-danger" id="iconErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="item form-group p-2">
                                    {{-- description --}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" oninput="removeError('descripErr')">{{ $badge->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger" id="descripErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Submit --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-3">
                                        <a href="{{ route('admin.allbadges') }}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

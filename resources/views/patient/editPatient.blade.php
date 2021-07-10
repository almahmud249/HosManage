@extends('home')
@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Patient</h4>

                </div>
                <div>
                    <a href="{{ route('all.patient.page') }}" style="float:right;" class="btn btn-primary btn-rounded">All
                        Patient</a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">


                    <form method="post" enctype="multipart/form-data" action="{{ URL::to('update_patient_data/'.$dt->id) }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    @if (isset($dt))
                                        <input class="form-control" value="{{ $dt->first_name }}" name="first_name"
                                            type="text">
                                        @error('first_name')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    @if (isset($dt))

                                        <input class="form-control" value="{{ $dt->last_name }}" name="last_name"
                                            type="text">
                                        @error('last_name')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @if (isset($dt))
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ $dt->username }}" name="username"
                                            type="text">
                                        @error('username')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    @if (isset($dt))
                                        <input class="form-control" value="{{ $dt->email }}" name="email" type="email">
                                        @error('email')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif


                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    @if (isset($dt))
                                        <input class="form-control" value="{{ $dt->password }}" name="password"
                                            type="password">
                                        @error('password')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    @if (isset($dt))
                                        <input class="form-control" value="{{ $dt->confirm_password }}"
                                            name="confirm_password" type="password">
                                        @error('confirm_password')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    @if (isset($dt))
                                        <div class="cal-icon">
                                            <input type="text" name="date" value="{{ $dt->date }}"
                                                class="form-control datetimepicker">
                                            @error('date')
                                                <div style="color: red">{{ $message }}</div>

                                            @enderror
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="male"
                                            {{ $dt->gender == 'male' ? 'checked' : '' }}>Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="female"
                                            {{ $dt->gender == 'female' ? 'checked' : '' }}>Female
                                    </label>
                                </div>
                                @error('gender')
                                    <div style="color: red">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        @if (isset($dt->address))
                                            <input type="text" name="address" value="{{$dt->address}}" class="form-control ">
                                            @error('address')
                                                <div style="color: red">{{ $message }}</div>

                                            @enderror
                                        @endif

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select" name="country">
                                            @if (isset($dt))
                                                <option selected>Choose...</option>

                                                <option>USA</option>
                                                <option>United Kingdom</option>
                                                @if ($dt->country)
                                                    <option value="{{ $dt->country }}" selected>{{ $dt->country }}
                                                    </option>
                                                @endif
                                        </select>
                                        @error('country')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                        @endif

                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone </label>
                                @if (isset($dt))
                                    <input class="form-control" type="number" value="{{ $dt->phone }}" name="phone"
                                        placeholder="phone" aria-label="phone" aria-describedby="basic-addon1">
                                    @error('phone')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                @endif

                            </div>
                        </div>

                        </div>

                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Update Patient</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
@endsection

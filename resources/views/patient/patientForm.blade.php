@extends('home')
@section('content')

    <div class="page-wrapper">
        <div class="content" >
            <div class="row">

                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Patient</h4>

                </div>
                <div>
                    <a href="{{ route('all.patient.page') }}" style="float:right;"
                        class="btn btn-primary btn-rounded">All Patient</a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">


                    <form method="post" action="{{ URL::to('insert_patient_data') }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="first_name" type="text">
                                    @error('first_name')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" name="last_name" type="text">
                                    @error('last_name')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" name="username" type="text">
                                    @error('username')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="email">
                                    @error('email')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password">
                                    @error('password')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" name="confirm_password" type="password">
                                    @error('confirm_password')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="cal-icon">
                                        <input type="text" name="date" class="form-control datetimepicker">
                                        @error('date')
                                            <div style="color: red">{{ $message }}</div>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="male" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="female" class="form-check-input">Female
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
                                            <input type="text" name="address" class="form-control ">
                                            @error('address')
                                                <div style="color: red">{{ $message }}</div>

                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select" name="country">
                                                <option selected>Choose...</option>

                                                <option>USA</option>
                                                <option>United Kingdom</option>
                                            </select>
                                            @error('country')
                                                <div style="color: red">{{ $message }}</div>

                                            @enderror
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone </label>
                                    <input class="form-control" type="number" name="phone" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('phone')
                                        <div style="color: red">{{ $message }}</div>

                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

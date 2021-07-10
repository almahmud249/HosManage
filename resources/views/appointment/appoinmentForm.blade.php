@extends('home')
@section('content')

    @php
    $dept = DB::table('departments')->get();
    $doc = DB::table('doctors')->get();
    @endphp
    <div class="main-wrapper">


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">


                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="{{ route('insert.appointment.data') }}">
                            @csrf
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input class="form-control" type="text" name="name">
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>

                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select" name="department">
                                            <option selected value="">Choose...</option>
                                            @isset($dept)
                                                @foreach ($dept as $row)
                                                    <option value="{{ $row->department }}">{{ $row->department }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('doctor'))
                                        <span class="is-invalid" style="color: red">
                                            {{ $errors->first('department') }}

                                        </span>

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select" name="doctor">
                                            <option selected value="">Choose...</option>
                                            @isset($doc)
                                                @foreach ($doc as $row)
                                                    <option value="{{ $row->username }}">{{ $row->username }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        @if ($errors->has('doctor'))
                                        <span class="is-invalid" style="color: red">
                                            {{ $errors->first('doctor') }}

                                        </span>

                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="date">
                                            @error('date')
                                                <p style="color: red">{{ $message }}</p>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="time">
                                            @error('time')
                                                <p style="color: red">{{ $message }}</p>

                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control" type="email" name="email">
                                        @error('email')
                                            <p style="color: red">{{ $message }}</p>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control" type="text" name="phone">
                                        @error('phone')
                                            <p style="color: red">{{ $message }}</p>

                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" class="form-control" name="message"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label class="display-block">Appointment Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1"
                                        checked>
                                    <label class="form-check-label" for="product_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive"
                                        value="0">
                                    <label class="form-check-label" for="product_inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div> --}}
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Appointment</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>

        </div>
    </div>
@endsection

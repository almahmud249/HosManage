@extends('doctor.dashboard')
@section('content')

<div class="main-wrapper">


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Update Appointment</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <form method="post" action="{{ URL::to('appointment_reSchedule/'.$dt->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="datetimepicker form-control" id="datetimepicker"
                                            value="{{ $dt->date }}" name="date">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="time-icon">
                                        <input type="text" class=" form-control"
                                            value="{{ $dt->time }}" name="time" id="datetimepicker3">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  text-center">
                                <button class="btn btn-primary submit-btn">Update Appointment</button>
                            </div>
                        </div>

                    </form>

                </div>



            </div>
        </div>

    </div>
</div>

@endsection


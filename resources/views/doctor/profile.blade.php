@extends('doctor.dashboard')
@section('content')

<div class="main-wrapper">
@php
    $id=Auth::guard('doctor')->id();
    $dt=DB::table('doctors')->where('id',$id)->first();
    $username=$dt->username;

    $data=DB::table('appointments')->where('doctor',$username)->get();

@endphp

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="{{URL::to('edit_doctors_profile/'.$dt->id)}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>

                <div class="card-box profile-header">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">

                                        <a href="#"><img class="avatar" src="{{URL::to($dt->profile_photo)}}"alt=""style="height:100%; width:100%;"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{$dt->username}}</h3>
                                                <small class="text-muted">{{$dt->specialist}}</small>
                                                <div class="staff-id">Employee ID : {{$dt->doctors_id}}</div>
                                                <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">{{$dt->phone}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">{{$dt->email}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text">{{$dt->datepicker}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">{{$dt->address}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">{{$dt->gender}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

				<div class="profile-tabs">
					<ul class="nav   nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
						<li class="ml-5  nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Pending Appintment</a></li>
						<li class=" ml-5  nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Appproved Appintment</a></li>
						<li class=" ml-5  nav-item"><a class="nav-link" href="#bottom-tab4" data-toggle="tab">Messages</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Education Informations</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Medical Science (UG)</a>
                                                <div>MBBS</div>
                                                <span class="time">2001 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Medical Science (PG)</a>
                                                <div>MD - Obstetrics & Gynaecology</div>
                                                <span class="time">1997 - 2001</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-box mb-0">
                            <h3 class="card-title">Experience</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Appointment ID</th>
                                                    <th>Patient Name</th>
                                                    <th>Department</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Status</th>
                                                    <th >Action</th>
                                                </tr>

                                                @foreach ($data as  $row)
                                                @if ($row->isApprove==0)
                                                <tbody>

                                                    <tr>
                                                        <td>{{ $row->apmntId }}</td>
                                                        <td> {{ $row->name }}</td>
                                                        <td>{{ $row->department }}</td>
                                                        <td>{{ $row->date }}</td>
                                                        <td>10:00am - 11:00am</td>
                                                        <td><span class="custom-badge status-red">Inactive</span></td>
                                                        <td >

                                                    <a href="{{ URL::to('appointment_approve/' . $row->id) }}"
                                                        class="btn btn-primary">Approve</a>
                                                    <a href="{{ URL::to('delete_patients/' . $row->id) }}"
                                                       id="delete_department" class="btn btn-danger">Reject</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                @endif
                                                @endforeach


                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>

                        <div class="tab-pane" id="bottom-tab3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Appointment ID</th>
                                                    <th>Patient Name</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Status</th>
                                                    <th >Action</th>
                                                </tr>

                                                @foreach ($data as  $row)
                                                @if ($row->isApprove==1)
                                                <tbody>

                                                    <tr>
                                                        <td>{{ $row->apmntId }}</td>
                                                        <td> {{ $row->name }}</td>
                                                        <td>{{ $row->date }}</td>
                                                        <td>{{ $row->time }}</td>
                                                        <td><span class="custom-badge status-green">Active</span></td>
                                                        <td >

                                                    <a href="{{ URL::to('reSchedule_form/' . $row->id) }}"
                                                        class="btn btn-primary">ReSchedule</a>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                                @endif
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="tab-pane" id="bottom-tab4">
							Tab content 3
						</div>
					</div>
				</div>
            </div>

        </div>
</div>
@endsection

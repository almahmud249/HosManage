@extends('home')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post"enctype="multipart/form-data" action="{{URL::to('doc_update/'.$dt->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="first_name" value="{{$dt->first_name}}"type="text" >

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" value="{{$dt->last_name}}"name="last_name"type="text">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control"  value="{{$dt->username}}" name="username"type="text" >

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control"  value="{{$dt->email}}" name="email" type="email" >

                                    </div>
                                </div>

                               
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" name="datepicker"value="{{$dt->datepicker}}" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                @if($dt->gender=='Male')
                                <div class="col-sm-6">

									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">

												<input type="radio" name="gender" class="form-check-input" value="Male" {{ $dt->gender == 'Male' ? 'checked' : '' }}  >Male

											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Female" class="form-check-input">Female

											</label>
										</div>
									</div>

                                </div>
                                @endif
                                @if($dt->gender=='Female')
                                <div class="col-sm-6">

									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">

												<input type="radio" name="gender" class="form-check-input" value="Male"   >Male

											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input"value="Female" {{ $dt->gender == 'Female' ? 'checked' : '' }} >Female

											</label>
										</div>
									</div>

                                </div>
                                @endif
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" value="{{$dt->address}}" name="address" class="form-control ">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
												<select class="form-control select" name="country">
                                                <option selected>Choose...</option>
                                                    <option>Bangladesh</option>
													<option>USA</option>
													<option>United Kingdom</option>
                                                    @if($dt->country)
                                                    <option value="{{$dt->country}}" selected>{{$dt->country}}</option>
                                                    @endif
												</select>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>City</label>
												<input type="text" value="{{$dt->city}}"  name="city"class="form-control">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
                                        {{-- <div class="form-group">
												<label>Department</label>
                                                @php
                                            $data=DB::table('departments')->get();

                                            @endphp
												<select class="form-control select" name="department">
                                                   <option selected>Choose...</option>
                                                @foreach($data as $row)
                                                   <option value="{{$row->department}}" <?php if($dt->department==$row->department){echo "selected";}?>>{{$row->department}}</option>
                                                @endforeach
												</select>
											</div>
										</div> --}}
										{{-- <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Specialist</label>
                                                @php
                                            $data=DB::table('specilists')->get();

                                            @endphp
                                            <select class="form-control select" name="specialist">
                                                   <option selected>Choose...</option>
                                                @foreach($data as $row)
                                                   <option value="{{$row->specialist}}" <?php if($dt->specialist==$row->specialist){echo "selected";}?>>{{$row->specialist}}</option>
                                                @endforeach
												</select>
											</div>
										</div> --}}
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" value="{{$dt->phone}}"  name="phone"type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="{{asset('dashboard/assets/img/user.jpg')}}">
											</div>
											<div class="upload-input">
												<!-- <input type="file" class="form-control"> -->
                                                <input type="file" class="upload" accept="image/*"  id="profile_photo" name="profile_photo"placeholder="photo"  onChange="readURL(this);">
											</div>
                                            <input type="hidden" name="old_photo" value="{{$dt->profile_photo}}">
										</div>

									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea class="form-control" name="biography" rows="3" cols="30">{{$dt->biography}} </textarea>
                            </div>
                            <div class="form-group">
                                @if ($dt->status==1)
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" checked>
                                    <label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0">
                                    <label class="form-check-label" for="doctor_inactive">
                                    Inactive
									</label>
								</div>
                                @endif
                            </div>
                            <div class="form-group">
                                @if ($dt->status==0)
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" >
                                    <label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0" checked>
                                    <label class="form-check-label" for="doctor_inactive">
                                    Inactive
									</label>
								</div>
                                @endif
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





@endsection

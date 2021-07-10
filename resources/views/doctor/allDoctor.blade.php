@extends('home')
@section('content')

    <div class="main-wrapper">


        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('doc.singUp.page') }}" class="btn btn-primary btn-rounded float-right"><i
                                class="fa fa-plus"></i> Add Doctor</a>
                    </div>
                </div>
                <div class="row doctor-grid">
                    @foreach ($dt as $row)
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    @if ($row->profile_photo == 'girl.png')
                                        <a class="avatar" href="{{ URL::to('doctors_profile/' . $row->id) }}"><img alt=""
                                                src="{{ URL::asset('assets/img') }}/{{ $row->profile_photo }}"
                                                style="height:100%; width:100%;"></a>

                                    @elseif ($row->profile_photo =='boy.png')
                                        <a class="avatar" href="{{ URL::to('doctors_profile/' . $row->id) }}"><img alt=""
                                                src="{{ URL::asset('assets/img') }}/{{ $row->profile_photo }}"
                                                style="height:100%; width:100%;"></a>
                                    @else
                                        <a class="avatar" href="{{ URL::to('doctors_profile/' . $row->id) }}"><img alt=""
                                                src="{{ $row->profile_photo }}" style="height:100%; width:100%;"></a>

                                    @endif

                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ URL::to('doc_edit/' . $row->id) }}"><i
                                                class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="{{ URL::to('doc_delete/'. $row->id) }}"
                                            id="delete_department" data-toggle="modal" data-target="#delete_doctor"><i
                                                class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                <h4 class="doctor-name text-ellipsis"><a
                                        href="{{ URL::to('doctors_profile/' . $row->id) }}">{{ $row->username }}</a>
                                </h4>
                                <div class="doc-prof">{{ $row->specialist }}</div>
                                <div class="user-country">
                                    <i class="fa fa-map-marker"> </i>{{ $row->address }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

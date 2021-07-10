@extends('home')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Data Tables</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">




                        <a href="{{ route('insert.patient.form') }}" style="float:right;"
                            class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Patient</a>

                        <div class="table-responsive">
                            <table class="datatable table table-stripped ">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($dt)
                                    @foreach ($dt as $row)
                                    <tr>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->date }} </td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>

                                            <a href="{{ URL::to('edit_patient_data/' . $row->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ URL::to('delete_patient_data/' . $row->id) }}"
                                               id="delete_department" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                    @endisset




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

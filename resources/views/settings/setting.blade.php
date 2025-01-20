@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __(' School Settings') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('school_details.edit', ['id' => 1]) }}" class="btn btn-primary">
                        {{ __('Edit School Details') }}
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        {{-- <div class="card-header">
                            <h3 class="card-title">School Details</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            @foreach($schoolDetails as $schools)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>School Name</td>
                                        <td>{{ $schools->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Logo</td>
                                        <td>
                                            {{-- <img src="{{ asset('storage/' . $schools->logo) }}" alt="School Logo" style="width: 100px; height: auto;"> --}}
                                            <img src="{{ asset('storage/' . $schools->logo) }}" alt="School Logo" style="max-width: 180px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $schools->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Numbers</td>
                                        <td>{{ $schools->contact_numbers }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $schools->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Establishment Year</td>
                                        <td>{{ $schools->establishment_year }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $schools->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Numbers</td>
                                        <td>{{ $schools->phone_numbers }}</td>
                                    </tr>
                                    <tr>
                                        <td>Website URL</td>
                                        <td><a href="{{ $schools->website_url }}" target="_blank">{{ $schools->website_url }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Number of Students</td>
                                        <td>{{ $schools->number_of_students }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Staffs</td>
                                        <td>{{ $schools->number_of_staffs }}</td>
                                    </tr>
                                    <tr>
                                        <td>Programs Offered</td>
                                        <td>{{ $schools->programs_offered }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
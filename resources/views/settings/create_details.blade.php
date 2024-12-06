@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('') }}</h1>
                </div><!-- /.col -->
                <!-- /.col -->
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
                        <div class="card-header">
                            <h3 class="card-title">School Details Editing</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('school_details.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">School Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter School Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="logo" name="logo"
                                                accept="image/*">
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter School Email">
                                </div>

                                <div class="form-group">
                                    <label for="contact_numbers">Contact Numbers:</label>
                                    <input type="text" class="form-control" id="contact_numbers" name="contact_numbers"
                                        placeholder="Enter Contact Numbers">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address">
                                </div>

                                <div class="form-group">
                                    <label for="establishment_year">Establishment Year:</label>
                                    <input type="number" class="form-control" id="establishment_year"
                                        name="establishment_year" placeholder="Enter Establishment Year" min="1900"
                                        max="{{ date('Y') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone_numbers">Phone Numbers:</label>
                                    <input type="text" class="form-control" id="phone_numbers" name="phone_numbers"
                                        placeholder="Enter Phone Numbers">
                                </div>

                                <div class="form-group">
                                    <label for="website_url">Website URL:</label>
                                    <input type="url" class="form-control" id="website_url" name="website_url"
                                        placeholder="Enter Website URL">
                                </div>

                                <div class="form-group">
                                    <label for="number_of_students">Number of Students:</label>
                                    <input type="number" class="form-control" id="number_of_students"
                                        name="number_of_students" placeholder="Enter Number of Students" min="0">
                                </div>

                                <div class="form-group">
                                    <label for="number_of_staffs">Number of Staffs:</label>
                                    <input type="number" class="form-control" id="number_of_staffs" name="number_of_staffs"
                                        placeholder="Enter Number of Staffs" min="0">
                                </div>

                                <div class="form-group">
                                    <label for="programs_offered">Programs Offered:</label>
                                    <textarea class="form-control" id="programs_offered" name="programs_offered" rows="4"
                                        placeholder="Enter Programs Offered"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

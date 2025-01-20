@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Academic') }}</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Add Image</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Form start -->
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image"
                                                accept="image/*" onchange="previewImage(event)">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <!-- Image preview section -->
                                    <div class="mt-2">
                                        <img id="preview" src="#" alt="Image Preview"
                                            style="display: none; max-width: 150px;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
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

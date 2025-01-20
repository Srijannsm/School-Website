@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">{{ __('School Details Editing') }}</h1> --}}
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
                            <h3 class="card-title">News Editing</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('news.update', $news->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Add this to specify it's an update request -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ $news->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description:</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           value="{{ $news->description }}" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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

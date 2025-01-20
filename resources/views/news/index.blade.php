@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('News') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('news.create') }}" class="btn btn-primary">
                        {{ __('Create News') }}
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
                            @if ($news->isEmpty())
                                <p>No news added yet.</p>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($news as $new)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $new->title }}</td>
                                            <td>{{ $new->description }}</td>
                                            <td>
                                                <a href="{{ route('news.edit', ['id' => $new->id]) }}"
                                                    class="btn btn-success pull-right" role="button">Edit
                                                </a>
                                                <a href="{{ route('news.destroy', ['id' => $new->id]) }}"
                                                    class="btn btn-danger pull-right" role="button">Remove
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach 
                            </table>
                            @endif
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

@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Notices') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('notices.create') }}" class="btn btn-primary">
                        {{ __('Create Notice') }}
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
                            @if ($notices->isEmpty())
                                <p>No notices added yet.</p>
                            @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="width: 70%;">Title</th>
                                        {{-- <th scope="col">File</th> --}}
                                        <th scope="col" >Action</th>
                                    </tr>
                                </thead>
                                @foreach ($notices as $notice)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td style="font-weight: bold; color:rgba(69, 13, 238, 0.727)">{{ $notice->title }}</td>
                                            {{-- <td>{{ $notice->file_path }}</td> --}}
                                            <td>
                                                <a href="{{ route('notices.download', ['id' => $notice->id]) }}" class="btn btn-primary">Download</a>
                                                <a href="{{ route('notices.edit', ['id' => $notice->id]) }}"
                                                    class="btn btn-success pull-right" role="button">Edit
                                                </a>
                                                <a href="{{ route('notices.destroy', ['id' => $notice->id]) }}"
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

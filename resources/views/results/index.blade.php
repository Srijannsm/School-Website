@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Results') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('results.create') }}" class="btn btn-primary">
                        {{ __('Add Results') }}
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
                            @if ($results->isEmpty())
                                <p>No results added yet.</p>
                            @else
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" style="width: 70%;">Result</th>
                                            {{-- <th scope="col">File</th> --}}
                                            <th scope="col" >Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($results as $result)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td style="font-weight: bold; color:red">{{ $result->title }}</td>
                                                {{-- <td>{{ $result->file_path }}</td> --}}
                                                <td>
                                                    <a href="{{ route('results.download', ['id' => $result->id]) }}" class="btn btn-primary">Download</a>
                                                    <a href="{{ route('results.edit', ['id' => $result->id]) }}"
                                                        class="btn btn-success pull-right" role="button">Edit
                                                    </a>
                                                    <a href="{{ route('results.destroy', ['id' => $result->id]) }}"
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

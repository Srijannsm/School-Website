@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Images') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                        {{ __('Add Image') }}
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-primary">
                    {{-- <div class="card-header">
                        <h4 class="card-title">School Images</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-sm-2 d-flex flex-column align-items-center justify-content-center mb-4" >
                                    <!-- Image Link -->
                                    <a href="{{ asset('storage/' . $image->image) }}" data-toggle="lightbox"
                                        data-title="sample 1 - white" data-gallery="gallery" style="display: block; margin-top: auto;">
                                        <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid mb-2"
                                            alt="white sample" style="max-width: 100%; height: auto; display: block; margin: auto;" />
                                    </a>
                                    <!-- Remove Button -->
                                    <a href="{{ route('gallery.destroy', ['id' => $image->id]) }}"
                                        class="btn btn-default mt-auto" role="button" style="width: 100%;">
                                        Remove
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

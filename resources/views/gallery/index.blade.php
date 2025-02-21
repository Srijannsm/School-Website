@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">{{ __('Images') }}</h1> --}}
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
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        @foreach ($images as $image)
                            @php
                                $imagePaths = json_decode($image->image); // Decode the JSON array
                            @endphp
                            @foreach ($imagePaths as $path)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                                    <!-- Image Link with Hover Effect -->
                                    <a href="{{ asset('storage/' . $path) }}" data-toggle="lightbox"
                                        data-title="sample 1 - white" data-gallery="gallery" class="d-block">
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $path) }}" class="img-fluid img-thumbnail"
                                                alt="image" />
                                            <div class="image-title">{{ $image->title }}</div>
                                        </div>
                                    </a>

                                    <!-- Remove Button -->
                                    <a href="{{ route('gallery.destroy', ['id' => $image->id]) }}" 
                                       class="btn btn-default mt-auto w-100">
                                        Remove
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection



<style>
/* Image container with hover effect */
.image-container {
    position: relative;
    overflow: hidden; /* Ensure that hover effect is contained */
}

/* Hide the title by default */
.image-title {
    position: absolute;
    bottom: 10px;  
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);  
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    padding: 5px;
    text-align: center;
    opacity: 0;  
    transition: opacity 0.3s ease;  
}

/* Make the title visible on hover */
.image-container:hover .image-title {
    opacity: 1;  
}

/* Image hover effect */
.image-container:hover .img-thumbnail {
    transform: scale(1.05);  
    transition: transform 0.3s ease;
}

/* Responsive grid for images */
.row {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 15px;
}

/* Ensuring the grid adjusts for different screen sizes */
@media (max-width: 576px) {
    .row {
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));  
    }
}

/* Optional: If you want to limit the height of the container with overflow scroll */
.card-body {
    max-height: 500px;
    overflow-y: auto;
}

    </style>
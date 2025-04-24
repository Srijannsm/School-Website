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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Scrollable Gallery Section -->
            <div class="gallery-scroll-container">
                <div class="card card-primary">
                    <div class="card-body">
                        @foreach ($images as $image)
                            @php
                                $imagePaths = json_decode($image->images); // Decode the JSON array
                            @endphp
                            <div class="image-section">
                                <!-- Title and Remove Button -->
                                <div class="image-title d-flex justify-content-between align-items-center">
                                    <span>{{ $image->title }}</span>
                                    <a href="{{ route('gallery.destroy', ['id' => $image->id]) }}" 
                                       class="btn btn-danger btn-sm">
                                        Remove
                                    </a>
                                </div>
                                <!-- Scrollable Image Container -->
                                <div class="image-scroll-container">
                                    <div class="image-grid">
                                        @foreach ($imagePaths as $path)
                                            <div class="image-item">
                                                <a href="{{ asset('storage/' . $path) }}" data-toggle="lightbox"
                                                    data-title="sample 1 - white" data-gallery="gallery" class="d-block">
                                                    <div class="image-container">
                                                        <img src="{{ asset('storage/' . $path) }}" class="img-fluid img-thumbnail"
                                                            alt="image" />
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- End Scrollable Gallery Section -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

<style>
/* Prevent the page from expanding */
.content {
    max-width: 100%;
    overflow: hidden;
}

/* Scrollable gallery container */
.gallery-scroll-container {
    max-height: 600px; /* Adjust this height based on your layout */
    overflow-y: auto; /* Enable scrolling for the entire section */
    padding-right: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
}

/* Image section styling */
.image-section {
    margin-bottom: 20px;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    overflow: hidden;
    max-width: 100%;
}

/* Title and remove button */
.image-title {
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    text-align: center;
    padding: 10px;
    margin-bottom: 10px;
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    border-radius: 6px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Scrollable image container */
.image-scroll-container {
    max-height: 250px; /* Limit height of individual image sections */
    overflow-y: auto; /* Scroll within each section */
    padding-right: 10px;
}

/* Image grid */
.image-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: flex-start;
    max-width: 100%;
}

/* Image item */
.image-item {
    width: calc(25% - 10px); /* 4 images per row */
    max-width: 200px;
    flex-grow: 1;
}

/* Image container styling */
.image-container {
    position: relative;
    overflow: hidden;
    border-radius: 6px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%;
}

/* Image hover effect */
.image-container:hover {
    transform: scale(1.05);
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
}

/* Ensure images are responsive */
img {
    max-width: 100%;
    height: auto;
}

/* Fix layout for small screens */
@media (max-width: 992px) {
    .image-item {
        width: calc(33.33% - 10px); /* 3 images per row */
    }
}

@media (max-width: 768px) {
    .image-item {
        width: calc(50% - 10px); /* 2 images per row */
    }
}

@media (max-width: 576px) {
    .image-item {
        width: calc(100% - 10px); /* 1 image per row */
    }
}
</style>

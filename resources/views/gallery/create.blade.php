@extends('layouts.app')

@section('content')

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Add Images') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Images</h3>
                        </div>

                        <!-- Form Start -->
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
                            class="dropzone" id="image-dropzone">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="dz-message">
                                Drag & Drop your images here or click to upload.
                            </div>
                        </form>

                        <!-- Submit Button -->
                        <button id="submit-button" class="btn btn-primary">Upload</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.imageDropzone = {
            url: "{{ route('gallery.store') }}",
            paramName: "images",
            maxFilesize: 10,
            acceptedFiles: "image/*",
            uploadMultiple: true,
            parallelUploads: 10,
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: "Drag & Drop images or click to upload",

            init: function() {
                var myDropzone = this;

                document.getElementById("submit-button").addEventListener("click", function() {
                    if (myDropzone.files.length === 0) {
                        alert("Please select at least one image.");
                        return;
                    }

                    myDropzone.options.params = {
                        title: document.getElementById('title').value
                    };

                    myDropzone.processQueue(); // Start upload
                });

                this.on("sending", function(file, xhr, formData) {
                    formData.append("_token", document.querySelector('input[name="_token"]').value);
                });

                this.on("success", function(file, response) {
                    console.log("Upload success:", response);

                    // Redirect to index page after successful upload
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                });

                this.on("error", function(file, response) {
                    console.log("Upload failed:", response);
                });
            }
        };
    </script>
@endsection

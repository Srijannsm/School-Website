@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Academic') }}</h1>
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
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="name">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                                </div>

                                <!-- Image Upload (Multiple) -->
                                <div class="form-group">
                                    <label for="images">Images:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="images[]" accept="image/*" multiple onchange="previewImages(event)">
                                            <label class="custom-file-label" for="images">Choose files</label>
                                        </div>
                                    </div>
                                    <!-- Image Preview Section -->
                                    <div class="mt-2" id="image-preview-container"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function previewImages(event) {
        let container = document.getElementById('image-preview-container');
        container.innerHTML = ''; // Clear previous previews
        let files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-2');
                img.style.maxWidth = '150px';
                container.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }
</script>
@endsection

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
                            <h3 class="card-title">Academics Editing</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('academics.update', $academics->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Add this to specify it's an update request -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ $academics->title }}" required>
                                </div>
                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Upload New Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                </div>

                                <!-- Display Current Image -->
                                @if($academics->image)
                                    <div class="form-group">
                                        <label>Current Image:</label>
                                        <br>
                                        <img src="{{ asset('storage/' . $academics->image) }}" alt="Academic Image" class="img-thumbnail" width="200">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Description:</label>
                                    <textarea class="form-control editor" id="description" name="description">{!! old('description', $academics->description) !!}</textarea>
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

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.init({
        selector: '.editor', // Targets elements with class "editor"
        height: 500, // Adjust height as needed
        menubar: true, // Enables the menu bar
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
            'image imagetools codesample hr toc emoticons',
            'directionality fullscreen pagebreak save autosave',
            'visualchars nonbreaking quickbars template'
        ],
        toolbar: 'undo redo | formatselect | fontselect fontsizeselect |' +
            'bold italic underline strikethrough forecolor backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'link image media codesample | blockquote subscript superscript hr |' +
            'table tabledelete | visualblocks visualchars | ' +
            'ltr rtl | fullscreen preview | save print | pagebreak template ',

        content_css: '//www.tiny.cloud/css/codepen.min.css',
        
        image_advtab: true, // Enables advanced image options
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        
        // File picker for custom image uploads
        file_picker_callback: function (callback, value, meta) {
            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
                let file = this.files[0];
                let reader = new FileReader();
                reader.onload = function () {
                    callback(reader.result, { alt: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },

        quickbars_insert_toolbar: 'quickimage quicktable',
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
        contextmenu: "link image table",
        
        branding: false // Removes "Powered by TinyMCE" branding
    });
</script>


@endsection

@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h3 class="page-title">Buat Pertanyaan</h3>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/question">List Pertanyaan</a></li>
                                        <li class="breadcrumb-item active">Buat Pertanyaan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content" id="dw">
            <div class="container-fluid">
                <form action="/question" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Pertanyaan</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Tulis Judul pertanyaan"
                            required value="{{ old('judul', '') }}">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Pertanyaan</label>
                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <textarea name="isi" id="isi" class="form-control my-editor"
                            placeholder="Tulis isi detail pertanyaan disini !" rows="8"
                            value="{{ old('isi', '') }}"></textarea>
                        @error('isi')
                            <div class="alert alert-danger">{{ 'Kolom Pertanyaan Wajib Diisi' }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag Pertanyaan</label>
                        <input type="text" class="form-control" id="tags" name="tags"
                            placeholder="Tulis Tag dari pertanyaan" required value="{{ old('tags', '') }}">
                        <small id="judulHelp" class="form-text text-muted">pisahkan setiap tag dengan tanda koma (,)</small>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            forced_root_block: '',
            force_br_newlines: true,
            force_p_newlines: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);

    </script>
@endsection

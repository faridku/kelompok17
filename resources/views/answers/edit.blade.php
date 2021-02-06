@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h3 class="page-title">Edit Jawaban</h3>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/question">List Pertanyaan</a></li>
                                        <li class="breadcrumb-item active">Jawaban</li>
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
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $question->judul }}</h3>
                        <p class="card-subtitle text-muted">Dibuat Oleh : {{ $question->user->name }}</p>
                        <p class="card-text">{!! $question->isi !!}</p>
                    </div>
                </div>
                <form action="/answer/{{ $answer->id }} " method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="isi">Jawab</label>
                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <textarea name="isi" id="isi" class="form-control my-editor" placeholder="Tulis Jawaban !"
                            rows="8">{{ $answer->isi }}</textarea>
                        @error('isi')
                            <div class="alert alert-danger">{{ 'Kolom Jawaban Wajib Diisi' }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Jawaban</button>
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
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

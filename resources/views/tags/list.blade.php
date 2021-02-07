@extends('layouts.master')
@section('title')
    <title>Tag : {{ $tag->tag_name }} </title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h3 class="page-title">Tag : {{ $tag->tag_name }}</h3>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/question">List Pertanyaan</a></li>
                                        <li class="breadcrumb-item active">Tags</a></li>
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
            <div class="container-fluid col-md-12">
                @foreach ($list as $question)
                    <div class="row-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $question->judul }}</h5>
                                <p class="card-subtitle text-muted">Dibuat Oleh : {{ $question->user->name }} / Pada
                                    tanggal
                                    : {{ $question->created_at }}</p>
                                <p class="card-text">{!! $question->isi !!}</p>
                                @foreach ($question->tags as $tag)
                                    <a href="/tag/{{ $tag->id }}"
                                        class="btn badge badge-pill badge-dark">{{ $tag->tag_name }}</a>
                                @endforeach
                                <br>
                                <div class="mt-2">
<<<<<<< HEAD
                                    <a href="/answer/create/{{ $question->id }}"
                                        class="card-link btn btn-success">Bantu Jawab</a>
                                    <a href="/question/{{ $question->id }}"
                                        class="card-link btn btn-info">Details
=======
                                    <a href="/answer/create/{{ $question->id }}" class="card-link btn btn-success">Bantu
                                        Jawab</a>
                                    <a href="/question/{{ $question->id }}" class="card-link btn btn-info">Details
>>>>>>> 7af3198736b94c3f1acb1f6243aaf97a8f95b518
                                        Pertanyaan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection

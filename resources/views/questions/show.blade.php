@extends('layouts.master')
@section('title')
    <title>Details Pertanyaan</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h3 class="page-title">Details Pertanyaan ID : {{ $question->id }}</h3>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/question">List Pertanyaan</a></li>
                                        <li class="breadcrumb-item active">Details Pertanyaan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content" id="dw">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title"> {{ $question->judul }} </h3>
                            <p class="card-subtile text-muted">Dibuat Oleh {{ $question->user->name }} / Pada tanggal :
                                {{ $question->created_at }}</p>
                        </div>
                        <div class="card-body">
                            <p class="text-black-50"> {!! $question->isi !!} </p>
                            <a href="/answer/create/{{ $question->id }}" class="card-link btn btn-success">Bantu Jawab</a>
                            @if (Auth::id() == $question->user_id)
                                <a href="/question/{{ $question->id }}/edit" class="card-link btn btn-info">Edit
                                    pertanyaan</a>
                                <form action="/question/{{ $question->id }}" style="display: inline;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger ml-3">
                                        <i class="fa fa-trash" aria-hidden="true">
                                            Hapus Pertanyaan
                                        </i>
                                    </button>
                                    <br>
                                    {{-- <a href=" {{action('VoteController@upvote')}} " class="fa fa-arrow-up mr-4
                            like">UPVOTE</a> --}}
                                    {{-- <a href=" {{action('VoteController@downvote')}} " class="fa fa-arrow-down
                            like">DOWNVOTE</a> --}}
                                </form>
                            @else
                            @endif
                            {{-- Comments --}}
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Komentar
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form action="/comment/{{ $question->id }}" class="form-inline" method="POST">
                                        @csrf
                                        <div class="form-group m-2">
                                            <label for="comment">{{ Auth::user()->name }}</label>
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                                            {{-- try --}}
                                            {{-- <input type="hidden" name="answer_id" value="{{ $answer->id }}"> --}}
                                            <input type="text" class="form-control ml-2 mr-2" name="comment" id="comment"
                                                placeholder="Tulis Komentar.." required>
                                            <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                                        </div>
                                    </form>
                                    <hr>
                                    @foreach ($comment as $com)
                                        @if ($com->question_id == $question->id)
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-bold">
                                                        {{ $com->user->name }} :
                                                    </div>
                                                    {{ $com->isi }}
                                                    @if ($com->user_id == Auth::id())
                                                        <div class="float-right">
                                                            <form action="/comment/{{ $com->id }}"
                                                                style="display: inline;" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link text-danger">
                                                                    <i class="fa fa-trash" aria-hidden="true">
                                                                        Hapus Komentar
                                                                    </i>
                                                                </button>
                                                                <input type="hidden" name="question_id"
                                                                    value="{{ $question->id }}">
                                                            </form>
                                                        </div>
                                                    @else

                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Jawaban</h3>
                <hr>
            </div>

            @foreach ($answer as $answer)
                <div class="row">
                    <div class="card col-md-12">
                        @if ($answer->check == 1)
                            <div class="card-header with-border bg-success">
                                <p class="card-subtile text-muted text-black-50 text-bold">Dibuat Oleh
                                    {{ $answer->user->name }} /
                                    Pada tanggal : {{ $question->created_at }} Ditandai Benar</p>
                            </div>
                        @else
                            <div class="card-header with-border bg-gray">
                                <p class="card-subtile text-muted text-black-50 text-bold">Dibuat Oleh
                                    {{ $answer->user->name }} /
                                    Pada tanggal : {{ $question->created_at }}</p>
                            </div>
                        @endif
                        <div class="card-body">
                            <p class="text-black-50"> {!! $answer->isi !!} </p>
                            @if (Auth::id() == $answer->user_id)
                                <a href="/answer/{{ $answer->id }}/edit" class="card-link btn btn-info">Edit Jawaban</a>
                                <form action="/answer/{{ $answer->id }}" style="display: inline;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger">
                                        <i class="fa fa-trash" aria-hidden="true">
                                            Hapus Jawaban
                                        </i>
                                    </button>
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                </form>
                            @else
                            @endif
                            @if (Auth::id() == $question->user_id)
                                <a href="/answer/{{ $answer->id }}/verify"
                                    class="card-link btn btn-outline-success">Tandai Jawaban Benar</a>
                            @endif
                            {{-- Comment --}}
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Komentar
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form action="/comment/answer/{{ $answer->id }}" class="form-inline" method="POST">
                                        @csrf
                                        <div class="form-group m-2">
                                            <label for="comment">{{ Auth::user()->name }}</label>
                                            <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                                            <input type="text" class="form-control ml-2 mr-2" name="comment" id="comment"
                                                placeholder="Tulis Komentar.." required>
                                            <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                                        </div>
                                    </form>
                                    <hr>
                                    @foreach ($comment as $com)
                                        @if ($com->answer_id == $answer->id)
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-bold">
                                                        {{ $com->user->name }} :
                                                    </div>
                                                    {{ $com->isi }}
                                                    @if ($com->user_id == Auth::id())
                                                        <div class="float-right">
                                                            <form action="/comment/answer/{{ $com->id }}"
                                                                style="display: inline;" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link text-danger">
                                                                    <i class="fa fa-trash" aria-hidden="true">
                                                                        Hapus Komentar
                                                                    </i>
                                                                </button>
                                                                <input type="hidden" name="question_id"
                                                                    value="{{ $question->id }}">
                                                            </form>
                                                        </div>
                                                    @else

                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            {{-- <a href=" {{ action('VoteController@upvote') }} " class="fa fa-arrow-up mr-4 like">UPVOTE</a> --}}
                            {{-- <a href=" {{ action('VoteController@downvote') }} " class="fa fa-arrow-down like">DOWNVOTE</a> --}}
                            <br>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
@section('js')
@endsection

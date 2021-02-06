@extends('layouts.master')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h3 class="page-title">Dashboard</h3>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                <div class="row">

                    <div class="card col-md-12">
                        <div class="card-body with-border">
                            <h3 class="page-title">Selamat Datang, {{ Auth::user()->name }}</h3>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-dark" href="/profile/{{ Auth::user()->id }}/edit">Edit Profile</a>
                            <a class="btn btn-info ml-3" href="/profile/{{ Auth::user()->id }}/sertif">Cetak Sertif</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

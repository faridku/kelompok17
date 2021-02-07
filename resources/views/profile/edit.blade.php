@extends('layouts.master')

@section('title')
    <title>Edit Profile</title>
@endsection
@section('content')
    <section class="content" id="dw">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="/profile/{{ Auth::user()->id }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title">Personal Info</h4>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">
                                        Nick Name
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Nick Name Here" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">First
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fname" id="fname"
                                            placeholder="First Name Here" value="{{ $user->fname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lname" id="lname"
                                            placeholder="Last Name Here" value="{{ $user->lname }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email Name Here" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 text-right control-label col-form-label">Address
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                            placeholder="Address Here" value="{{ $user->alamat }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nohp" class="col-sm-3 text-right control-label col-form-label">Contact
                                        No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nohp" id="nohp"
                                            placeholder="Contact No Here" value="{{ $user->nohp }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-3 text-right control-label col-form-label">Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Photo Here" value="{{ $user->foto }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                            <a href="/home" class="btn btn-danger ml-3 px-4">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

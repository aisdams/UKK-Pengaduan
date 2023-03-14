@extends('layout')
@section('header-judul', 'Edit Data Petugas')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
          <h2 class="mb-3">Edit Petugas</h2>
        </div>
        <form class="forms-sample" action="{{ url('data-petugas',$petugas->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <h6>Nama Lengkap <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" value="{{$petugas-> nama_petugas}}" placeholder="Enter Nama Petugas">
            @error('nama_petugas')<div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <h6>Username <span class="text-danger">*</span></h6>
            <input type="text" value="{{$petugas-> username}}" class="form-control @error('username') is-invalid @enderror" name="username"
              placeholder="Enter Username">
              @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>No Telpon <span class="text-danger">*</span></h6>
          <input type="number" value="{{$petugas-> telp}}" class="form-control @error('telp') is-invalid @enderror" name="telp"
            placeholder="Enter No Telp">
            @error('telp')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
          <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
          <button class="btn btn-light"><a href="/data-petugas" style="text-decoration: none">Cancel</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection
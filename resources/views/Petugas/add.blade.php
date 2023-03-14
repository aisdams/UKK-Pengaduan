@extends('layout')
@section('header-judul', 'Add Data Petugas')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
          <h2 class="mb-3">Add New Customer</h2>
        </div>
        <form class="forms-sample" action="{{ url('data-petugas')}}" method="POST">
          @csrf
          <div class="form-group">
            <h6>Nama Lengkap <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" placeholder="Enter Nama Petugas">
            @error('nama_petugas')<div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <h6>Username <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
              placeholder="Enter Username">
              @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>No Telpon <span class="text-danger">*</span></h6>
          <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp"
            placeholder="Enter No Telp">
            @error('telp')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control @error('level') is-invalid @enderror" name="level" value="petugas"
            placeholder="Enter No level">
        </div>
        <div class="form-group">
          <h6>Password <span class="text-danger">*</span></h6>
          <div class="input-group-append">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            <span class="input-group-text" style="background-color: blueviolet" onclick="password_show_hide()">
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
            </span>
        </div>
        @error('password')<div class="invalid-feedback m-5" >{{$message}}</div>@enderror
        </div>
          <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
<script>
    function password_show_hide() {
       var x = document.getElementById("password");
       var show_eye = document.getElementById("show_eye");
       var hide_eye = document.getElementById("hide_eye");
       hide_eye.classList.remove("d-none");
       if (x.type === "password") {
           x.type = "text";
           show_eye.style.display = "none";
           hide_eye.style.display = "block";
       } else {
           x.type = "password";
           show_eye.style.display = "block";
           hide_eye.style.display = "none";
       }
       }
    </script>
@endpush
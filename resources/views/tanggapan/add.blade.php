@extends('layout')
@section('header-judul', 'Add Data Petugas')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
          <h2 class="mb-3">Add New Tanggapan</h2>
        </div>
        <form class="forms-sample" action="{{ url('tanggapan')}}" method="POST">
          @csrf
          <div class="form-group">
            <h6>Isi Laporan <span class="text-danger">*</span></h6>
            <select class="form-control" name="pengaduan_id"> 
                <option disabled selected>Pilih Isi Laporan</option>
                @foreach ($pengaduan as $idx)
                  <option value="{{$idx->id}}">{{$idx->isilaporan}}-{{$idx->tgl_pengaduan}}</option>
                @endforeach
            </select>
            @error('pengaduan_id')<div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <h6>Tanggal Tanggapan <span class="text-danger">*</span></h6>
            <input type="date" class="form-control " name="tgl_tanggapan"
              placeholder="Enter Tanggal Tanggapan">
              @error('tgl_tanggapan')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>Tanggapan <span class="text-danger">*</span></h6>
            <textarea class="form-control " name="tanggapan"
              placeholder="Enter Tanggal Tanggapan"></textarea>
              @error('tanggapan')<div class="invalid-feedback">{{$message}}</div>@enderror
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
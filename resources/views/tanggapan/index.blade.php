@extends('layout')
@section('header-judul', 'Tanggapan')
@section('content')
@push('style')
@endpush

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h2>Tabel Tanggapan</h2>
        <a href="{{ url('tanggapan/create') }}" style="text-decoration: none" class="tbl-btn button btn-primary p-2 rounded-2">Add New Tanggapan</a>
      </div>
      <hr class="border-dark my-4">
      <div class="table-responsive">
        <table class="table table-hover table-striped border rounded-1">
          <thead>
            <tr>
              <th class="fw-bold text-center">No</th>
              <th class="fw-bold text-center">Pengaduan</th>
              <th class="fw-bold text-center">Id Petugas</th>
              <th class="fw-bold text-center">Nama Petugas</th>
              <th class="fw-bold text-center">Tanggapan</th>
              <th class="fw-bold text-center">Foto</th>
              <th class="fw-bold text-center">Status</th>
              <th class="fw-bold text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($tanggapan as $idx)
              <tr>
                <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                <td class="text-center fs-6">{{$idx->pengaduan->isilaporan}}</td>
                <td class="text-center fs-6">{{$idx->user->id_petugas}}</td>
                <td class="text-center fs-6">{{$idx->user->nama_petugas}}</td>
                <td class="text-center fs-6">{{$idx->tanggapan}}</td>
                <td class="text-center fs-6"><img src="{{ asset('img/'.$idx->pengaduan->foto) }}" width="100px"/></td>
                <td class="text-center fs-6">{{$idx->pengaduan->status}}</td>
                {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                <td class=" text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal">
                  Edit Status
                </button>
                </td>
                <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editStatusModalLabel">Edit Status Pengaduan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tanggapan.update', $idx->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="status">Status Pengaduan</label>
                          <select class="form-control" id="status" name="status">
                            <option value="proses" {{ $idx->pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $idx->pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
$('.delete').click(function(event) {
var form =  $(this).closest("form");
var name = $(this).data("name");
event.preventDefault();
swal({
    title: `Are you sure you want to delete ${name}?`,
    text: "If you delete this, it will be gone forever.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    form.submit();
    swal("Data berhasil di hapus", {
          icon: "success",
          });
  }else 
  {
    swal("Data tidak jadi dihapus");
  }
});
});
</script>

<script>
  @if (Session::has('success'))
  toastr.success("{{ Session::get('success') }}")
  @endif
</script>

@endpush
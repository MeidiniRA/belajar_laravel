@extends('layout.master')
@section ('konten')
	<div class="row">
		<div class="col-12">
		<h1>Data Pegawai</h1>
		<div class= "col-12">
			<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
  Tambah Data
</button>
		</div>
		<br>
		<br>
<table class="table table-striped">
		<tr>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
		@foreach($data_pegawai as $pegawai)
		<tr>
		<td>{{$pegawai->nama_depan}}</td>
		<td>{{$pegawai->nama_belakang}}</td>
		<td>{{$pegawai->jenis_kelamin}}</td>
		<td>{{$pegawai->agama}}</td>
		<td>{{$pegawai->alamat}}</td>
		<td>
			<a href="/pegawai/{{$pegawai->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
			<a href="/pegawai/{{$pegawai->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure for Delete?')">Dalete</a>
		</td>
		</tr>
		@endforeach
</table>
</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/pegawai/create">
        {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Depan</label>
    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input nama depan">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Belakang</label>
    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input nama belakang">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
    	<option value="L">Laki-Laki</option>
    	<option value="P">Perempuan</option>	
    </select>
  </div>

   <div class="form-group">
    <label for="agama">Agama</label> 
      <select id="agama" name="agama" class="custom-select">
        <option value="islam">Islam</option>
        <option value="kristen">Kristen</option>
        <option value="katolik">Katolik</option>
        <option value="buddha">Buddha</option>
        <option value="hindu">Hindu</option>
        <option value="konghucu">Konghucu</option>
      </select>
    </div> 

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="isi alamat lengkap" rows="3"></textarea>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      </div>
    </div>
  </div>
</div>
@endsection

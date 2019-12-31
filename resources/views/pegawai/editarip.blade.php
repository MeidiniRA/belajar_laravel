@extends('layout.master')
@section ('konten')
<h1>Edit Data Pegawai</h1>
	<div class="row">
  <div class="col-lg-12">
  <form method="POST" action="/pegawai/{{$pegawai->id}}/update">
        {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Depan</label>
    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input nama depan" value="{{$pegawai->nama_depan}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Belakang</label>
    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input nama belakang" value="{{$pegawai->nama_belakang}}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
    	<option value="L" @if($pegawai->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
    	<option value="P"@if($pegawai->jenis_kelamin == 'P') selected @endif>Perempuan</option>	
    </select>
  </div>

   <div class="form-group">
    <label for="agama">Agama</label> 
      <select id="agama" name="agama" class="custom-select">
        <option value="islam" @if($pegawai->agama == 'islam') selected @endif>Islam</option>
        <option value="kristen"@if($pegawai->agama == 'kristen') selected @endif>Kristen</option>
        <option value="katolik"@if($pegawai->agama == 'katolik') selected @endif>Katolik</option>
        <option value="buddha"@if($pegawai->agama == 'buddha') selected @endif>Buddha</option>
        <option value="hindu"@if($pegawai->agama == 'hindu') selected @endif>Hindu</option>
        <option value="konghucu"@if($pegawai->agama == 'konghucu') selected @endif>Konghucu</option>
      </select>
    </div> 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="isi alamat lengkap" rows="3">{{$pegawai->alamat}}</textarea>
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
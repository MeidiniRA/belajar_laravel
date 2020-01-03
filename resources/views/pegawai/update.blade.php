@extends('layouts.index') 
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">
                  Edit Form Pegawai</h1>
              </div>
              @foreach($data as $d)
              <form class="user" method="POST" action="{{route('pegawai.update',$d->id)}}">
              @csrf
              @method('PUT')
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="nama" value="{{$d->nama}}">
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_jk = ['L','P'];
                    @endphp
                    <label>Gender : </label>
                    @foreach($ar_jk as $jk)
                    @php
                    //edit data jenis kelamin yg lama
                    $cek = ($d->gender == $jk) ? 'checked' : '';
                    @endphp
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jk" value="{{ $jk }}" {{$cek}}>
                      <label class="form-check-label">{{ $jk }}</label>
                    </div>
                    @endforeach
                  </div>

                </div>
                <div class="form-group">
                    @php
                    //ambil dari jabatan = select * from jabatan
                    $rs = App\Jabatan::all();
                    @endphp
                    <select name="jabatan" class="form-control">
                      <option value="">-- Pilih Jabatan --</option>
                      @foreach($rs as $row)
                      @php
                      //edit data status yg lama
                      $sel = ($d->idjabatan == $row->id) ? 'selected' : '';
                      @endphp
                      <option value="{{ $row->id }}" {{$sel}}>{{ $row->nama }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Alamat : </label><br/>
                  <textarea name="alamat" class="form-control">{{ $d->alamat }}</textarea>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="hp" class="form-control form-control-user" placeholder="HP" value="{{ $d->hp }}">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="jumlah" class="form-control form-control-user" placeholder="Jumlah Anak" value="{{ $d->jumlah_anak }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Foto : </label>
                    <input type="file" class="form-control-file" name="foto" value="{{ $d->foto }}">
                  </div>
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_status = ['Menikah','Belum'];
                    @endphp
                    <label>Status : </label><br/>
                    @foreach($ar_status as $status)
                    @php
                    //edit data status yg lama
                    $cek2 = ($d->status == $status) ? 'checked' : '';
                    @endphp
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" value="{{ $status }}" {{$cek2}}>
                      <label class="form-check-label">{{ $status }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

              </form>
              @endforeach
                
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
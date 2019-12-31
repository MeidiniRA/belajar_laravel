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
                  Form Pegawai</h1>
                  <br>
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="nama" value="">
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm">
                    @php
                    $ar_jk = ['L','P'];
                    @endphp
                    <label>Gender : </label>
                    @foreach($ar_jk as $jk)
                    <input type="radio" class="form-control form-control-user" name="jk" value="{{ $jk }}"> {{ $jk }}
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
                      <option value="{{ $row->id }}">{{ $row->nama }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <textarea name="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="hp" class="form-control form-control-user" placeholder="HP">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="jumlah" class="form-control form-control-user" placeholder="Jumlah Anak">
                  </div>
                </div>

                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Foto : </label>
                    <input type="file" class="form-control form-control-user" name="foto" value="">
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_status = ['Menikah','Belum'];
                    @endphp
                    <label>Status : </label>
                    @foreach($ar_status as $status)
                    <input type="radio" class="form-control form-control-user" name="status" value="{{ $status }}"> {{ $status }}
                    @endforeach
                  </div>

                </div>



                <button type="button" class="btn btn-primary">Simpan</button>

              </form>
                
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
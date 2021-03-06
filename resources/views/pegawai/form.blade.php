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
                  Input Form Pegawai</h1>
              </div>
              <form class="user" method="POST" action="{{route('pegawai.store')}}">
              @csrf
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" name="nama" value="{{old('nama')}}">
                    @error('nama')
                    <!-- <div class="alert alert-danger">{{$message}}</div> -->
                    <div class="invalid-feedback">{{$message}}</div> 
                    @enderror
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_jk = ['L','P'];
                    @endphp
                    <label>Gender : </label>
                    @foreach($ar_jk as $jk)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jk" value="{{ $jk }}">
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
                      <option value="{{ $row->id }}">{{ $row->nama }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Alamat : </label><br/>
                  <textarea name="alamat" class="form-control @error('nama') is-invalid @enderror">{{old('alamat')}}</textarea>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" value="{{old('hp')}}" class="form-control form-control-user @error('nama') is-invalid @enderror" placeholder="HP" />
                    @error('hp')
                    <!-- <div class="alert alert-danger">{{$message}}</div> -->
                    <div class="invalid-feedback">{{$message}}</div> 
                    @enderror
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="jumlah" class="form-control form-control-user" placeholder="Jumlah Anak">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Foto : </label>
                    <input type="file" class="form-control-file" name="foto" value="">
                  </div>
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    @php
                    $ar_status = ['Menikah','Belum'];
                    @endphp
                    <label>Status : </label><br/>
                    @foreach($ar_status as $status)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" value="{{ $status }}">
                      <label class="form-check-label">{{ $status }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

              </form>
                
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
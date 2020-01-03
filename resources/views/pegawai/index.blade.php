		@extends('layouts.index')
		@section('content')
		@php
		$ar_judul = ['No','Nama','Jabatan','Gender','No. Handphone', 'Status', 'Foto', 'Action'];
		$no = 1;
		@endphp

		 <a href="{{route('pegawai.create')}}" class="btn btn-primary">
              Tambah
         </a>

     	</br></br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	@foreach($ar_judul as $jdl)
                      <th>{{$jdl}}</th>
                      	@endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ar_pegawai as $peg)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$peg->nama}}</td>
                      <td>{{$peg->posisi}}</td>
                      <td>{{$peg->gender}}</td>
                      <td>{{$peg->hp}}</td>
                      <td>{{$peg->status}}</td>
                      <td>
                        <center>
                        @if(!empty($peg->foto))
                        <img src="{{asset('img')}}/{{$peg->foto}}" width="20%" />
                        @else
                        <img src="{{asset('img')}}/no-image.jpg" width="20%" />
                        @endif
                        </center>
                      </td>
                      <td width="15%">
                        <center>
                        <form method="POST" action="{{route('pegawai.destroy', $peg->id)}}">
                        <!-- Icon eye untuk mengarahkan ke data detail -->
                      	<a href="{{route('pegawai.show', $peg->id)}}">
                      		<i class="fas fa-eye"></i>
                      	</a> &nbsp;

                       <!-- Icon pencil untuk mengarahkan ke form edit -->
                      	<a href="{{route('pegawai.edit', $peg->id)}}">
                      		<i class="fas fa-pencil-alt"></i> &nbsp;
                      	</a>

                        
                        @csrf
                        @method('DELETE')
                        <!-- Icon trash untuk mengarahkan destroy(hapus) -->
                        <button type="submit" class="btn btn-link" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash-alt"></i></button>
                        </center>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection

@extends('layouts.index')
@section('content')
@php
$ar_judul= ['No', 'Nama','Jabatan','Gender','Hp','Status','Foto','Aksi'];
$no = 1;
@endphp

<!-- DataTales Example -->
<a href="{{route('pegawai.create')}}" class="btn btn-primary">Tambah</a>
<br>
<br>
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
						<td><img src="{{asset('img')}}/{{$peg->foto}}" width="10%"></td>
						<td>
							<a href="{{route('pegawai.show', $peg->id)}}">
							<i class="far fa-star"></i>
							</a>
							<i class="fas fa-pen"></i>
							<i class="fas fa-trash" style="color: #FF0000;" onclick="return confirm('Are You Sure for Delete?')"></i>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
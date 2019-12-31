@extends('layouts.index')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@php
				$no = 1;
				@endphp
				@foreach($ar_jabatan as $jab)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$jab->nama}}</td>
						<td>
							<a href="" class="btn btn-success btn-sm">Show</a>
							<a href="" class="btn btn-warning btn-sm">Edit</a>
							<a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure for Delete?')">Dalete</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
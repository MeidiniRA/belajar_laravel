@extends('layouts.index')
@section('content')
@foreach($data as $peg)
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5">
          <img src="{{asset('img')}}/{{$peg->foto}}"> </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{$peg->nama}}</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="{{$peg->gender}}" disabled="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="{{$peg->posisi}}" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="{{$peg->alamat}}" disabled="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" placeholder="{{$peg->hp}}" disabled="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="{{$peg->status}}" disabled="">
                  </div>
                </div>
                <a href="{{url('/pegawai')}}" class="btn btn-primary">
                  Back
                </a>
                
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endsection
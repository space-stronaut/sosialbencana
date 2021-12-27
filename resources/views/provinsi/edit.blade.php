@extends('layouts.stisla')

@section('header')
    Provinsi Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Provinsi Edit
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.update', $provinsi->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{  $provinsi->nama }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
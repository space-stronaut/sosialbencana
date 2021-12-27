@extends('layouts.stisla')

@section('header')
    Provinsi Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Provinsi Create
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
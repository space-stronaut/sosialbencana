@extends('layouts.stisla')

@section('header')
    Kategori Bencana Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kategori Bencana Create
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
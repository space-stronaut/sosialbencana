@extends('layouts.stisla')

@section('header')
    Kategori Bencana Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kategori Bencana Edit
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="nama" value="{{ $kategori->nama }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
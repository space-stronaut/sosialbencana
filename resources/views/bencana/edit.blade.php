@extends('layouts.stisla')

@section('header')
     Bencana Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                 Bencana Edit
            </div>
            <div class="card-body">
                <form action="{{ route('bencana.update', $bencana->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Bencana</label>
                        <input type="text" name="nama" id="" value="{{ $bencana->nama }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" id="" class="form-control">
                            <option value="">Pilih Kategori...</option>
                            @foreach ($kategoris as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $bencana->kategori_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.stisla')

@section('header')
    Laporan Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Laporan Create
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.store') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" value="proses">
                    @csrf
                    <div class="form-group">
                        <label for="">Bencana</label>
                        <select name="bencana_id" id="" class="form-control">
                            <option value="">Pilih Bencana...</option>
                            @foreach ($bencanas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="photo" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
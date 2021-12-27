@extends('layouts.stisla')

@section('header')
    Kecamatan Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kecamatan Create
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="kota_id" id="" class="form-control" multiple>
                            <option value="">Choose Permission...</option>
                            @forelse ($kotas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
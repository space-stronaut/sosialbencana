@extends('layouts.stisla')

@section('header')
    Kecamatan Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kecamatan Edit
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{$kecamatan->nama}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="kota_id" id="" class="form-control" multiple>
                            <option value="">Choose Kota...</option>
                            @forelse ($kotas as $item)
                                <option value="{{ $item->id }}" {{$item->id == $kecamatan->kota_id ? 'selected' : ''}}>{{ $item->nama }}</option>
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
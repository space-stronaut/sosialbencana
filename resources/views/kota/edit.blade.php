@extends('layouts.stisla')

@section('header')
    Kota Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kota Edit
            </div>
            <div class="card-body">
                <form action="{{ route('kota.update', $kota->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{$kota->nama}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi_id" id="" class="form-control" multiple>
                            <option value="">Choose Permission...</option>
                            @forelse ($provinsis as $item)
                                <option value="{{ $item->id }}" {{$item->id == $kota->provinsi_id ? 'selected' : ''}}>{{ $item->nama }}</option>
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
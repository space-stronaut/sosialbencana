@extends('layouts.stisla')

@section('header')
    Detail Laporan
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <img src="{{ Storage::url($laporan->photo) }}" class="mx-auto" width="400" alt="">
                <table class="w-100 mt-5">
                    <tr>
                        <th>Pelapor</th>
                        <th>:</th>
                        <th>
                            {{$laporan->user->name}}
                        </th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th>:</th>
                        <th>
                            {{ Carbon\Carbon::parse($laporan->created_at)->format('d M Y')}}
                        </th>
                    </tr>
                    <tr>
                        <th>Bencana</th>
                        <th>:</th>
                        <th>
                            {{ $laporan->bencana->nama}}
                        </th>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <th>:</th>
                        <th>
                            {{ $laporan->keterangan}}
                        </th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Add Korban
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.addKorban') }}" method="post">
                    @csrf
                    <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="number" name="umur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" name="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kondisi</label>
                        <input type="text" name="kondisi" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Daftar Korban
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $item)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td>
                                    {{$item->umur}}
                                </td>
                                <td>
                                    {{$item->nik}}
                                </td>
                                <td>
                                    {{$item->kondisi}}
                                </td>
                                <td>
                                    <form action="{{ route('laporan.deleteKorban', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
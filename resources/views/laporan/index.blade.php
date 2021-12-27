@extends('layouts.stisla')

@section('header')
    Laporan
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Laporan
                </span>
                <span>
                    <a href="{{ route('laporan.create') }}" class="btn btn-primary">Create</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pengadu</th>
                            <th scope="col">Bencana</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans as $item)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->bencana->nama}}
                                </td>
                                <td>
                                    {{Carbon\Carbon::parse($item->created_at)->format('d M Y')}}
                                </td>
                                <td>
                                    <span class="badge badge-info text-uppercase">
                                        {{$item->status}}
                                    </span>
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('laporan.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('laporan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ml-2">Hapus</button>
                                    </form>
                                    <form action="{{ route('laporan.validasi', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="disetujui">
                                        <button class="btn btn-success ml-2">Setujui</button>
                                    </form>
                                    <form action="{{ route('laporan.validasi', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="ditolak" value="disetujui">
                                        <button class="btn btn-danger ml-2">Tolak</button>
                                    </form>
                                    <a href="{{ route('laporan.show', $item->id) }}" class="btn btn-warning ml-2">Detail</a>
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
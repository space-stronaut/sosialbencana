@extends('layouts.stisla')

@section('header')
    Provinsi Management
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Provinsi
                </span>
                <span>
                    <a href="{{ route('provinsi.create') }}" class="btn btn-primary">Create</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinsis as $item)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('provinsi.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('provinsi.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ml-2">Hapus</button>
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
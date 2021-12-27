@extends('layouts.stisla')

@section('header')
    User Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                User Edit
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" value="{{ $user->name }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="roles[]" id="" class="form-control">
                            <option value="">Choose Role...</option>
                            @forelse ($roles as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $user->roles[0]->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select name="kecamatan_id" id="" class="form-control">
                            <option value="">Choose Permission...</option>
                            @forelse ($kecamatans as $item)
                                <option value="{{ $item->id }}" {{$item->id == $user->kecamatan_id ? 'selected' : ''}}>{{ $item->nama }}</option>
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
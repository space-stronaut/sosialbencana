@extends('layouts.stisla')

@section('header')
    Role Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Role Edit
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Role</label>
                        <input type="text" name="name" value="{{ $role->name }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Permission</label>
                        <select name="permissions[]" id="" class="form-control" multiple>
                            <option value="">Choose Permission...</option>
                            @forelse ($permissions as $item)
                                <option value="{{ $item->id }}" @foreach ($role->permissions as $i)
                                    {{ $i->id == $item->id ? 'selected' : '' }}
                                @endforeach>{{ $item->name }}</option>
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
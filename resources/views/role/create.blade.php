@extends('layouts.stisla')

@section('header')
    Role Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Role Create
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Role</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Permission</label>
                        <select name="permissions[]" id="" class="form-control" multiple>
                            <option value="">Choose Permission...</option>
                            @forelse ($permissions as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
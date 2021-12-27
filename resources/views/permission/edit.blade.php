@extends('layouts.stisla')

@section('header')
    Permission Edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Permission Edit
            </div>
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Permission</label>
                        <input type="text" value="{{ $permission->name }}" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.stisla')

@section('header')
    Permission Create
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Permission Create
            </div>
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Permission</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
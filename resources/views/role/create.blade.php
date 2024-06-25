@extends('layout')

@section('content')
    <h1>Create a new role</h1>

    <form action="{{ route('role.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Role</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Role</button>
    </form>

@endsection

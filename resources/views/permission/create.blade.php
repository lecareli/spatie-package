@extends('layout')

@section('content')

    <h1>Create a new permission</h1>

    <form action="{{ route('permission.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Permission</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Role</button>
    </form>

@endsection

@extends('layout')

@section('content')
    <h1>Add role to {{ $user->name }}</h1>

    @if($roles->isEmpty())
        <div class="alert alert-warning">
            <p>No roles available to this user.</p>
        </div>
    @else
        <form action="{{ route('model.role.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id}}">

            <div class="form-group">
                <label for="permission">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Role</button>
        </form>
    @endif
@endsection

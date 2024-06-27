@extends('layout')

@section('content')
    <h1>Add permissions to {{ $user->name }}</h1>

    @if($permissions->isEmpty())
        <div class="alert alert-warning">
            <p>No permissions available to this user.</p>
        </div>
    @else
        <form action="{{ route('model.permission.store')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id}}">

            <div class="form-group">
                <label for="permission">Permission</label>
                <select name="permission_id" id="permission_id" class="form-control">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Permission</button>
        </form>
    @endif
@endsection

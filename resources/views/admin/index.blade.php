@extends('layout')

@section('content')
    <h1>Admin</h1>

    <div class="row">
        <div class="col-6">
            <h5>Roles</h5>

            <a href="{{ route('role.create') }}" class="btn btn-primary">Create Role</a>

            <ul class="list-group">
                @forelse ($roles as $role)
                    <li class="list-group-item">

                        <div class="d-flex align-items-center">
                            {{ Str::ucfirst($role->name) }}

                            <form action="{{ route('role.delete', $role->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Delete Role</button>
                            </form>

                            <a href="{{ route('role.permission.create', $role->id)}}" class="btn btn-link">Add Permission</a>
                        </div>

                        <ul class="list-group">
                            @forelse ($role->permissions as $permission)
                                <li class="list-group-item"> {{ Str::ucfirst($permission->name) }}</li>
                            @empty
                                <li class="list-group-item">No permissions to this role</li>
                            @endforelse
                        </ul>

                    </li>
                @empty
                    <li class="list-group-item">No roles created, yet</li>
                @endforelse
            </ul>

        </div>
        <div class="col-6">
            <h5>Permissions</h5>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h5>Users</h5>
        </div>
    </div>
@endsection

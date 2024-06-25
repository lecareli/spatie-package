@extends('layout')

@section('content')
    <h1>Admin</h1>

    <div class="row">
        <div class="col-3">
            <h5>Roles</h5>

            <ul class="list-group">
                @forelse ($roles as $role)
                    <li class="list-group-item">
                        {{ Str::ucfirst($role->name) }}

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
        <div class="col-9">
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

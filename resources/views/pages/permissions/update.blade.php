@extends('layout.app')
@section('title', 'Permissions')

@section('breadcrumb', 'Permissions')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Edit User Permissions</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 m-4">
                        <form action="{{ route('permissions.update', $user->id_user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama User -->
                            <div class="form-group">
                                <label for="nama_user">Nama User</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user"
                                    value="{{ old('nama_user', $user->nama_user) }}" required>
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username', $user->username) }}" required>
                            </div>

                            <!-- Role -->
                            <div class="form-group">
                                <label for="id_level">Role</label>
                                <select class="form-select" id="id_level" name="id_level" required>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id_level }}" 
                                            {{ old('id_level', $user->id_level) == $level->id_level ? 'selected' : '' }}>
                                            {{ $level->nama_level }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="modal-footer gap-2">
                                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

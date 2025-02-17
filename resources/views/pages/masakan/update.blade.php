@extends('layout.app')
@section('title', 'Permissions')

@section('breadcrumb', 'Permissions')

@section('content')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <h6>Edit Menu Makanan</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2 m-4">
                            <form action="{{ route('menu.update', $masakan->id_masakan) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Nama Menu -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Menu</label>
                                    <input type="text" class="form-control" id="nama_masakan" name="nama_masakan"
                                        value="{{ old('nama_masakan', $masakan->nama_masakan) }}" required>
                                </div>

                                <!-- Harga -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        value="{{ old('harga', $masakan->harga) }}" required>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Status</label>
                                    <select class="mb-3 form-select" id="status_masakan" name="status_masakan" required>
                                        <option value="tersedia" {{ $masakan->status_masakan == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="habis" {{ $masakan->status_masakan == 'habis' ? 'selected' : '' }}>
                                            Habis</option>
                                    </select>
                                </div>

                                <!-- Gambar -->
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Gambar</label>
                                    <div class="mb-3">
                                        @if ($masakan->gambar)
                                            <img src="{{ asset('storage/images/' . $masakan->gambar) }}"
                                                alt="Gambar {{ $masakan->nama_masakan }}" class="img-thumbnail mb-2"
                                                width="150">
                                        @endif
                                        <input type="file" class="custom-file-input form-control" id="gambar"
                                            name="gambar">
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="modal-footer gap-2">
                                    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Makanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Makanan</label>
                        <input type="text" class="form-control" id="nama_masakan" name="nama_masakan" required>
                        @error('nama_masakan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="status" class="col-form-label">Status</label>
                    <select class="mb-3 form-select" id="status_masakan" name="status_masakan" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                    <div class="mb-3">
                    <label for="status" class="col-form-label">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                            </div>
                        </div>
                    </div>
                    @error('status_masakan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
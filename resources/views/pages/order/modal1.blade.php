<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Informasi Pelanggan</h5>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center gap-3 m-3" id="orderForm">
          <div class="d-flex flex-column w-100">
            <h6>Nama Pelanggan</h6>
            <input class="form-control" id="nama_pelanggan" type="text" aria-label="default input example">
          </div>
          <div class="d-flex flex-column w-100">
            <h6>Nomor Meja</h6>
            <select class="form-select" id="id_meja" name="id_meja">
              <option value="" selected disabled>Pilih Nomor Meja</option>
              @foreach($meja as $m)
                <option value="{{ $m->id_meja }}">{{ $m->no_meja }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="transferData()">
          Selanjutnya
        </button>
      </div>
    </div>
  </div>
</div>

@include('pages.order.modal2')

<script>
  function transferData() {
    const namaPelanggan = document.getElementById('nama_pelanggan').value;
    const noMeja = document.getElementById('id_meja');
   
    if (!namaPelanggan || noMeja.value === "") {
        alert('Mohon isi nama pelanggan dan pilih nomor meja');
        return;
    }
   
    const selectedMejaText = noMeja.options[noMeja.selectedIndex].text;
    const selectedMejaId = noMeja.value;
    
    // Transfer ke modal 2
    document.getElementById('display_nama').textContent = namaPelanggan;
    document.getElementById('display_meja').textContent = selectedMejaText;
    document.getElementById('hidden_nama').value = namaPelanggan;
    document.getElementById('hidden_meja').value = selectedMejaId;

    // Tutup modal1 dan buka modal2
    const modal1 = bootstrap.Modal.getInstance(document.getElementById('exampleModal1'));
    const modal2 = new bootstrap.Modal(document.getElementById('exampleModal2'));
    
    modal1.hide();
    modal2.show();
  }
</script>

<style>
    .holdable-button {
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    .holdable-button.active {
        background-color: rgb(249, 115, 22) !important;
        color: white !important;
        transform: scale(1.05);
    }
</style>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true"
        data-bs-backdrop="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Modal 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Informasi Pesanan</h5>
                    <p>ID Order: <span id="id_order"></span></p>
                    <p>Nama Pelanggan: <span class="text-uppercase" id="display_nama"></span></p>
                    <p>Nomor Meja: <span class="text-uppercase" id="display_meja"></span></p>
                    <p>Total Bayar: <span class="text-uppercase" id="total_bayar"></span></p>
                    <hr class="horizontal dark my-3">
                    <h5>Pilih Metode Pembayaran</h5>
                    <div class="d-flex text-center gap-3 mb-4 mt-3">
                        <div class="holdable-button bg-white shadow p-3 rounded w-auto flex-grow-1" data-method="TUNAI">
                            <span class="fs-6 fw-bolder">TUNAI</span>
                        </div>
                        <div class="holdable-button bg-white shadow p-3 rounded w-auto flex-grow-1" data-method="REKENING">
                            <span class="fs-6 fw-bolder">REKENING</span>
                        </div>
                        <div class="holdable-button bg-white shadow p-3 rounded w-auto flex-grow-1" data-method="E-WALLET">
                            <span class="fs-6 fw-bolder">E-WALLET</span>
                        </div>
                    </div>

                    <!-- Hidden Inputs -->
                    <input type="hidden" name="id_order" id="hidden_id_order">
                    <input type="hidden" name="nama" id="hidden_nama">
                    <input type="hidden" name="no_meja" id="hidden_meja">
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function generateOrderID() {
        const randomNumber = Math.floor(10000 + Math.random() * 90000);
        return `ORD${randomNumber}`;
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("id_order").textContent = generateOrderID();

        const totalBayarSpan = document.querySelector("#total_bayar");
        const totalElement = document.querySelector('.d-flex.justify-content-between.mb-4 strong:last-child');

        if (totalElement) {
            totalBayarSpan.textContent = totalElement.textContent;
        }
    });

    document.querySelectorAll('.holdable-button').forEach(button => {
        button.addEventListener('click', () => {
            if (button.classList.contains('active')) {
                button.classList.remove('active');
                return;
            }

            document.querySelectorAll('.holdable-button').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const method = button.getAttribute('data-method');
            document.getElementById("hidden_method").value = method;  // Set the selected method
        });
    });

    function forceCloseModals() {
        document.querySelectorAll('.modal').forEach(modal => {
            let modalInstance = bootstrap.Modal.getInstance(modal);
            if (modalInstance) {
                modalInstance.hide();
            }
        });

        setTimeout(() => {
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            document.body.classList.remove('modal-open');
            document.body.style = '';
        }, 50);
    }
</script>

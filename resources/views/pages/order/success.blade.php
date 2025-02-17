@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="text-center">
        <h1 class="text-success">Pesanan Berhasil!</h1>
        <p>Pembayaran bisa dilakukan di lokasi.</p>
        <p>Anda akan dialihkan ke dashboard dalam <span id="countdown">3</span> detik.</p>
    </div>
</div>

<script>
    let countdownElement = document.getElementById('countdown');
    let countdown = 3;

    setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown <= 0) {
            window.location.href = "{{ route('dashboard') }}";
        }
    }, 1000);
</script>
@endsection
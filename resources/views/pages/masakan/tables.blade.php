@extends('layout.app')
@section('title', 'Menu Masakan')

@section('breadcrumb', 'Menu Masakan')

@section('content')

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Menu Masakan</h6>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@getbootstrap">Tambah Menu</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                  </th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($masakans as $masakan)
          <tr>
            <td>
            <div class="d-flex px-2 py-1">
              <div>
              <div>
                <img src="{{ asset('storage/images/' . $masakan->gambar) }}" class="avatar avatar-sm me-3"
                alt="Gambar {{ $masakan->nama_masakan }}">
              </div>

              </div>
              <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm">{{ $masakan->nama_masakan }}</h6>
              <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
              </div>
            </div>
            </td>
            <td>
            <p class="text-xs font-weight-bold mb-0">Rp. {{ number_format($masakan->harga, 0, ',', '.') }}
            </p>
            <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
            </td>
            <td class="align-middle text-center text-sm">
            <span class="badge bg-{{ $masakan->status_masakan == 'tersedia' ? 'success' : 'danger' }}">
              {{ ucfirst($masakan->status_masakan) }}
            </span>
            </td>
            <td class="align-middle">
            <div class="btn-group d-flex justify-content-center align-items-center gap-2" role="group"
              aria-label="Basic outlined example">

              <!-- Tombol Edit -->
              <div class="align-items-center">
              <a href="{{ route('menu.edit', $masakan->id_masakan) }}"
                class="btn btn-outline-warning px-3 py-2 mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" height="17" width="15.5" viewBox="0 0 512 512">
                <path fill="#FFD43B"
                  d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                </svg>
              </a>
              </div>

              <!-- Form Hapus dengan Konfirmasi -->
              <div class="align-items-center">
              <form action="{{ route('menu.destroy', $masakan->id_masakan) }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $masakan->nama_masakan }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger px-3 py-2 mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" height="17" width="15.5" viewBox="0 0 448 512">
                  <path fill="#ff0000"
                  d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                </svg>
                </button>
              </form>
              </div>
            </div>
            </td>

          </tr>
        @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('pages.masakan.create')

@endsection
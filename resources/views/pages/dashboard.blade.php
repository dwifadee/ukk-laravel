<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <title>
    Kasir Pintar
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
  <style>
    .row {
      margin-left: 0;
      margin-right: 2rem !important;
    }

    .cart-container {
      width: 396px;
      max-height: 370px;
      overflow-y: auto;
    }

    .product-card {
      padding: 15px;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      /* margin-bottom: 1px; */
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 396px;
    }

    /* Gambar produk */
    .product-card img {
      width: 80px;
      height: 80px;
      border-radius: 8px;
      object-fit: cover;
    }

    /* Info produk */
    .product-info {
      flex: 1;
      margin-left: 15px;
    }

    .product-info h6 {
      margin: 0;
      font-size: 16px;
      font-weight: bold;
    }

    .product-info p {
      margin: 0;
      font-size: 12px;
      color: #6c757d;
    }

    /* Harga dan jumlah */
    .product-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .product-actions input[type="number"] {
      width: 50px;
      height: 30px;
      text-align: center;
      border: 1px solid #dee2e6;
      border-radius: 4px;
    }

    .product-actions button {
      padding: 5px 10px;
      font-size: 14px;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      cursor: pointer;
    }

    .product-actions button:hover {
      background-color: #e9ecef;
    }

    .product-price {
      font-weight: bold;
      font-size: 14px;
    }

    .disabled-menu {
      pointer-events: none;
      cursor: not-allowed;
    }

    .cursor-pointer {
      cursor: pointer;
    }

    .cursor-not-allowed {
      cursor: not-allowed;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('components.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto d-flex align-items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 25px" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/></svg>
          <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg>
            <div class="input-group rounded">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
              <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="row mx-0">
      <div class="col-6 col-md-8">
        <div class="row">
          @foreach($masakans as $masakan)
        <div class="col-4 g-4">
        <div
          class="card menu-card @if($masakan->status_masakan == 'habis') disabled-menu cursor-not-allowed @else cursor-pointer @endif"
          data-id="{{ $masakan->id_masakan }}" data-name="{{ $masakan->nama_masakan }}"
          data-price="{{ $masakan->harga }}" data-image="{{ asset('storage/images/' . $masakan->gambar) }}">
          <img src="{{ asset('storage/images/' . $masakan->gambar) }}" class="card-img-top"
          style="height: 193px; max-height: 193px" alt="{{ $masakan->nama_masakan }}">
          <div class="card-body p-3">
          <h5 class="card-title">{{ $masakan->nama_masakan }}</h5>
          <p class="card-text">Rp. {{ number_format($masakan->harga, 0, ',', '.') }}</p>
          <span class="badge bg-{{ $masakan->status_masakan == 'tersedia' ? 'success' : 'danger' }}">
            {{ ucfirst($masakan->status_masakan) }}
          </span>
          </div>
        </div>
        </div>
      @endforeach
        </div>
      </div>

      <div class="offset-6 ps-4 position-fixed">
        <div class="bg-white h-100 w-30 border-0 border-radius-sm py-3 mt-4">
          <h4 class="my-2 text-center">Order Summary</h4>
          <hr class="horizontal dark mt-3">
          <!-- <div class="cart-wrapper"> -->
          <div class="container">
            <div class="row">
              <!-- Cart Items Section -->
              <div class="col-lg-10">
                <!-- Product Cards -->
                <div class="d-flex flex-column gap-3 cart-container">
                </div>
                <div class="px-4 mt-4 d-flex cart-container">
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-1">
                      <span>Subtotal</span>
                      <span>Rp. </span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                      <span>Tax</span>
                      <span>Rp. </span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <strong>Total</strong>
                      <strong>Rp. </strong>
                    </div>
                    <a class="btn btn-primary w-100" data-bs-toggle="modal" href="#exampleModal1" role="button">Proceed
                      to Checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    @include('pages.order.modal1')


  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    const cart = [];

    function addToCart(item) {
      if (item.status === 'habis') {
        return;
      }

      const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id);
      if (existingItemIndex > -1) {
        cart[existingItemIndex].quantity += 1;
        cart[existingItemIndex].totalPrice = cart[existingItemIndex].price * cart[existingItemIndex].quantity;
      } else {
        cart.push({ ...item, quantity: 1, totalPrice: item.price });
      }

      localStorage.setItem('cart', JSON.stringify(cart));

      renderCart();
      updateSummary();
    }

    function renderCart() {
      const cartContainer = document.querySelector('.cart-container');
      cartContainer.innerHTML = '';
      cart.forEach(item => {
        cartContainer.innerHTML += `
        <div class="product-card" data-id="${item.id}">
          <img src="${item.image}" alt="${item.name}">
          <div class="product-info">
            <h6>${item.name}</h6>
            <p>Rp. ${new Intl.NumberFormat('id-ID').format(item.price)}</p>
          </div>
          <div class="product-actions">
            <span class="product-price">Rp. ${new Intl.NumberFormat('id-ID').format(item.totalPrice)}</span>
            <div class="">
              <button onclick="updateQuantity(${item.id}, -1)">-</button>
              <input type="number" value="${item.quantity}" min="1" readonly>
              <button onclick="updateQuantity(${item.id}, 1)">+</button>
            </div>
          </div>
        </div>
      `;
      });
    }

    function updateQuantity(id, delta) {
      const itemIndex = cart.findIndex(cartItem => cartItem.id === id);
      if (itemIndex > -1) {
        cart[itemIndex].quantity += delta;

        if (cart[itemIndex].quantity <= 0) {
          cart.splice(itemIndex, 1);
        } else {
          cart[itemIndex].totalPrice = cart[itemIndex].price * cart[itemIndex].quantity;
        }

        renderCart();
        updateSummary();
      }
    }

    function updateSummary() {
      const subtotal = cart.reduce((total, item) => total + item.totalPrice, 0);
      const tax = subtotal * 0.1;
      const total = subtotal + tax;

      document.querySelector('.d-flex.justify-content-between.mb-1 span:last-child').textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(subtotal)}`;
      document.querySelector('.d-flex.justify-content-between.mb-3 span:last-child').textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(tax)}`;
      document.querySelector('.d-flex.justify-content-between.mb-4 strong:last-child').textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(total)}`;
    
      document.querySelector('#total_bayar').textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(total)}`;
    }

    document.querySelectorAll('.menu-card').forEach(card => {
      card.addEventListener('click', function () {
        if (!this.classList.contains('disabled-menu')) {
          const item = {
            id: parseInt(this.getAttribute('data-id')),
            name: this.getAttribute('data-name'),
            price: parseInt(this.getAttribute('data-price')),
            image: this.getAttribute('data-image'),
          };
          addToCart(item);
        }
      });
    });
  </script>
  <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.1.0') }}"></script>
</body>

</html>
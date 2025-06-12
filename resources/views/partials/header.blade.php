<nav class="top-navbar">
    <section class="nav-section">
        <svg class="primary menu-switch icon-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="menu">
            <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
        </svg>
        <a href="{{ route('landing')}}">
            <h1 class="primary" style="">One On Perception</h1>
        </a>
    </section>
    <section class="nav-section">
        <a href="{{route('shopping-cart')}}">
            <button class="header-cart-btn">
                <svg class="primary icon-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" alt="shopping cart">
                    <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                </svg>
            </button>
            @if(\Illuminate\Support\Facades\Cookie::has('shopping_cart'))
                <span class="icon-counter">{{ \Illuminate\Support\Facades\Cookie::has('shopping_cart') ? json_decode(\Illuminate\Support\Facades\Cookie::get('shopping_cart'), true)['totalQty'] : '' }}</span>
            @endif
        </a>
        <a href="{{ route('profile.notification')}}">
            <button class="header-notifications-btn">
                <svg class="primary icon-bnt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="notification bell">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                </svg>
            </button>
        </a>
        <a href="{{ route('profile')}}">
            <button>
                <svg class="secondary icon-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="user">
                    <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                </svg>
            </button>
        </a>
    </section>
</nav>

<aside id="side-menu" class="side-menu glass">
    <a href="{{ route('marketplace.index')}}">Marketplace</a>
    <a href="{{ route('profile')}}">Profile</a>
    <a href="{{ route('profile.orders')}}">Orders</a>
    <a href="{{ route('seller.index')}}">Seller dashboard</a>
</aside>

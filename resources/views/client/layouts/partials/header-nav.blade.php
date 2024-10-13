<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
                <a href="/">trang chủ</a>
                {{-- <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                        <a href="#">Sub Menu</a>
                        <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                        </ul>
                    </li>
                </ul> --}}
            </li>
            {{-- <li class="has-children">
                <a href="about.html">About</a>
                <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                </ul>
            </li> --}}
            <li><a href="{{ route('products.index')}}">Quản lý sản phẩm</a></li>
            <li><a href="#">Quản ký khách hàng</a></li>
        </ul>
    </div>
</nav>

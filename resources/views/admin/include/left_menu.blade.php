<link rel="stylesheet" href="{{asset('adminAssets/commonAssets/css/leftMenu.css')}}" type="text/css">
<div class="sidebar">
    <div class="sidebar-brand">
        <img src="{{asset('adminAssets/commonAssets/images/logo.svg')}}" alt="Build#PC">
        <h1 class="brand-name">Build#PC</h1>
    </div>

    <div class="sidebar-menu">
        <div class="main-list">
            <ul>
                <li><a href="{{route('dashboard')}}" class="a_parent">
                        <div class="dashboard">
                            <span class="icon"><img src="{{asset('adminAssets/commonAssets/images/dashboard.svg')}}" alt=""></span>
                            <span class="text">Dashboard</span>
                        </div>
                </a></li>
                <li><a href="#" class="a_parent">
                        <div class="settings">
                            <span class="icon"><img src="{{asset('adminAssets/commonAssets/images/settings.svg')}}" alt=""></span>
                            <span class="text">Settings</span>
                        </div>
                </a>
                <div class="setting_menu">
                    <ul>
                        <li>
                            <a href="{{route('brand.add')}}">
                                <div class="settings">
                                    <span class="icon"></span>
                                    <span class="text">Brand</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('category.add')}}">
                                <div class="settings">
                                    <span class="text">Category</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sub-category.add')}}">
                                <div class="settings">
                                    <span class="icon"></span>
                                    <span class="text">Sub-Category</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
                <li><a href="#" class="a_parent">
                        <div class="products">
                            <span class="icon"><img src="{{asset('adminAssets/commonAssets/images/shopping.svg')}}" alt=""></span>
                            <span class="text">Products</span>
                        </div>
                    </a>
                <div class="product_menu">
                    <ul>
                        <li>
                            <a href="{{route('product.add')}}">
                                <div class="products">
                                    <span class="icon"></span>
                                    <span class="text">Add Product</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product.manage')}}">
                                <div class="products">
                                    <span class="icon"></span>
                                    <span class="text">Manage Product</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
                <li><a href="#" class="a_parent">
                        <div class="orders">
                            <span class="icon"><img src="{{asset('adminAssets/commonAssets/images/order.svg')}}" alt=""></span>
                            <span class="text">Orders</span>
                        </div>
                    </a>
                <div class="order_menu">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="orders">
                                    <span class="icon"></span>
                                    <span class="text">Manage Orders</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>

                <li class="sign-out-button"><a href="#" class="a_parent">
                        <div class="sign-out">
                            <span class="icon"><img src="{{asset('adminAssets/commonAssets/images/sign-out.svg')}}" alt=""></span>
                            <span class="text">Sign Out</span>
                        </div>
                </a></li>

            </ul>
        </div>
    </div>
</div>


<script src="{{asset("commonAssets/js/scripts.js")}}"></script>

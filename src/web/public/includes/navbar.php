<!-- bottom to top button -->
<div class="bottom-to-top position-fixed bottom-0 end-0 mb-4 me-4 fs-xl cursor-pointer">
    <i class="ti ti-arrow-up"></i>
</div>

<!-- header section start  -->
<header class="header-section position-fixed top-0 start-50 translate-middle-x w-100 py-4">
    <div class="container">
        <nav class="nav-wrapper d-between px-0">
            <!-- site title and logo  -->
            <div class="logo">
                <a href="/">
                    <img style="height:30px" src="/assets/img/icon.png" alt="logo"><strong> Spotisix</strong>
                </a>
            </div>
            <!-- navbar menu and search area -->
            <div class="menu-toggler d-flex align-items-center justify-content-lg-between flex-lg-row flex-column gap-xxl-6 gap-4 w-100">
                <!-- search area  -->
                <div class="search-area search-page-3 d-flex align-items-center gap-4">
                    <form action="/search" class="w-100 search-box-2">
                        <div class="input-area border bc-n400">
                            <input type="text" name="keywords" value="<?= $keywords ?>" placeholder="Tìm bài hát.....">
                            <button type="submit" class="icon-btn">
                                <span class="icon alt-size fs-xl fw-bold">
                                    <i class="ti ti-search"></i>
                                </span>
                            </button>
                        </div>
                    </form>

                    <button class="icon-btn search-toggle-btn-2">
                        <span class="icon alt-size fs-xl fw-bold">
                            <i class="ti ti-search"></i>
                        </span>
                    </button>
                    <!-- wishlist for mobile device  -->
                    <div class="show-wishlist d-lg-none"></div>
                </div>

                <div class="category-nav-menu d-between flex-lg-row flex-column gap-xxl-6 gap-4 w-100 me-lg-2">

                    <!-- nav menu  -->
                    <div class="navbar-toggle-item w-100">
                        <ul class="nav-menu-items gap-3 gap-lg-8">
                            <li class="item">
                                <a href="/">Home</a>

                            </li>
                            <li class="item">
                                <a href="/singer">Ca Sĩ</a>

                            </li>
                            <li class="item">
                                <a href="/album">Album</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- wishlist  -->
                <div class="wishlist-area d-none d-lg-block">
                    <a href="favorite-episode.html" class="wishlist">
                        <span class="icon fs-xl">
                            <i class="ti ti-heart"></i>
                        </span>
                        <span class="baddge">
                            <span class="tcn-900">2</span>
                        </span>
                    </a>
                </div>

                <?php if (!$auth) { ?>
                    <div class="auth-btn order-last d-flex align-items-center flex-column flex-sm-row gap-xxl-6 gap-lg-4 gap-2 w-100">
                        <a href="/login" class="bttn-1 bttn-outline alt-position text-nowrap">
                            Sign In
                            <span class=" icon d-center icon-right">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </span>
                        </a>
                        <a href="/register" class="bttn-1 text-nowrap">
                            Register
                            <span class=" icon d-center icon-right">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </span>
                        </a>
                    </div>
                <?php } else { ?>
                    <!-- user profile  -->


                    <div class="user-logedin d-lg-flex gap-xxl-6 gap-lg-4 order-last">
                        <div class="dropdown">
                            <button class="bttn-1 bttn-outline alt-position text-nowrap" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class=" icon d-center icon-right">
                                    <img class="w-100 rounded-circle" src="/assets/img/user.png" alt="user">
                                </span>
                                <?= $auth['ListenerName'] ?>
                            </button>

                            <div class="profile-content-area p-lg-5 p-sm-3 p-1 border-full rounded-3 bgc-2 dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="profile-content position-relative">
                                    <button class="profile-close-btn position-absolute top-0 end-0"><i class="fas fa-times"></i></button>
                                    <div class="profile-info d-grid justify-content-center">
                                        <div class="profile-img mb-2">
                                            <img class="w-100 rounded-circle" src="/assets/img/user.png" alt="user">
                                        </div>
                                        <span class="fs-lg fw-medium text-white"><?= $auth['ListenerName'] ?></span>
                                        <span class="fs-sm fw-normal tcp-1"> <?= $auth['Email'] ?></span>
                                    </div>
                                    <span class="d-block border-dashed my-lg-4 my-2"></span>
                                    <ul class="profile-menu d-grid gap-2">
                                        <li><a class="profile-menu-item py-1 px-2 rounded text-white" href="/profile"><span class="fs-lg"><i class="ti ti-user"></i></span> Profile</a></li>
                                        <li><a class="profile-menu-item py-1 px-2 rounded text-white" href="balance-history.html"><span class="fs-lg"><i class="ti ti-wallet"></i></span>Balance</a></li>
                                        <li><a class="profile-menu-item py-1 px-2 rounded  text-white" href="javascript:void(0)" onclick="logout()"><span class="fs-lg"><i class="ti ti-logout"></i></span> Log Out</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>


                <?php } ?>
            </div>
            <!-- menu toggler  -->
            <button class="navbar-toggle-btn d-block d-lg-none" type="button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>

</header>
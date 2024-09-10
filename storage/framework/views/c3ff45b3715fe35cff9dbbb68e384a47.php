<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();



 ?>

<nav class="main-header navbar navbar-expand-lg navbar-light">
    <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <!-- <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span> -->
        <i class=" fa fa-bars"></i>
    </button>
    <div class="header-left-box">
        <div class="required_area">
            <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="clock" class="watch_ic">
            <span class="required_text">
                Required Text
            </span>
            <span class="required_num">21</span>
        </div>
        <div class="required_area">
            <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="clock" class="watch_ic">
            <span class="required_text">Required Text</span>
            <span class="required_num">21</span>
        </div>
        <div class="required_area">
            <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="clock" class="watch_ic">
            <span class="required_text">
                Required Text
            </span>
            <span class="required_num">21</span>
        </div>
    </div>
    <ul class="navbar-nav dashboard2" id="menu1-top">
        <li class="nav-item search-box-css" style="margin-right: 38px;">
            <button class="panel-heading">

                <i class="fa fa-search" aria-hidden="true"></i>

            </button>
            <div class="dropdown-content panel-collapse">
                <input type="text" placeholder="Search.....">
                <button class="res_btn">Result</button>
            </div>
        </li>
        <li class="nav-item" style="margin-right: 3px;">
            <button class="panel-heading">
                <i class="fa fa-file-text"></i>
                <span class="qty">5</span>
            </button>
            <div class="dropdown-content panel-collapse noti_box" style="display: none;">
                <div class="profile-box">
                    <span class="notif_text">New notifications (5)</span>
                    <span class="all_read">Mark all read</span>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?php echo e(asset('images/watch.png')); ?>" class="noti_icon">
                            <span class="noti_text"> Course Package / Book Name Details</span>
                            <span class="sub_text">Further Details<span>
                                </span></span></a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo e(asset('images/watch.png')); ?>" class="noti_icon">
                            <span class="noti_text"> Course Package / Book Name Details</span>
                            <span class="sub_text">Further Details<span>
                                </span></span></a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo e(asset('images/watch.png')); ?>" class="noti_icon">
                            <span class="noti_text"> Course Package / Book Name Details</span>
                            <span class="sub_text">Further Details<span>
                                </span></span></a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo e(asset('images/watch.png')); ?>" class="noti_icon">
                            <span class="noti_text"> Course Package / Book Name Details</span>
                            <span class="sub_text">Further Details<span>
                                </span></span></a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo e(asset('images/watch.png')); ?>" class="noti_icon">
                            <span class="noti_text"> Course Package / Book Name Details</span>
                            <span class="sub_text">Further Details<span>
                                </span></span></a>
                    </li>
                </ul>
                <div class="view_area">
                    <a href=""> View All</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <button class="panel-heading">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <span class="qty">3</span>
            </button>
            <div class="dropdown-content panel-collapse noti_box right_align no_radi no_radi2" style="display: none;">
                <div class="profile-box">
                    <div class="asu_area">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <!-- <span class="assu_text">Assured by</span>
                                      <img src="images/Logo.png"> --->
                                <div class="asu_area2">

                                    <span class="my_wh">My Wishlist (3)</span>
                                    <span class="link_p">Liked products</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <a href=""><i class="fa fa-heart heart_ic" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                <ul>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="view_area cart-view no_rd2"><a href="">Go to Cart</a></div>
            </div>
        </li>
        <li class="nav-item">
            <button class="panel-heading last_p">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="qty">3</span>
            </button>
            <div class="dropdown-content panel-collapse noti_box right_align no_radi2 no_radi" style="display: none;">
                <div class="profile-box">
                    <div class="asu_area">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="asu_area2">

                                    <span class="my_wh">My Wishlist (3)</span>
                                    <span class="link_p">Liked products</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <a href=""><i class="fa fa-heart heart_ic" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                <ul>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img src="images/pw.png" class="noti_icon">
                            <div class="menu_txt_area">
                                <span class="noti_text"> Course Package / Book Name Details</span>
                                <span class="sub_text">Further Details</span>
                                <div class="rat_star_area">
                                    <span class="rat_st">4.1 </span>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <span class="view_pe">(2149)</span>
                                <img src="images/Logo.png" class="mini_ye">

                            </div>
                            <div class="wh_ic_area">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>




                </ul>
                <div class="view_area  cart-view no_rd2"><a href="">Go to Cart</a></div>
            </div>
        </li>
        <li class="nav-item">
            <button class="panel-heading last_p">
                <?php if($user->photograph != null): ?>
                    <img src="<?php echo e(asset('public/upload/'.$user->photograph)); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('public/upload/admin.png')); ?>">
                <?php endif; ?>
            </button>
            <div class="dropdown-content panel-collapse profile-noti">
                <div class="profile-box">
                    <?php if($user->photograph != null): ?>
                         <img src="<?php echo e(asset('public/upload/'.$user->photograph)); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/upload/admin.png')); ?>">
                    <?php endif; ?>
                    
                    <h6> <?php echo e($user->name); ?></h6>
                    <p><?php echo e(strtoupper($user->roles)); ?></p>
                </div>
                <ul>
                    <li><a href="<?php echo e(route('admin.profile')); ?>"><i class="fa fa-user" aria-hidden="true"></i> <span> Profile</span></a></li>
                    <li><a href="<?php echo e(route('admin.changePassword')); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Change Password</span></a></li>

                    <li class="last_rad"><a href="<?php echo e(route('admin.logout')); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span> Sign Out</span></a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/layouts/menubar.blade.php ENDPATH**/ ?>
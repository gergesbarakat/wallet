<div class="header">

    @if (session()->has('error'))
        <script>
            Swal.fire('', '{{ session()->get('error') }}', 'error')
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire('', '{{ session()->get('success') }}', 'success')
        </script>
    @endif
    <div class="header-left">

        <a href="{{ route('admin.users.show' ,'1') }}" class="logo">

            <img src="{{ asset('public/img/logo.png') }}" width="140" height="46" alt="">

        </a>

        <a href="{{ route('admin.users.show' ,'1') }}" class="logo logo-small">

            <img src="{{ asset('public/img/logo.png') }}" alt="Logo" width="30" height="30">

        </a>

    </div>

    <a href="javascript:void(0);" id="toggle_btn">

        <i class="fas fa-align-left"></i>

    </a>

    <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">

        <i class="fas fa-align-left"></i>

    </a>



    <ul class="nav user-menu header-navbar-rht  head-chat-badge">

        <!-- Notifications -->

        <li class="nav-item dropdown noti-dropdown logged-item">

            <a>

                <select class="form-control" id="default_nav_lang">


                    <option value='28'>en</option>


                </select>

            </a>

        </li>

        <li class="nav-item dropdown noti-dropdown logged-item">

            <a alt="View Site" data-toggle="tooltip" title="View Site" href="admin-login" target="_blank"><i
                    class="fas fa-globe"></i> <span> </span></a>

            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                <i class="far fa-bell"></i>


            </a>

            <!-- chat -->




            <a alt="Chat" data-toggle="tooltip" class="nav-link" title="Chat" href="admin/chat">

                <i class="far fa-comment-dots"></i>

                <div class="chat_counts">


                    <span class='chat_count position-absolute badge badge-theme' id="chat_counts"></span>


                </div>

            </a>



            <div class="dropdown-menu dropdown-menu-right notifications">

                <div class="topnav-dropdown-header">

                    <span class="notification-title">Notifications</span>

                    <a href="javascript:void(0)" class="clear-noti noty_clear" data-token="0dreamsadmin"> Clear
                        All </a>

                </div>

                <div class="noti-content">

                    <ul class="notification">




                    </ul>

                </div>

                <div class="topnav-dropdown-footer">

                    <a href="admin-notification">View all Notifications</a>

                </div>

            </div>

        </li>

        <!-- /Notifications -->



        <li class="nav-item dropdown">

            <a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">

                <span class="user-img">


                    <img class="rounded-circle" src="{{ asset('public/img/user.jpg') }}" width="40" alt="Admin">

                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="admin-profile">Profile</a>

                <a class="dropdown-item" href="#" onclick="$('#logout-form').submit()">Logout</a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>

        </li>

    </ul>

</div>
<div class="sidebar" id="sidebar">

    <div class="sidebar-logo">

        <a href="{{ route('admin.users.show' ,'1') }}">

            <img src="{{ asset('public/img/logo-icon.png') }}" alt="" class="img-fluid">

        </a>

    </div>

    <div class="sidebar-inner slimscroll">

        <div id="sidebar-menu" class="sidebar-menu">

            <ul>

                <li class="menu-title">

                    <span>

                        Main
                    </span>

                </li>

                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

                    <a href="{{ route('admin.users.show' ,'1') }}"><i class="fas fa-columns"></i>

                        <span>

                            Dashboard
                        </span>

                    </a>

                </li>




                <li class="menu-title">

                    <span>

                        Rooms
                    </span>

                </li>
                <li class="submenu {{ request()->is('admin/categories') ? 'active' : '' }}">

                    <a href="#">

                        <i class="fas fa-layer-group"></i> <span>Categories</span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href=" ">
                                <span>Categories</span></a>

                        </li>
                        <li>

                            <a class="" href=" ">
                                <span>Add Category</span></a>

                        </li>




                    </ul>

                </li>
                <li class="submenu {{ request()->is('admin/devices') ? 'active' : '' }}">

                    <a href="#">
                        <i class="fas fa-window-restore"></i> <span>devices</span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href=" ">
                                <span>devices</span></a>

                        </li>
                        <li>

                            <a class="" href=" ">
                                <span>Add Device</span></a>

                        </li>




                    </ul>

                </li>
                <li class="submenu {{ request()->is('admin/rooms') ? 'active' : '' }}">

                    <a href="#">

                        <i class="fas fa-bullhorn"></i> <span> Rooms</span><span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>

                        <li>

                            <a href=" " class=""> <span>All
                                    Rooms</span></a>

                        </li>

                        <li>

                            <a href=" " class=""> <span>Add
                                    Room </span></a>

                        </li>













                    </ul>

                </li>
                <li class="menu-title">

                    <span>

                        Assigned Rooms
                    </span>

                </li>

                <li class="submenu {{ request()->is('admin/assigned_rooms') ? 'active' : '' }}">

                    <a href=" "><i class="fas fa-clipboard"></i>

                        <span>

                            Assigned Rooms
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>

                        <li>

                            <a href=" " class="">
                                <span>Assigned Rooms</span></a>

                        </li>
                        <li>

                            <a href=" " class="">
                                <span>Assign New Room</span></a>

                        </li>





                    </ul>

                </li>


                <li class="menu-title">

                    <span>

                        User Management
                    </span>

                </li>

                <li class="submenu ">

                    <a href="#">

                        <i class="fas fa-users"></i> <span>Manage Users </span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>




                        <li>

                            <a class="" href="{{ route('admin.users.index') }}"> <span>Users</span></a>

                        </li>


                    </ul>

                </li>
                <li class="menu-title">

                    <span>

                        Membership
                    </span>

                </li>

                <li class="submenu {{ request()->is('admin/subscribtions') ? 'active' : '' }}">

                    <a href="#"><i class="fas fa-clipboard"></i>

                        <span>

                            Membership
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a href="{{route('admin.subscribtions.show','1')}}" class="">
                                <span>Subscriptions</span></a>

                        </li>





                    </ul>

                </li>



                <li class="menu-title">

                    <span>

                        Reports
                    </span>

                </li>

                <li class="submenu  ">

                    <a href="#"><i class="fas fa-wallet"></i> <span>

                            Earnings
                        </span> <span class="menu-arrow"><i class="fas fa-angle-right"></i></span></a>

                    <ul>


                        <li>

                            <a class="" href="{{ url('admin/earnings') }}"><span>
                                    Earnings</span></a>

                        </li>


                        <li>

                            <a class=""  ><span> Seller
                                    Balance</span></a>

                        </li>


                    </ul>

                </li>






                <li class="menu-title">

                    <span>

                        Booking
                    </span>
                </li>




                <li class="">

                    <a href=" "><i class="far fa-calendar-check"></i>
                        <span> Booking List</span></a>

                </li>

                <li class="submenu ">

                    <a href="#"><i class="fas fa-hashtag"></i>

                        <span>

                            Payout
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span></a>

                    <ul>


                        <li>

                            <a class="" href="admin/add-payouts">

                                <span>

                                    Add Payout
                                </span>

                            </a>

                        </li>


                        <li>

                            <a class="" href="admin/payout-requests">

                                <span>

                                    Payout Request
                                </span>

                            </a>

                        </li>


                        <li>

                            <a class="" href="admin/completed-payouts">

                                <span>

                                    Payout List
                                </span>

                            </a>

                        </li>


                    </ul>

                </li>


                <li class="">

                    <a href="admin/wallet"><i class="fas fa-wallet"></i><span>
                            Wallet</span></a>

                </li>





                <li class="">

                    <a href="admin/refund-request"><i class="fas fa-money-check"></i>

                        <span>

                            Refund Request
                        </span>

                    </a>

                </li>



                <li class="menu-title">

                    <span>

                        Others
                    </span>

                </li>
                <li class="submenu  ">

                    <a href="#" class="">

                        <i class="fas fa-star-half-alt"></i> <span>Reviews </span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span></a>

                    <ul>




                        <li>

                            <a href="admin/reviews-type" class=""><span>Reviews
                                    Type</span></a>

                        </li>


                        <li>

                            <a href="admin/review-reports" class=""><span>Reviews</span></a>

                        </li>


                    </ul>

                </li>

                <li class="submenuu ">

                    <a href="admin/chat"><i class="fas fa-comments"></i>
                        <span>Chat</span></a>

                </li>



                <li class="menu-title">

                    <span>

                        Content
                    </span>

                </li>

                <li class="submenu">

                    <a href="#"><i class="fas fa-book"></i>

                        <span>

                            Pages
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span></a>

                    <ul>


                        <li>

                            <a class="" href="admin/add-pages"><span>

                                    Add Pages
                                </span></a>

                        </li>



                        <li>

                            <a class="" href="admin/pages"><span>

                                    Pages List
                                </span></a>

                        </li>


                        <li>

                            <a class="" href="admin/pages"> <span>Pages </span></a>

                        </li>


                    </ul>

                </li>



                <li class="submenu">

                    <a href="#"><i class="fa fa-newspaper"></i>

                        <span>

                            Blogs
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href="admin/blogs">

                                All Blogs
                            </a>

                        </li>


                        <li>

                            <a class="" href="admin/add-blog">

                                Add Blogs
                            </a>

                        </li>


                        <li>

                            <a class="" href="admin/blog-categories">

                                Categories
                            </a>

                        </li>


                        <li>

                            <a class="" href="admin/blog-comments"><span> Blog
                                    Comments</span></a>

                        </li>


                    </ul>

                </li>



                <li class="submenu">

                    <a href="#">

                        <i class="fas fa-location-arrow"></i>

                        <span>

                            Location
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i>

                        </span>

                    </a>

                    <ul>


                        <li>

                            <a href="admin/country-code-config" class="">

                                <span>

                                    Countries
                                </span>

                            </a>

                        </li>


                        <li>

                            <a href="admin/state" class="">

                                <span>

                                    States
                                </span>

                            </a>

                        </li>


                        <li>

                            <a href="admin/city" class="">

                                <span>

                                    Cities
                                </span>

                            </a>

                        </li>


                    </ul>

                </li>









                <li class="">

                    <a href="admin/revenue"> <i class="fas fa-bullhorn"></i>
                        <span>Revenue</span></a>

                </li>


                <li class="">

                    <a href="admin/cod"> <i class="fas fa-code"></i> <span>COD</span></a>

                </li>








                <li class="">

                    <a href="admin/roles"><i class="fas fa-key"></i> <span>Roles &
                            Permissions</span></a>

                </li>




                <li class="menu-title">

                    <span>

                        Management
                    </span>

                </li>


                <li class="">

                    <a href="admin/cache-settings"> <i class="fas fa-window-restore"></i>
                        <span>Cache Settings</span></a>

                </li>


                <li class="">

                    <a href="admin/contact"><i class="fas fa-paper-plane"></i> <span>
                            Contact Messages</span></a>

                </li>


                <li class="">

                    <a href="admin/emailtemplate"><i class="fas fa-envelope"></i> <span>
                            Email Templates</span></a>

                </li>


                <li class="">

                    <a href="admin/abuse-reports"><i class="fas fa-file"></i>

                        <span>

                            Abuse Report
                        </span>

                    </a>

                </li>



                <li class="">

                    <a href="admin/announcements"><i class="fa fa-bell"></i> <span> Push
                            Notifications</span></a>

                </li>



                <li class="menu-title">

                    <span>

                        Settings
                    </span>

                </li>

                <li class="submenu ">

                    <a href="#">

                        <i class="fas fa-sliders-h"></i> <span>General Settings</span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href="admin/general-settings">
                                <span>General
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/localization">
                                <span>Localization</span></a>

                        </li>


                        <li>

                            <a class="" href="admin-profile">
                                <span>Profile</span></a>

                        </li>


                    </ul>

                </li>


                <li class="submenu ">

                    <a href="#">

                        <i class="fas fa-cog"></i>

                        <span>

                            Website Settings
                        </span> <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href="admin/seo-settings"> <span>SEO
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/theme-color"> <span>Theme
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="submenu " href="#">

                                <span>

                                    Frontend Settings
                                </span>

                                <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                            </a>

                            <ul>


                                <li>

                                    <a class="" href="admin/frontend-settings">
                                        <span>Header Settings</span></a>

                                </li>


                                <li>

                                    <a class="" href="admin/footer-settings">
                                        <span>Footer Settings</span></a>

                                </li>


                            </ul>

                        </li>


                        <li>

                            <a class="" href="admin/social-settings"> <span>Login
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/chat-settings"> <span>Chat
                                    Settings</span></a>

                        </li>



                        <li>

                            <a class="" href="admin/languages-settings">
                                <span>Language</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/sitemap">

                                <span>

                                    Sitemap
                                </span>

                            </a>

                        </li>


                    </ul>

                </li>




                <li class="submenu ">

                    <a href="#">

                        <i class="fas fa-cog"></i> <span>System Settings</span> <span class="menu-arrow"><i
                                class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href="admin/system-settings"> <span>System
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/emailsettings"> <span>Email
                                    Settings</span></a>

                        </li>



                        <li>

                            <a class="" href="admin/sms-settings"> <span>SMS
                                    Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/other-settings"> <span>Other
                                    Settings</span></a>

                        </li>


                    </ul>

                </li>





                <li class="submenu">

                    <a href="#">

                        <i class="fas fa-money-bill"></i>

                        <span>

                            Financial Settings
                        </span>

                        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>

                    </a>

                    <ul>


                        <li>

                            <a class="" href="admin/stripe-payment-gateway">
                                <span>Payment Settings</span></a>

                        </li>



                        <li>

                            <a class="" href="admin/offline-payment-details">
                                <span>Bank Transfer (Offline)</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/currency-settings">
                                <span>Currency Settings</span></a>

                        </li>


                        <li>

                            <a class="" href="admin/tax-settings"> <span> Tax
                                    Settings</span></a></span></a>

                        </li>


                    </ul>

                </li>





                <li class="">

                    <a href="admin/appointment-settings"> <i class="fas fa-business-time"></i>
                        <span>Appointment Settings</span></a>

                </li>



                <li class="">

                    <a href="admin/room-settings"> <i class="fas fa-business-time"></i>
                        <span>room Settings</span></a>

                </li>



            </ul>

        </div>

    </div>

</div>

<!-- Header Container
    ================================================== -->
<header id="header-container" class="fullwidth dashboard-header not-sticky">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a href="{{ route('dashboard') }}"><img src="http://www.vasterad.com/themes/hireo_082019/images/logo.png" alt=""></a>
                </div>

                <!-- Main Navigation -->

                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">

                <!-- User Menu -->
                <div class="header-widget">

                    <!-- Messages -->
                    <div class="header-notifications user-menu">

                        <div class="header-notifications-trigger">
                            <a href="#"><div class="user-avatar status-online"><img src="{{ asset($user->avatar()) }}" alt=""></div></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <!-- User Status -->
                            <div class="user-status">
                                <div class="user-details">

                                    <div class="user-avatar status-online">
                                        <img src="{{ asset($user->avatar()) }}" alt="">
                                    </div>

                                    <div class="user-name">
                                        {{ $user->name }}
                                        <span>{{ $user->profile_type == 0 ? 'Покупатель': 'Продавец' }}</span>
                                    </div>

                                </div>
                            </div>

                            <ul class="user-menu-small-nav">
                                <li><a href="{{ route('logout.dashboard') }}"><i class="icon-material-outline-power-settings-new"></i> Выйти</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- User Menu / End -->
            </div>
            <!-- Right Side Content / End -->
        </div>
    </div>
    <!-- Header / End -->
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Dashboard Sidebar
        ================================================== -->
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">

            @if (auth()->user()->profile_type == 1)

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
                <span class="trigger-title">Навигация</span>
            </a>

            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Управление">
                        <li><a href="{{ route('profile') }}"><i class="fal fa-user"></i> Профиль</a></li>
                        <li class=""><a href=""><i class="fal fa-list-ul"></i>  Услуги</a>
                            <ul>
                                <li><a href="{{ route('service.create') }}"><i class="fal fa-layer-plus"></i> Добавить услугу</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Navigation / End -->
            @else
                <!-- Responsive Navigation Trigger -->
                    <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
                        <span class="trigger-title">Навигация</span>
                    </a>

                    <!-- Navigation -->
                    <div class="dashboard-nav">
                        <div class="dashboard-nav-inner">

                            <ul data-submenu-title="Управление">
                                <li><a href="{{ route('profile') }}"><i class="fal fa-user"></i> Профиль</a></li>
                                <li class=""><a href=""><i class="fad fa-money-check-alt"></i>  Пополнить баланс </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Navigation / End -->
            @endif

        </div>
    </div>
</div>
<!-- Dashboard Sidebar / End -->
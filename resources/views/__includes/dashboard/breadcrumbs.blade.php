@if (count($breadcrumbs))
    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>@yield('title')</h3>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li>{{ $breadcrumb->title }}</li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
@endif


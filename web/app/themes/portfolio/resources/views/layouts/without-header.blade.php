@include('sections.no-header')

  <main id="main" class="site-wrapper main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif


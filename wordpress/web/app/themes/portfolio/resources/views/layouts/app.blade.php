<main id="main" class="site-wrapper main">
  @yield('content')


  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif

</main>

@include('sections.footer')

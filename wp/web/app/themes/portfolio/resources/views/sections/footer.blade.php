<footer>
  <div class="container">
    @if(!empty($social_menu))
      <div class="social-menu">

        <nav class="menu">
          <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
          <label class="menu-open-button" for="menu-open">
            <span class="hamburger hamburger-1"></span>
            <span class="hamburger hamburger-2"></span>
            <span class="hamburger hamburger-3"></span>
          </label>
          
          @foreach($social_menu as $item)
            <a href="{{ $item['icon']['label'] === 'PDF File' ? $item['file'] : $item['url'] }}" class="menu-item" target="_blank"> <span class="{{ $item['icon']['value'] }}"></span></a>
          @endforeach
          
          
        </nav>


        <!-- filters -->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
              <filter id="shadowed-goo">
                  
                  <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                  <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                  <feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
                  <feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" />
                  <feOffset in="shadow" dx="1" dy="1" result="shadow" />
                  <feComposite in2="shadow" in="goo" result="goo" />
                  <feComposite in2="goo" in="SourceGraphic" result="mix" />
              </filter>
              <filter id="goo">
                  <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                  <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                  <feComposite in2="goo" in="SourceGraphic" result="mix" />
              </filter>
            </defs>
        </svg>
      </div>
    @endif
    <div class="flex justify-content-end">
      <span class="copyright">Copyright &copy; {!! date('Y') !!}, Developed by Joey Gross</span>
    </div>
  </div>
</footer>
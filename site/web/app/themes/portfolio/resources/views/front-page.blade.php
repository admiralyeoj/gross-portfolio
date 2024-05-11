@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell page-home relative">

      <div class="container">
        <div class="row">

          @include('partials.page-header')

          <div class="col-xs-12 col-md-10 col-lg-8 mx-auto position-relative">        
            @if (!empty($nav))
              <div class="hexagon-menu clear">
                @foreach ($nav as $item)
                  <div class="hexagon-item">
                    <div class="hex-item">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                    <div class="hex-item">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                    <a href="{{$item->url}}" class="hex-content">
                      <span class="hex-content-inner">
                        <span class="icon">
                          <span class="{{ $item->icon }}"></span>
                        </span>
                        <span class="title">{{$item->title}}</span>
                      </span>
                      <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                          fill="#1e2530"></path>
                      </svg>
                    </a>
                  </div>
                @endforeach
              </div> <!-- /.hexagon-menu -->
            @endif

          </div> <!-- /.col-xs-12 -->

        </div> <!-- /.row -->

        
      </div> <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection

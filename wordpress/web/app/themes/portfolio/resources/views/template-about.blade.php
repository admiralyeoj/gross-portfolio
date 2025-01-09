{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell page-about relative">
      <!-- .close -->
        @include('partials.close-btn')
      <!-- /.close -->

      <div class="container">
        <div class="row">
          
          @include('partials.page-header')

          <div class="col-xs-12 col-md-6">
            <div class="about-author">
              <figure class="author-thumb">
                {!! $image !!}
              </figure> <!-- /.author-bio -->
              <div class="author-desc">
                @if(!empty($attributes)) 
                  @foreach($attributes as $attr)
                    <p><b>{{ $attr['title'] }}:</b></p><p>{{ $attr['content'] }}</p>
                  @endforeach
                @endif
              </div>
              <!-- /.author-desc -->
            </div> <!-- /.about-author -->
          </div> <!-- /.col -->

          <div class="col-xs-12 col-md-6">
            {!! $content !!}
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
      
      <!-- /.container -->
    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection

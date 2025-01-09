{{--
  Template Name: Skills
--}}

@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell page-resume relative">
      <!-- .close -->
      @include('partials.close-btn')
      <!-- /.close -->

      <div class="container">
        <div class="row">

          @include('partials.page-header')

        </div> <!-- /.row -->

        <div class="row">
          <div class="col-xs-12">
            <ul class="filter list-inline">
              @if(!empty($terms))
              <li class="list-inline-item"><a href="#" class="active" data-filter="*">All</a></li>
                @foreach($terms as $term) 
                  <li class="list-inline-item"><a href="#" data-filter=".{{ $term->slug }}">{{ $term->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 isotope-gutter">

          @if(!empty($posts))
            @foreach($posts as $post)
              <x-skill-tile :title="$post->post_title" :post-id="$post->ID" />
            @endforeach
          @endif

        </div> <!-- /.row -->
      </div> <!-- /.container -->

      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
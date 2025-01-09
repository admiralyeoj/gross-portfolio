{{--
  Template Name: Projects
--}}

@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell page-works relative">
      <!-- .close -->
      @include('partials.close-btn')
      <!-- /.close -->

      <div class="container">
        <div class="row">

          @include('partials.page-header')

        </div> <!-- /.row -->


        @if(!empty($posts))
          @foreach($posts as $key => $post)
            <x-project-tile :title="$post->post_title" :post-id="$post->ID" :imageSide="$key % 2 === 0 ? 'left' : 'right'" />
          @endforeach
        @endif

      </div> <!-- /.container -->

      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
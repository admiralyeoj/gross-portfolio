@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell relative">
      <!-- .close -->
        @include('partials.close-btn')
      <!-- /.close -->

      <div class="container">
        <div class="row">
          
          @include('partials.page-header')

          <div class="col-xs-12">
            {!! $content !!}
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
      
      <!-- /.container -->
    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection

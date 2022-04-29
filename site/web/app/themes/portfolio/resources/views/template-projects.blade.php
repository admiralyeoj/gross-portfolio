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


          <!-- project -->
          <div class="row project">
            <div class="col-lg-6 d-flex align-items-center justify-content-center order-2 order-lg-1">
              <img src="https://via.placeholder.com/600x300.png" alt="">
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column order-1 order-lg-2">
              <h2>Project Title 1</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus risus, mattis ac nibh et, gravida lobortis orci. Proin id sodales ex. Duis non volutpat tellus, ac dapibus ex. In felis dolor, porttitor mollis sem vel, aliquet varius risus. Nunc sed metus a dui semper elementum et ac felis. Sed blandit porttitor risus, ullamcorper mattis nibh eleifend et. Mauris vel lobortis augue, vel scelerisque mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi posuere, turpis quis auctor scelerisque, dolor arcu ultricies mauris, vitae eleifend arcu diam et quam. Etiam feugiat arcu non pretium vestibulum. Praesent vel feugiat massa. Nullam molestie lorem massa, in viverra mi gravida non. Vestibulum vehicula pellentesque ligula sed tristique. Morbi purus ex, dictum nec congue sit amet, tristique sit amet nisl. Donec pretium finibus sapien vitae ornare. Ut lacinia risus a lectus semper, eu maximus orci vehicula.</p>
              <span class="btn-border">
                <a href="#" target="_blank" class="btn btn-primary btn-custom-border text-uppercase">View Code</a>
              </span>
            </div>
          </div>
          <!-- project -->

          <!-- project -->
          <div class="row project">
            <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column order-1 order-lg-2">
              <h2>Project Title 2</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus risus, mattis ac nibh et, gravida lobortis orci. Proin id sodales ex. Duis non volutpat tellus, ac dapibus ex. In felis dolor, porttitor mollis sem vel, aliquet varius risus. Nunc sed metus a dui semper elementum et ac felis. Sed blandit porttitor risus, ullamcorper mattis nibh eleifend et. Mauris vel lobortis augue, vel scelerisque mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi posuere, turpis quis auctor scelerisque, dolor arcu ultricies mauris, vitae eleifend arcu diam et quam. Etiam feugiat arcu non pretium vestibulum. Praesent vel feugiat massa. Nullam molestie lorem massa, in viverra mi gravida non. Vestibulum vehicula pellentesque ligula sed tristique. Morbi purus ex, dictum nec congue sit amet, tristique sit amet nisl. Donec pretium finibus sapien vitae ornare. Ut lacinia risus a lectus semper, eu maximus orci vehicula.</p>
              <span class="btn-border">
                <a href="#" target="_blank" class="btn btn-primary btn-custom-border text-uppercase">View Code</a>
              </span>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center order-2">
              <img src="https://via.placeholder.com/600x300.png" alt="">
            </div>
          </div>
          <!-- project -->

          <!-- project -->
          <div class="row project">
            <div class="col-lg-6 d-flex align-items-center justify-content-center order-2 order-lg-1">
              <img src="https://via.placeholder.com/600x300.png" alt="">
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column order-1 order-lg-2">
              <h2>Project Title 3</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus risus, mattis ac nibh et, gravida lobortis orci. Proin id sodales ex. Duis non volutpat tellus, ac dapibus ex. In felis dolor, porttitor mollis sem vel, aliquet varius risus. Nunc sed metus a dui semper elementum et ac felis. Sed blandit porttitor risus, ullamcorper mattis nibh eleifend et. Mauris vel lobortis augue, vel scelerisque mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi posuere, turpis quis auctor scelerisque, dolor arcu ultricies mauris, vitae eleifend arcu diam et quam. Etiam feugiat arcu non pretium vestibulum. Praesent vel feugiat massa. Nullam molestie lorem massa, in viverra mi gravida non. Vestibulum vehicula pellentesque ligula sed tristique. Morbi purus ex, dictum nec congue sit amet, tristique sit amet nisl. Donec pretium finibus sapien vitae ornare. Ut lacinia risus a lectus semper, eu maximus orci vehicula.</p>
              <span class="btn-border">
                <a href="#" target="_blank" class="btn btn-primary btn-custom-border text-uppercase">View Code</a>
              </span>
            </div>
          </div>
          <!-- project -->

      </div> <!-- /.container -->

      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
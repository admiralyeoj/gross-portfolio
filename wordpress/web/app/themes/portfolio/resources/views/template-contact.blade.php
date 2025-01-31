{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
  <div class="pt-table">
    <div class="pt-tablecell page-contact relative">
      <!-- .close -->
      @include('partials.close-btn')
      <!-- /.close -->

      <div class="container">
        <div class="row">
          @include('partials.page-header')
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="contact-block">
              <div class="media">
                <div class="media-left">
                  <span class="fa-light fa-circle-envelope"></span>
                </div>
                <div class="media-body">
                  <h4>Email</h4>
                  <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                </div>
              </div>
            </div>
            <!-- /.contact-block -->
            <div class="contact-block">
              <div class="media">
                <div class="media-left">
                  <span class="fa-light fa-circle-phone"></span>
                </div>
                <div class="media-body">
                  <h4>Phone</h4>
                  <p><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                </div>
              </div>
            </div>
            <!-- /.contact-block -->
            <div class="contact-block">
              <div class="media">
                <div class="media-left">
                  <span class="fa-light fa-compass"></span>
                </div>
                <div class="media-body">
                  <h4>Location</h4>
                  <p>{{ $location }}</p>
                </div>
              </div>
            </div>
            <!-- /.contact-block -->

          </div>
          <div class="col-md-12 col-lg-7 mx-auto">
            <div class="section-title clear">
              <h3>Send me a meesage</h3>
              <span class="bar-dark"></span>
              <span class="bar-primary"></span>
            </div>

            {!! do_shortcode('[forminator_form id="224"]') !!}

          </div> <!-- /.col- -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
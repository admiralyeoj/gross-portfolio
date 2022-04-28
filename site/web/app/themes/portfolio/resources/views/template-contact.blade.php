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
          <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
            <div class="contact-block">
              <div class="media">
                <div class="media-left">
                  <i class="tf-envelope2"></i>
                </div>
                <div class="media-body">
                  <h4>Email</h4>
                  <p><a href="mailto:admiralyeoj@grossportfolio.com">admiralyeoj@grossportfolio.com</a></p>
                </div>
              </div>
            </div>
            <!-- /.contact-block -->
            <div class="contact-block">
              <div class="media">
                <div class="media-left">
                  <i class="tf-phone2"></i>
                </div>
                <div class="media-body">
                  <h4>Phone</h4>
                  <p><a href="tel:+000-1111-2222">+000-1111-2222</a></p>
                </div>
              </div>
            </div>
            <!-- /.contact-block -->

            <ul class="contact-social">
              <li>
                <span class="contact-social-hex"></span>
                <a href="https://github.com/admiralyeoj/" target="_blank"><span class="fa-brands fa-github-alt"></span></a>
              </li>
              <li>
                <span class="contact-social-hex"></span>
                <a href="https://www.linkedin.com/in/grossjoseph" target="_blank"><span class="fa-brands fa-linkedin-in"></span></a>
              </li>
              <li>
                <span class="contact-social-hex"></span>
                <a href="https://www.twitter.com" target="_blank"><span class="fa-brands fa-twitter"></span></a>
              </li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-7 col-md-7 mx-auto">
            <div class="section-title clear">
              <h3>Send me a meesage</h3>
              <span class="bar-dark"></span>
              <span class="bar-primary"></span>
            </div>

            <form id="contact-form" class="row contact-form no-gutter" action="#" method="post">
              <div class="col-xs-12 col-sm-6">
                <div class="input-field name">
                  <span class="input-icon" id="name"><i class="tf-profile-male"></i></span>
                  <input type="text" class="form-control" placeholder="Enter your name" required>
                </div>
              </div> <!-- ./col- -->
              <div class="col-xs-12 col-sm-6">
                <div class="input-field email">
                  <span class="input-icon" id="email"><i class="tf-envelope2"></i></span>
                  <input type="email" class="form-control" name="email" placeholder="Your email address" required>
                </div>
              </div> <!-- ./col- -->
              <div class="col-xs-12 col-sm-12">
                <div class="input-field">
                  <span class="input-icon" id="subject"><i class="tf-pricetags"></i></span>
                  <input type="text" class="form-control" name="subject" placeholder="Enter the discussion title" required>
                </div>
              </div> <!-- ./col- -->
              <div class="col-xs-12 col-sm-12">
                <div class="input-field message">
                  <span class="input-icon"><i class="tf-pencil2"></i></span>
                  <textarea name="message" id="message" class="form-control"
                    placeholder="Write your message" required></textarea>
                </div>
              </div> <!-- ./col- -->
              <div class="col-xs-12 col-sm-12">
                <div class="input-field">
                  <span class="btn-border">
                    <button type="submit" class="btn btn-primary btn-custom-border text-uppercase">Send Message
                      now</button>
                  </span>
                </div>
                <div class="msg-success">Your Message was sent successfully</div>
                <div class="msg-failed">Something went wrong, please try again later</div>
              </div> <!-- ./col- -->
            </form> <!-- /.row -->
          </div> <!-- /.col- -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
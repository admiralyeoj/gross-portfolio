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
              <li class="list-inline-item"><a href="#" class="active" data-filter="*">All</a></li>
              <li class="list-inline-item"><a href="#" data-filter=".Photoshop">Photoshop</a></li>
              <li class="list-inline-item"><a href="#" data-filter=".Illustrator">Illustrator</a></li>
              <li class="list-inline-item"><a href="#" data-filter=".Indesign">Indesign</a></li>
              <li class="list-inline-item"><a href="#" data-filter=".Artworks">Artworks</a></li>
            </ul>
          </div>
        </div>

        <div class="row isotope-gutter">
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop Illustrator">
            <figure class="works-item">
              <img src="@asset('images/works/1.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Illustrator">
            <figure class="works-item">
              <img src="@asset('images/works/2.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Indesign Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/3.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Artworks Illustrator">
            <figure class="works-item">
              <img src="@asset('images/works/4.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 Photoshop">
            <figure class="works-item">
              <img src="@asset('images/works/5.jpg')" alt="">
              <div class="overlay"></div>
              <figcaption class="works-inner">
                <h4>Project Name</h4>
                <p>Illustration, Digital Art</p>
              </figcaption>
            </figure>
          </div>
        </div> <!-- /.row -->
      </div> <!-- /.container -->

      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection
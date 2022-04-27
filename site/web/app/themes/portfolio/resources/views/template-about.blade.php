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
          

          <div class="col-xs-12 col-md-6">
            <div class="about-author">
              <figure class="author-thumb">
                <img src="images/author.jpg" alt="">
              </figure> <!-- /.author-bio -->
              <div class="author-desc">
                <p><b>Date of birth:</b> 29th july, 1984</p>
                <p><b>Language:</b> English, Spanish</p>
                <p><b>Expert in:</b> UI/UX, Web development</p>
                <p><b>Freelance:</b> Available</p>
              </div>
              <!-- /.author-desc -->
            </div> <!-- /.about-author -->
            <p>I'm a multi-award winning designer that has been specialising in web design for the past three years
              although I have experience in branding and print.Projects.</p>
          </div> <!-- /.col -->

          <div class="col-xs-12 col-md-6">
            <div class="section-title clear">
              <h3>Skills</h3>
            </div>
            <div class="skill-wrapper">
              <div class="progress clear">
                <div class="skill-name">Photoshop</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="90%"></div>
              </div> <!-- /.progress -->
              <div class="progress clear">
                <div class="skill-name">Illustrator</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="78%"></div>
              </div> <!-- /.progress -->
              <div class="progress clear">
                <div class="skill-name">After Fffects</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="85%"></div>
              </div> <!-- /.progress -->
              <div class="progress clear">
                <div class="skill-name">HTML5</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="95%"></div>
              </div> <!-- /.progress -->
              <div class="progress clear">
                <div class="skill-name">WordPress</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="70%"></div>
              </div> <!-- /.progress -->
              <div class="progress clear">
                <div class="skill-name">jQuery</div>
                <div class="skill-bar">
                  <div class="bar"></div>
                </div>
                <div class="skill-lavel" data-skill-value="75%"></div>
              </div> <!-- /.progress -->
            </div> <!-- /.skill-wrapper -->
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->

      
      <!-- /.container -->
    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
@endsection

<div class="col skill {{ $term_classes }}">
    <div class="skill-inner">
        <figure class="skills-item">
            {!! $image !!}
            <div class="overlay"></div>
            <figcaption class="overlay-inner">
                <a href="{{ $url }}" target="_blank"><h4>{{ $title }}</h4></a>
                <p>{{ $term_list }}</p>
            </figcaption>
        </figure>
    </div>
</div>


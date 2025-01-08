<div class="row project">
  <div class="col-lg-6 d-flex align-items-center justify-content-center @if($imageSide === 'right') test order-1 order-lg-2 @endif">
    {!! $image !!}
  </div>
  <div class="col-lg-6 d-flex align-items-center justify-content-center flex-column @if($imageSide === 'right') order-2 order-lg-1 @endif">
    <h2>{{ $title }}</h2>
    {!! $content !!}
    <span class="btn-border">
      <a href="{{ $projectLink['url'] }}" target="{{ $projectLink['target'] }}" class="btn btn-primary btn-custom-border text-uppercase">{{ $projectLink['title'] }}</a>
    </span>
  </div>
</div>
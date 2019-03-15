@foreach($tours as $tour)       
    <?php
    $principalImg = explode(',', $tour->fotos);
    ?> 
    <div class="col-md-4 portfolio-grids box-course-button">
        <a class="wow zoomIn animated" data-wow-delay=".5s" href="{{ asset('images/'. $tour->name . '/' . $principalImg[0]) }}" data-lightbox="example-set" data-title="{{ $tour->long_description or '' }}">
            <img src="{{ asset('images/'. $tour->name . '/' . $principalImg[0]) }}" class="img-responsive zoom-img" alt=""/>
            <div class="b-wrapper">
                <h5>{{ $tour->name or '' }}</h5>
            </div>
        </a>
    </div>
@endforeach 
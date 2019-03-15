@extends('layouts.frontpage')

@section('content')

<div class="sap_tabs">          
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list wow fadeInUp animated" data-wow-delay=".7s">
                        <li class="resp-tab-item zonas" data-id="all"><span>All</span></li>
                        @foreach($zonas as $zona)
                            <li class="resp-tab-item zonas" data-id="{{ $zona->id }}"><span>{{ $zona->name }}</span></li> 
                        @endforeach                    
                    </ul>   
                    <div class="clearfix"> </div>   
                                         
                </div>
            </div>
            <div class="resp-tabs-container">
                        
                        <div class="">
                            <div class="tab_img">
                                <div class="container" id="tures-front">
                                    @foreach($tours as $tour)       
                                        <?php
                                        $principalImg = explode(',', $tour->fotos);
                                        ?> 
                                        <div class="col-md-4 portfolio-grids box-course-button">
                                            <a class="wow zoomIn animated" data-wow-delay=".5s" href="{{ asset('images/'.$principalImg[0]) }}" data-lightbox="example-set" data-title="{{ $tour->long_description or '' }}">
                                                <img src="{{ asset('images/'. $tour->name . '/' . $principalImg[0]) }}" class="img-responsive zoom-img" alt=""/>
                                                <div class="b-wrapper">
                                                    <h5>{{ $tour->name or '' }}</h5>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach                    
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </div> 
        </div>
@endsection
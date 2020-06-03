

<section class="banner-section">

        <div class="row">
            <div class="col-md-12">
                <div class="slider-option">
        <div id="slider" class="carousel slide wow fadeInDown" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php
     $sliders =  App\Slider::where('db_status','Live')->orderBy('id','DESC')->take('5')->get();
      ?>
                @php
                    $i = 1;
                @endphp
                @foreach($sliders as $slider)
                    <div class="item @if($i == 1) active @endif">
                        <div class="slider-item">
                            <img src="{{asset('upload/images/slider')}}/{{$slider->image}}"
                                 alt="slider">
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
    <!-- .slider-option -->
            </div>
        </div>

</section>
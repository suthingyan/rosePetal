@if(Auth::user())
<div class="container-fluid" class="">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" style="">
          <?php $review=App\Models\Review::all();?>
          <div class="review">
              <img src="{{asset('assets\images\contact-heading.jpg')}}" alt="Nature" style="width:100%;height:300px;opacity:.7">
          @foreach($review as $data)
            <div class="carousel-item @if($loop->first ) active @endif">
              <div class="text-block card col-lg-8 col-md-8 col-sm-8 w-50">
                <h4 class="text-white fw-bolder">Customer Review</h4>
                <p class=" text-white">{{  $data->description}}</p>
              </div>
            </div>
          @endforeach
      </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>
@else
<div class=""></div>
@endif

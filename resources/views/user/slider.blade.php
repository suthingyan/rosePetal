<div class="container-fluid">

    <div id="carouselExampleCaptions" class="carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($item as $data)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($item as $data)
            <div class="carousel-item  @if($loop->first ) active @endif" >
                
                <div class="card h-25">
                <img class="d-block w-100 h-25" src="{{asset('product/images')}}/{{$data->image}}" alt="" style="aspect-ratio:5/2">
                
                </div>
            </div>
            @endforeach
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
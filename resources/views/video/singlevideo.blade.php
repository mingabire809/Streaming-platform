@extends('layouts.app')
@section('content')

<div class="container">
  <script>
    function scrollToTop() {
        window.scrollTo(0, 0);
    }
    window.addEventListener('load', scrollToTop);
</script>
    
        <div class="row">
          <div>
            
          </div>
          <div class="col-9">
            

              <video controls class="col-12" autoplay>
                <source src="/storage/{{$video->video}}" type="video/mp4">
              </video>
              
              @php
                  $nextIndex = $index + 1;
                  $hasNextIndex = $nextIndex < count($array);
                  $nextElementId = $hasNextIndex ? $array[$nextIndex] : null;

                  $previousIndex = $index - 1;
                  $hasPreviousIndex = $previousIndex >= 0;
                  $previousElementId = $hasPreviousIndex ? $array[$previousIndex] : null;
              @endphp

            <div class="d-flex col-sm-6 col-12 justify-content-between">
             

              @if ($hasPreviousIndex)
                <form action="/my-video/{{$previousElementId}}" method="GET">
                  
                <button class="btn btn-primary" type="submit">Previous</button>
                </form>
                  @else
                    <button class="btn btn-primary" disabled>Previous</button>
                  @endif
              
              
              @if ($hasNextIndex)
                <form action="/my-video/{{$nextElementId}}" method="GET">
                  
                <button class="btn btn-primary" type="submit">Next</button>
                </form>
                  @else
                    <button class="btn btn-primary" disabled>Next</button>
                  @endif


            </div>
                <form action="/my-video/edit/{{$video->id}}" class="col-6 mt-3" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <h4>Edit title</h4>
                    </div>
                    <div class="mb-5">
                        <label for="title" class="col-md-4 col-form-label">Title</label>
                        <input type="text"
                         class="form-control @error('title') is-invalid @enderror"  
                         name="title" id="title" 
                         value="{{old('title') ?? $video->title}}"
                         autocomplete="title" autofocus>
                         @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                        <button class="btn btn-secondary mt-2">Save changes</button>
                    </div>
                   
                    
                </form>
              <h4 class="mt-3 text-left font-weight-bolder">{{$video->title}}</h4>
              <h6 class="mt-2">Uploaded on: {{$video->created_at}}</h6>
              <h6 class="mt-2">Updated on: {{$video->updated_at}}</h6>
              <h6>{{$difference}}</h6>
              <h6>By {{$video->user->name}}</h6>
            
            

              <h5 class="mt-4 text-left font-weight-bolder">Comment</h5>

              @foreach($comments as $comment)
              <div class="mb-4">
                <h6 class="font-weight-bolder">{{$comment->user->name}}</h6>
                <p>{{$comment->comment}}</p>
                <p class="">{{$comment->created_at -> diffForHumans($today)}}</p>
              </div>
              @endforeach
              
              
        </div>

        <div class="col-3">

          @foreach($videos as $video)
          <div class="col-12 mb-3 text-align-center">
            <a href="/my-video/{{$video->id}}">
              <img src="/{{$video->thumb}}" class="w-100 h-100"  alt="">
              
            </a>
            <h6 style="text-align: center" class="mt-2">{{$video->title}}</h6>
          </div>
          @endforeach
        

          
        </div>
        </div>

        
    

</div>

@endsection
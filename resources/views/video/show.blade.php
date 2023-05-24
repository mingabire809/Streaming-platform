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
                <form action="/video/{{$previousElementId}}" method="GET">
                  
                <button class="btn btn-primary" type="submit">Previous</button>
                </form>
                  @else
                    <button class="btn btn-primary" disabled>Previous</button>
                  @endif
              
              
              @if ($hasNextIndex)
                <form action="/video/{{$nextElementId}}" method="GET">
                  
                <button class="btn btn-primary" type="submit">Next</button>
                </form>
                  @else
                    <button class="btn btn-primary" disabled>Next</button>
                  @endif


            </div>
    
              <h4 class="mt-3 text-left font-weight-bolder">{{$video->title}}</h4>
              <h6 class="mt-2">Uploaded on: {{$video->created_at}}</h6>
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
              

              

              <div class="col-9">
                <form action="/video/{{$video->id}}/comment" enctype="multipart/form-data" method="post" class="form-group">
                  @csrf
                
                  <textarea name="comment" id="comment" class="form-control" rows="5" style="resize: none"
                  type="text" class="form-control @error('comment') is-invalid @enderror" title="comment" autocomplete="comment" autofocus required
                  ></textarea>
                  @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  <button type="submit" class="btn btn-secondary align-bottom mt-3 mb-3">Add Comment</button>
                
              </form>
              </div>
              
        </div>

        <div class="col-3">

          @foreach($videos as $video)
          <div class="col-12 mb-3 text-align-center">
            <a href="/video/{{$video->id}}">
              <img src="/{{$video->thumb}}" class="w-100 h-100"  alt="">
              
            </a>
            <h6 style="text-align: center" class="mt-2">{{$video->title}}</h6>
          </div>
          @endforeach
          

         

          

          

          
        </div>
        </div>

        
    

</div>

@endsection
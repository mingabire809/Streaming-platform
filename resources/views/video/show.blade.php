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
          <div class="col-9" style="background-color: aquamarine">
            <div class="h-25">
              <div class="embed-responsive embed-responsive-16by9 col-12 h-100" style="background-color: blue">
                
                <iframe class="embed-responsive-item w-100 h-100" src="/storage/{{$video->video}}" allowfullscreen></iframe>
              </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <button class="btn btn-primary">Previous</button>
              <button class="btn btn-primary">Next</button>
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
                <p class="">Added on: {{$comment->created_at}}</p>
              </div>
              @endforeach
              

              

              <div class="col-9">
                <form action="/video/{{$video->id}}/comment" enctype="multipart/form-data" method="post" class="form-group">
                  @csrf
                
                  <textarea name="comment" id="comment" class="form-control" rows="5" style="resize: none"
                  type="text" class="form-control @error('comment') is-invalid @enderror" title="comment" autocomplete="comment" autofocus required
                  ></textarea>
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
@extends('layouts.app')
@section('content')

<div class="container">
  
  
  <div class="row">

   @if ($video->count() ==0)
   <div class="col-9 mx-auto">

      <img src="https://cdn.dribbble.com/users/1883357/screenshots/6016190/search_no_result.png" class="w-100 h-100"  alt="">
      
  </div>
  
  @else
  @foreach($video as $videos)
  <div class="col-3 mb-3 mt-5 text-align-center">
      <a href="/video/{{$videos->id}}">
        <img src="/{{$videos->thumb}}" class="w-100 h-100"  alt="">
        
      </a>
      <h6 style="text-align: center" class="mt-2">{{$videos->title}}</h6>
    </div>
  @endforeach
   @endif

    
   


    
    
  </div>
</div>



@endsection
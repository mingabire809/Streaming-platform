@extends('layouts.app')
@section('content')

<div class="container">
  
  
  <div class="row">

    @foreach($video as $videos)
    <div class="col-3 mb-3 mt-5 text-align-center">
        <a href="/my-video/{{$videos->id}}">
          <img src="/{{$videos->thumb}}" class="w-100 h-100"  alt="">
          
        </a>
        <h6 style="text-align: center" class="mt-2">{{$videos->title}}</h6>
      </div>
    @endforeach
   


    
    
  </div>
</div>

@endsection
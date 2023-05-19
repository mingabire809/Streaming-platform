@extends('layouts.app')
@section('content')

<div class="container">

    
        <div class="col-12">
            <div class="embed-responsive embed-responsive-16by9 col-9">
                
                <iframe class="embed-responsive-item w-50 h-75" src="/storage/{{$video->video}}" allowfullscreen></iframe>
              </div>
    
              <h6>{{$video->title}}</h6>
        </div>
    

</div>

@endsection
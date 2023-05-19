@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/video" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" title="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="video" class="col-md-4 col-form-label text-md-end">{{ __('Video') }}</label>

                <div class="col-md-6">
                    <input id="video" type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" autocomplete="video">

                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

           

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Upload') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
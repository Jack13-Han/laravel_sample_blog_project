@extends('master')
@section('title','Post Details')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h1 class="card-title">Post Details</h1>
                                <p class="card-text text-black-50">Here are the details for the selected post.</p>
                            </div>
                            <div class="">
                                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Home</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">

                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                                <p class="card-text text-muted">{{ Str::words($post->description) }}</p>
                            </div>
                            
                        </div>


                </div>
            </div>

        </div>

    </div>
@endsection

@extends('master')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h1 class="card-title">Welcome to the Sample Blog</h1>
                                <p class="card-text text-black-50">This is a simple blog application built with Laravel.</p>
                            </div>
                            <div class="">
                                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="">
                    @foreach ($posts as $post)
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                                <p class="card-text text-muted">{{ Str::words($post->description, 18) }}</p>
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center px-3">

                                <div class="">
                                    {{ $post->created_at->format('Y M,d | h:i A') }}
                                </div>

                                <div>


                                    <a type="button" href="{{ route('post.show', $post->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Read More</a>


                                    <form class="d-inline-block" method="post"
                                        action="{{ route('post.destroy', $post->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>

                                    <a href="{{ route('post.edit', $post->id) }}"
                                        class="btn btn-sm btn-outline-warning">Edit</a>



                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
@endsection

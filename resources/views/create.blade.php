@extends('master')
@section('title','Create Post')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h1 class="card-title">Create New Post</h1>

                            </div>
                            <div class="">
                                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Home</a>
                            </div>
                        </div>

                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul class="mb-0">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                        <div class="">
                            <form action="{{ route('post.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid

                                    @enderror" id="title" name="title" >
                                    @error('title')
                                        <div class="text-danger invalid-feedback">{{ $message }}</div>

                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid

                                    @enderror" id="description" value="{{ old('description') }}" name="description" rows="4" ></textarea>
                                    @error('description')
                                        <div class="text-danger invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

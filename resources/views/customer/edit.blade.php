@extends('main')

@section('content')
    <div class="container p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-5">



                {{-- Card  --}}
                <form action="{{ route('customer.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Edit Post
                        </div>
                        <img src="{{ asset('storage/'.$data->image) }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <input type="hidden" name="postId" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid  @enderror" value="{{ $data->title }}" name="title" placeholder="Enter Title">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid  @enderror" placeholder="Enter Description" id=""  rows="5" style="resize: none;">{{ $data->description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid  @enderror" name="price" placeholder="Enter Price" value="{{ $data->price }}">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid  @enderror" name="address" placeholder="Enter Address" value="{{ $data->address }}">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control  @error('image') is-invalid  @enderror" name="image" placeholder="Enter image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('customer.home') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

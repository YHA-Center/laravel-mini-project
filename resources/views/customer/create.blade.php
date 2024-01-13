@extends('main')

@section('content')
    <div class="container p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-5">

                {{-- Card  --}}
                <form action="{{ route('customer.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Create Post
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Title</label>
                                <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" name="title" placeholder="Enter Title">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control  @error('description') is-invalid  @enderror" placeholder="Enter Description" id=""  rows="5" style="resize: none;"></textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Price</label>
                                <input type="number" class="form-control  @error('price') is-invalid  @enderror" name="price" placeholder="Enter Price">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control  @error('address') is-invalid  @enderror" name="address" placeholder="Enter Address">
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
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('customer.home') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

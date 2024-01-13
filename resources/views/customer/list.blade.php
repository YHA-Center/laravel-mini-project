@extends('main')

@section('content')
    <div class="container p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-5">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


                {{-- Card  --}}
                @foreach ($customer as $item)
                <div class="card border-primary shadow my-3">
                    <div class="card-header border-primary">
                        <div class="h4"> {{ $item->title }}  </div>
                    </div>
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="fs-5">
                            {{ $item->description }}
                        </div>
                        <hr>
                        <small><i class="fas fa-dollar text-secondary"></i> {{ $item->price }}</small> &nbsp;&nbsp;
                        <small><i class="fas fa-location-dot text-secondary"></i> {{ $item->address }}</h6>
                    </div>
                    <div class="card-footer border-primary">
                        <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a href="{{ route('customer.delete', $item->id) }}" class="btn btn-sm  btn-danger"><i class="fas fa-trash"></i> Delete</a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection

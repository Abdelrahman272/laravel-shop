@extends('dashboard.layout')

@section('title')
    Flash Deals
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Flash Deals</h1>

        <a href="{{ url('/admin/deals') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Back to Flash Deals
        </a>
    </div>

    <!-- DataTales Example -->
    <form action="{{ url('/admin/deals') }}" method="POST">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    New Deal
                </h6>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Products</label>
                    <select class="custom-select" name="product_id">
                        <option selected value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Discount</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">%</div>
                        </div>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror">
                    </div>
                    @error('discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Duration</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">hrs</div>
                        </div>
                        <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror">
                    </div>
                    @error('duration')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Start Time</label>
                    <input type="datetime-local" name="started_at" class="form-control">
                    @error('started_at')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

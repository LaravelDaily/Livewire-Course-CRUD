@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit product') }}</div>

                    <div class="card-body">
                        @livewire('products-form', ['product' => $product])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

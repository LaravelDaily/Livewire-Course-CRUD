<form method="POST" wire:submit.prevent="save">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input wire:model="product.name" id="name" type="text"
                   class="form-control @error('product.name') is-invalid @enderror"
                   required autocomplete="name" autofocus>

            @error('product.name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="description"
               class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <textarea wire:model="product.description"
                      class="form-control @error('product.description') is-invalid @enderror"></textarea>

            @error('product.description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="productCategories"
               class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>

        <div class="col-md-6">
            <select multiple wire:model="productCategories"
                    class="form-control @error('productCategories') is-invalid @enderror">
                <option value="">-- choose categories --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('productCategories')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="color"
               class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

        <div class="col-md-6">
            @foreach (\App\Models\Product::COLORS_LIST as $key => $value)
                <input wire:model="product.color"
                       type="radio" value="{{ $key }}" /> {{ $value }}<br />
            @endforeach
            @error('product.color')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="color"
               class="col-md-4 col-form-label text-md-right"></label>

        <div class="col-md-6">
            <input wire:model="product.in_stock"
                   type="checkbox" value="1" /> In stock
            @error('product.in_stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="stock_date" class="col-md-4 col-form-label text-md-right">{{ __('Stock Date') }}</label>

        <div class="col-md-6">
            <input wire:model.defer="product.stock_date" placeholder="m/d/Y" type="text"
                   class="form-control @error('product.stock_date') is-invalid @enderror">

            @error('product.stock_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

        <div class="col-md-6">
            <input wire:model.defer="photo" type="file"
                   class="@error('photo') is-invalid @enderror">

            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save Product') }}
            </button>
        </div>
    </div>
</form>

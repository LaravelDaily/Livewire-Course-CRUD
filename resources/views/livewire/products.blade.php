<div>
    <div class="row">
        <div class="col-md-3">
            <input wire:model="searchQuery" type="text" placeholder="Search for product..." class="form-control" />
        </div>
        <div class="col-md-3">
            <select wire:model="searchCategory" name="category" class="form-control">
                <option value="">-- choose category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('products.create') }}"
               class="btn btn-primary">Add new product</a>
        </div>
    </div>
    <hr />
    <table class="table">
    <thead>
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Categories</th>
        <th>Description</th>
        <th>Stock date</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>
                @if ($product->photo)
                    <img src="/storage/{{ $product->photo }}" width="50" />
                @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>
                @foreach ($product->categories as $category)
                    {{ $category->name }}<br />
                @endforeach
            </td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock_date }}</td>
            <td>
                <a class="btn btn-sm btn-primary"
                   href="{{ route('products.edit', $product) }}">Edit</a>
                <a onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                   wire:click="deleteProduct('{{ $product->id }}')"
                   class="btn btn-sm btn-danger" href="#">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No products found.</td>
        </tr>
    @endforelse
    </tbody>
    </table>
    {{ $products->links() }}
</div>

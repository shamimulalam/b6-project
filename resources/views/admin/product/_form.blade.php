<div class="card-body">
    <div class="form-group">
        <label for="category_id">Select Category</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option @if(old('category_id',isset($product)?$product->category_id:null) == $category->id) selected @endif  value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" value="{{ old('name',isset($product)?$product->name:null) }}" id="name" placeholder="Enter product name">
        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="name" placeholder="Enter product description">{{ old('description',isset($product)?$product->description:null) }}</textarea>
    </div>
    <div class="form-group">
        <label for="color">Color</label>
        <input name="color" type="text" class="form-control" value="{{ old('color',isset($product)?$product->color:null) }}" id="color" placeholder="Enter product color">
        @error('color') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="size">Size</label>
        <input name="size" type="text" class="form-control" value="{{ old('size',isset($product)?$product->size:null) }}" id="size" placeholder="Enter product size">
        @error('size') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input name="price" type="number" class="form-control" value="{{ old('price',isset($product)?$product->price:null) }}" id="price" placeholder="Enter product price">
        @error('price') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="stock">stock</label>
        <input name="stock" type="number" class="form-control" value="{{ old('stock',isset($product)?$product->stock:null) }}" id="stock" placeholder="Enter product stock">
        @error('stock') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="form-check ">
            <input name="status" type="radio" @if(old('status',isset($product)?$product->status:null) == 'Active') checked @endif class="form-check-input" value="Active" id="active">
            <label for="active">Active</label>
        </div>
        <div class="form-check">
            <input name="status" type="radio" @if(old('status',isset($product)?$product->status:null) == 'Inactive') checked @endif class="form-check-input" value="Inactive" id="inactive">
            <label for="inactive">Inactive</label>
        </div>
        @error('status') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input name="image" type="file" class="form-control" id="image" placeholder="Upload Image">
        @error('image') <i class="text-danger">{{ $message }}</i> @enderror
    </div>
</div>

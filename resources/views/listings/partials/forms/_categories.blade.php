<div class="form-group @error('category_id') is-invalid @enderror">
    <label for="category_id">Category</label>
    <select id="category" class="form-control @error('category_id') is-invalid @enderror" name="category_id"
        {{ isset($listing) && $listing->live() ? 'disabled="disabled"' : '' }}>

        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                    @if ((isset($listing) && $listing->category_id == $child->id) || (old('category_id') == $child->id))
                        <option value="{{ $child->id }}" selected="selected">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @else
                        <option value="{{ $child->id }}">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('category_id')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

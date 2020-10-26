<div class="form-group">
    <label for="title">Book Title <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $book->title ?? '') }}" >
    {{--<small class="font-italic">Please follow given format (no-spacing) eg: ABC123</small>--}}
    @error('title')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
</div>

<div class="form-row">
<div class="form-group col-md-4">
    <label for="isbn">ISBN NO <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" >
    @error('isbn')
    <span class="invalid-feedback" role="alert">
                                        strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group col-md-8">
    <label for="type">Book Type <span class="text-danger"> * </span></label>
    <select name="type" class="custom-select @error('type') is-invalid @enderror" >
        <option selected disabled value="{{ old('type', $book->type ?? '') }}">{{ old('type', $book->type ?? '') }}</option>
        <option value="Fiction">Fiction</option>
        <option value="Non-Fiction">Non-Fiction</option>
    </select>
    @error('type')
    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
    @enderror
</div>
</div>


<div class="form-group">
    <label for="author">Author Name <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author', $book->author ?? '') }}" >
    {{--<small class="font-italic">Please follow given format (no-spacing) eg: ABC123</small>--}}
    @error('author')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
</div>

<div class="form-group">
    <label for="quantity">Quantity <span class="text-danger"> * </span></label>
    <input type="number" min="1" class="form-control  @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $book->quantity ?? '') }}" required>
    @error('quantity')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="purchase_date">Purchased Date <span class="text-danger"> * </span></label>
    <div class="input-group">
        <input id="picker3" class="form-control datepicker @error('purchase_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="purchase_date" value="{{ old('purchase_date', $book->purchase_date ?? '') }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="icon-regular i-Calendar-4"></i>
            </div>
        </div>
        @error('purchase_date')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

</div>

<div class="form-row">
<div class="form-group col-md-4">
    <label for="edition">Edition <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('edition') is-invalid @enderror" name="edition" value="{{ old('edition', $book->edition ?? '') }}" >
    @error('edition')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group col-md-4">
    <label for="price">Price <span class="text-danger"> * </span></label>
    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $book->price ?? '') }}" required>
    @error('price')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="form-group col-md-4">
    <label for="pages">Pages <span class="text-danger"> * </span></label>
    <input type="number" min="1" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages', $book->pages ?? '') }}" required>
    @error('pages')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>

<div class="form-group">
    <label for="publisher">Publisher  <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}" >
    {{--<small class="font-italic">Please follow given format (no-spacing) eg: ABC123</small>--}}
    @error('publisher')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
</div>

<span class="text-danger"> * </span><span class="font-italic">fields are required.</span><br/>
<button type="submit" class="btn btn-primary ">Submit</button>
<button type="reset" class="btn btn-outline-secondary">Reset</button>




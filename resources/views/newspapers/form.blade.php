<div class="form-row">
    <div class="form-group col-md-3">
        <label for="language">Language <span class="text-danger"> * </span></label>
        <select name="language" class="custom-select @error('language') is-invalid @enderror" >
            <option selected disabled value="{{ old('language', $newspaper->language ?? '') }}">{{ old('language', $newspaper->language ?? '') }}</option>
            <option value="English">English</option>
            <option value="Malay">Malay</option>
            <option value="Mandarin">Mandarin</option>
            <option value="Tamil">Tamil</option>
        </select>
        @error('language')
        <div class="ul-form__text form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-3">
        <label for="type">Newspaper Type <span class="text-danger"> * </span></label>
        <select name="type" class="custom-select @error('type') is-invalid @enderror" >
            <option selected disabled value="{{ old('type', $magazine->type ?? '') }}">{{ old('type', $newspaper->type ?? '') }}</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Education">Education</option>
            <option value="Business">Business</option>
        </select>
        @error('type')
        <div class="ul-form__text form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="name">Name <span class="text-danger"> * </span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $newspaper->name ?? '') }}" >
        @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="receipt_date">Date of Receipt <span class="text-danger"> * </span></label>
        <div class="input-group">
            <input id="picker3" class="form-control datepicker @error('receipt_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="receipt_date" value="{{ old('receipt_date', $newspaper->receipt_date ?? '') }}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="icon-regular i-Calendar-4"></i>
                </div>
            </div>
            @error('receipt_date')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="publish_date">Date Published <span class="text-danger"> * </span></label>
        <div class="input-group">
            <input id="picker2" class="form-control datepicker @error('publish_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="publish_date" value="{{ old('publish_date', $newspaper->publish_date ?? '') }}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="icon-regular i-Calendar-4"></i>
                </div>
            </div>
            @error('publish_date')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="price">Price <span class="text-danger"> * </span></label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $newspaper->price ?? '') }}" required>
        @error('price')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="pages">Pages <span class="text-danger"> * </span></label>
        <input type="number" min="1" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages', $newspaper->pages ?? '') }}" required>
        @error('pages')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="publisher">Publisher  <span class="text-danger"> * </span></label>
    <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher', $newspaper->publisher ?? '') }}" >
    @error('publisher')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<span class="text-danger"> * </span><span class="font-italic">fields are required.</span><br/>
<button type="submit" class="btn btn-primary ">Submit</button>
<button type="reset" class="btn btn-outline-secondary">Reset</button>




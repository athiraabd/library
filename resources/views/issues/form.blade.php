<div class="form-row">
    <div class="form-group col-md-6">
        <label for="issue_date">Issued Date <span class="text-danger"> * </span></label>
        <div class="input-group">
            <input id="picker3" class="form-control datepicker @error('issue_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="issue_date" value="{{ old('issue_date', $issue->issue_date ?? '') }}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="icon-regular i-Calendar-4"></i>
                </div>
            </div>
            @error('issue_date')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


</div>

<div class="form-group">
    <label for="book_id">Book Title <span class="text-danger"> * </span></label>
    <select name="book_id" class="custom-select @error('book_id') is-invalid @enderror" >
        <option selected disabled value="{{ old('book_id', $issue->book_id ?? '') }}">{{ old('type', $book->title ?? '') }}</option>
        @foreach($books as $book)
        <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>
    @error('book_id')
    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
    @enderror
</div>

<span class="text-danger"> * </span><span class="font-italic">fields are required.</span><br/>
<button type="submit" class="btn btn-primary ">Submit</button>
<a type="button" href="{{ route('issues.index') }}" class="btn btn-outline-danger">Cancel</a>




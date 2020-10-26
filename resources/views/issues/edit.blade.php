@extends('layouts.master')
@section('main-content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Edit Issued Books</div>

                    <form action="{{ route('issues.update', $issue) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-10">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="issue_date">Issued Date <span class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <input class="form-control datepicker @error('issue_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="issue_date" value="{{ old('issue_date', $issue->issue_date->format('d/m/Y') ?? '') }}" readonly>
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

                                <div class="form-group col-md-6">
                                    <label for="due_date">Due Date <span class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <input class="form-control datepicker @error('due_date') is-invalid @enderror" data-date-format="dd/mm/yyyy" name="due_date" value="{{ old('publish_date', $issue->due_date->format('d/m/Y') ?? '') }}" readonly>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="icon-regular i-Calendar-4"></i>
                                            </div>
                                        </div>
                                        @error('due_date')
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
                                    <option selected disabled value="{{ old('book_id', $issue->book_id ?? '') }}">{{ old('type', $issue->book->title ?? '') }}</option>
                                </select>
                                @error('book_id')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="return_date">Returned Date <span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input id="picker4"
                                           class="form-control datepicker @error('return_date') is-invalid @enderror"
                                           data-date-format="dd/mm/yyyy" name="return_date"
                                           value="{{ old('return_date', $issue->return_date->format('d/m/Y') ?? '') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </div>
                                    </div>
                                    @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status <span class="text-danger"> * </span></label>
                                <select name="status" id="status" class="custom-select @error('status') is-invalid @enderror" >
                                    <option selected disabled value="{{ old('status', $issue->status ?? '') }}">{{ old('status', $issue->statusTitle ?? '') }}</option>
                                    <option value="2">Returned</option>
                                    <option value="3">Late Returned</option>
                                </select>
                                @error('status')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="myFine"></div>


                            <span class="text-danger"> * </span><span class="font-italic">fields are required.</span><br/>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection

@section('page-js')
    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

    <script>
        $(document).ready(function(){

            var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);

            $('#picker4').pickadate({
                format: 'dd/mm/yyyy',
                disable: [
                    { from: [0,0,0], to: yesterday }
                ]
            });

            $('#status').on('change', function () {
                var status = $(this).val();

                if ( status === '3') {
                    document.getElementById('myFine').innerHTML = "<div class=\"form-row\">\n" +
                        "                            <div class=\"form-group col-md-4\">\n" +
                        "                                <label for=\"status\">Fine (RM) <span class=\"text-danger\"> * </span></label>\n" +
                        "                                <input type=\"number\" step=\"0.01\" class=\"form-control\" name=\"fine\" value=\"{{ old('fine', $issue->fine ?? '') }}\">\n" +
                        "                            </div></div> ";
                }

            });

        });



    </script>


@endsection

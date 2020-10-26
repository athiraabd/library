@extends('layouts.master')
@section('main-content')


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('magazines.create') }}" class="btn btn-primary">Add Magazines</a>
                    </div>
                    <div class="card-title">List of Magazines</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date of Receipt</th>
                            <th scope="col">Date Published</th>
                            <th scope="col">Price (RM)</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($magazines as $key => $magazine)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $magazine->type }}</td>
                                <td>{{ $magazine->name }}</td>
                                <td>{{ $magazine->receipt_date }}</td>
                                <td>{{ $magazine->publish_date }}</td>
                                <td>{{ $magazine->price }}</td>
                                <td>{{ $magazine->pages }}</td>
                                <td>{{ $magazine->publisher }}</td>
                                <td>
                                    <div class="row">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle btn-sm border-0" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('magazines.edit', $magazine) }}">Edit
                                                    Details</a>
                                                <div class="dropdown-divider"></div>
                                                <form id="delete-{{$magazine->id}}"
                                                      action="{{ route('magazines.destroy', $magazine) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                       onclick="return clicked({{$magazine->id}})">Delete Book</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('page-js')
    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>

    <script>
        function clicked(id) {
            return (confirm('Are your sure?')) ? $('#delete-' + id).submit() : false;
        }
    </script>

@endsection

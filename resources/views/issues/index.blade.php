@extends('layouts.master')
@section('main-content')


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('issues.create') }}" class="btn btn-primary">Add Issued</a>
                    </div>
                    <div class="card-title">List of Issued Books</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($issues as $issue)
                            <tr>
                                <th scope="row"> </th>
                                <td>{{ $issue->book->title }}</td>
                                <td>{{ $issue->issue_date->format('d M Y') }}</td>
                                <td>{{ $issue->due_date->format('d M Y')}}</td>
                                <td>{{ $issue->statusTitle }}</td>
                                <td>
                                    <div class="row">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle btn-sm border-0" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-list-ul"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('issues.edit', $issue) }}">Edit
                                                    Details</a>
                                                <div class="dropdown-divider"></div>
                                                <form id="delete-{{$issue->id}}"
                                                      action="{{ route('issues.destroy', $issue) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                       onclick="return clicked({{$issue->id}})">Delete Issued Book</a>
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

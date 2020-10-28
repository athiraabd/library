@extends('layouts.master')
@section('main-content')
@section('page-css')
<style>
    #users-table_filter, .dataTables_paginate  {
        float: right;
    }
</style>
@endsection
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="table-responsive">
                        <table id="users-table" class="display table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">Book Title</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>



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
        $("#datepicker").datepicker({
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"

        });


    </script>

    <script src={{ asset('assets/js/vendor/datatables.min.js') }}></script>
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('monthly.data') }}'
                },
                columns: [
                    {
                        data: 'book.title',
                        name: 'book.title',
                    },
                    {
                        data: 'issue_date',
                        name: 'issue_date',
                    },
                    {
                        data: 'due_date',
                        name: 'due_date',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    }
                ],
            });
        });
    </script>

@endsection

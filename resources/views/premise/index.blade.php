@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="http://gull-html-laravel.test/assets/styles/vendor/datatables.min.css">
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Sistem Pengurusan Perakuan BOMBA</h1>
        <ul>
            <li>JBPM Negeri Melaka</li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col mb-4">
            <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Daftar Premis Baharu
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start"
                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -118px, 0px);">
                    <a class="dropdown-item" href="{{ route('premise.excel') }}">
                        <i class="i-Bell"> </i>
                        Muat-Naik Excel (.xlsx)</a>
                    <a class="dropdown-item" href="#">
                        <i class="i-Download-from-Cloud"> </i>
                        Daftar Baharu</a>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-card alert-success" role="alert">
                    <strong class="text-capitalize">Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="display table table-striped table-bordered" id="premise-table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script src="http://gull-html-laravel.test/assets/js/vendor/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#premise-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('premise.data') }}'
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
    </script>
@endsection

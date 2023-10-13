@extends('layouts.app')

@section('content')

    <body>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        {{-- breadCrumb --}}

        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">View Products</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('pages.login.dashboard') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href={{ route('pages.login.dashboard') }}>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-info">
                        {{ $message }}
                    </div>
                @endif

                <hr>
                <!-- Button trigger modal -->
                {{-- Data Form --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Iamge</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($result as $data)
                                        <tr>
                                            <input type="hidden" class="view_val" value="">
                                            <td>{{ $count }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ $data->price }}</td>
                                            <td><img src="{{ asset('images/'.$data->image) }}" width= '80' height='80'/></td>
                                            <td class="text-center">
                                            <a href="#edit{{ $data->id }}" data-bs-toggle="modal" class="btn btn-success viewGrn">Edit</a>
                                            @include('pages.viewProducts.action')
                                            <form action="{{ Route('pages.destroy', ['product' => $data]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                            <?php $count += 1; ?>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </body>
@endsection

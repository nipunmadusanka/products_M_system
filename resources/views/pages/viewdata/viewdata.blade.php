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
                                    <h5 class="m-b-10">Dashboard</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href=""><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
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

                <!-- Modal 1-->
                <div class="modal fade " class="modal-dialog modal-dialog-centered" id="staticBackdropv"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paidloanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paidloanLabel">Products</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <!--Modal form-->

                            <form action="{{ Route('pages.addproduct') }}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="Description">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Price">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" id="image" name="image" class="form-control"
                                                        placeholder="Image">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="container">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropv">
                       Add New product
                    </button>
                </div>
                <hr>


                <!-- Button trigger modal -->
                {{-- Data Form --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img class="card-img-top" src="assets/images/McN_POY_20158281.jpg" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>
@endsection

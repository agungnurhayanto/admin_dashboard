@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->

@section('kategori')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">@yield('kategori')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>

                        </ol>


                        <a href="#" class="btn btn-sm btn-primary">Buat Kategori baru</a>

                        <br />
                        <br />

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Kategori</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="1%">NO</th>
                                            <th>Kategori</th>
                                            <th>Slug</th>
                                            <th width="10%">OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm"> <i
                                                        class="fa fa-pencil"></i> </a>
                                                <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>


                            </div>



                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

        </div>

    </div>
@endsection

@section('title', 'Web Company Profile')

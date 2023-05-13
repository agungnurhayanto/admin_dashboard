@extends('layouts.main')
<!-- Content Wrapper. Contains page content -->
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <small>Management kategori blog</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-category">Buat Category Baru</a>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Kategori Article</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Kategori</th>
                                                    <th>Slug</th>
                                                    <th width="10%">OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-kategori">

                                                @foreach ($kategori as $k)
                                                    <tr id="index_{{ $k->id }}">
                                                        <td>{{ $k->kategori_nama }}</td>
                                                        <td>{{ $k->kategori_slug }}</td>

                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" id="btn-edit-kategori"
                                                                data-id="{{ $k->id }}"
                                                                class="btn btn-primary btn-sm">EDIT</a>
                                                            <a href="javascript:void(0)" id="btn-delete-kategori"
                                                                data-id="{{ $k->id }}"
                                                                class="btn btn-danger btn-sm">DELETE</a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @if ($kategori->hasPages())
                                        <div class="card-footer">
                                            {{ $kategori->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    </div>

    @include('modal.category_tambah')
    @include('modal.category_edit')
@endsection
@section('title', 'Web Company Profile')

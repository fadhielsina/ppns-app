@extends('layouts/app')
@section('konten')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5>Data PPNS</h5>
                <!-- Modal Add-->
                <button type="button" class="btn-sm btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal">Add</button>
                <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{ Form::open(['route' => ['data_ppns.store'], 'method' => 'post']) }}
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Pangkat</label>
                                        <input type="text" class="form-control" id="pangkat" name="pangkat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="">Bulan & Tahun</label>
                                        <input type="month" class="form-control" id="bulan_tahun" name="bulan_tahun">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Status</label>
                                        <input type="text" class="form-control" id="status" name="status">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Status Lantik</label>
                                        <input type="text" class="form-control" id="status_lantik" name="status_lantik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="">Instansi</label>
                                        <input type="text" class="form-control" id="instansi" name="instansi">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Wilayah Kerja</label>
                                        <input type="text" class="form-control" id="wilayah_kerja" name="wilayah_kerja">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="">No SK PPNS</label>
                                        <input type="text" class="form-control" id="no_sk_ppns" name="no_sk_ppns">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Masa Berlaku</label>
                                        <input type="text" class="form-control" id="masa_berlaku" name="masa_berlaku">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Pangkat</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Status Lantik</th>
                                <th>Instansi</th>
                                <th>Wilayah Kerja</th>
                                <th>Jabatan</th>
                                <th>No SK PPNS</th>
                                <th>Masa Berlaku</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $val)
                            <tr>
                                <td>
                                    <button class="btn btn-info btn-sm" type="submit"><span class="icofont icofont-ui-edit"></span></button>
                                    {{ Form::open(['route' => ['data_ppns.destroy', $val->id], 'method' => 'delete']) }}
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda Yakin?')"><span class="icofont icofont-ui-delete"></span></button>
                                    {{ Form::close() }}
                                </td>
                                <td>{{$val->nama}}</td>
                                <td>{{$val->nip}}</td>
                                <td>{{$val->pangkat}}</td>
                                <td>{{date('F', strtotime($val->bulan_tahun))}}</td>
                                <td>{{date('Y', strtotime($val->bulan_tahun))}}</td>
                                <td>{{$val->status}}</td>
                                <td>{{$val->status_lantik}}</td>
                                <td>{{$val->instansi}}</td>
                                <td>{{$val->wilayah_kerja}}</td>
                                <td>{{$val->jabatan}}</td>
                                <td>{{$val->no_sk_ppns}}</td>
                                <td>{{$val->masa_berlaku}}</td>
                                <td>{{$val->keterangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Zero config.table end -->
    </div>
</div>
@endsection
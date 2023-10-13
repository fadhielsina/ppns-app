@extends('layouts/app-admin')
@section('konten')
<!-- Basic Form Inputs card start -->
<div class="card">
    <div class="card-block">
        <h4 class="sub-title">Form Register PPNS</h4>
        {{ Form::open(['route' => ['data_ppns.store'], 'method' => 'post', 'files' => true]) }}
        @csrf
        <div class="form-group row">
            <div class="col-sm-6">
                <label>ID PPNS</label>
                <input type="text" id="id_ppns" name="id_ppns" value="{{old('id_ppns')}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>NIP</label>
                <input type="text" id="nip" name="nip" value="{{old('nip')}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label>Nama</label>
                <input type="text" id="nama" name="nama" value="{{old('nama')}}" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>No Surat</label>
                <input type="text" id="no_surat" name="no_surat" value="{{old('no_surat')}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label>Pangkat</label>
                <select name="pangkat_id" id="pangkat_id" class="form-control">
                    @foreach($master['pangkat'] as $val)
                    <option value="{{$val->id}}">{{$val->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6">
                <label>Bulan & Tahun</label>
                <input type="month" class="form-control" value="{{ date('Y-m') }}" id="bulan_tahun" name="bulan_tahun">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Status Lantik</label>
                <input type="text" id="status_lantik" value="{{old('status_lantik')}}" name="status_lantik" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label>Instansi</label>
                <select name="instansi_id" id="instansi_id" class="form-control">
                    @foreach($master['instansi'] as $val)
                    <option value="{{$val->id}}">{{$val->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label>Wilayah Kerja</label>
                <select name="wilayah_id" id="wilayah_id" class="form-control">
                    @foreach($master['wilayah'] as $val)
                    <option value="{{$val->id}}">{{$val->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label>Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control">
                    @foreach($master['jabatan'] as $val)
                    <option value="{{$val->id}}">{{$val->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label>No SKEP PPNS</label>
                <input type="text" id="no_skep_ppns" value="{{old('no_skep_ppns')}}" name="no_skep_ppns" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>Masa Berlaku</label>
                <input type="text" id="masa_berlaku" name="masa_berlaku" value="{{old('masa_berlaku')}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <label>Keterangan</label>
                <textarea rows="5" cols="5" id="keterangan" name="keterangan" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label>Upload Pas Foto</label>
                <input type="file" name="pas_foto" id="pas_foto" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Upload Foto NIK</label>
                <input type="file" name="foto_nik" id="foto_nik" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Upload Foto KTA</label>
                <input type="file" name="foto_kta" id="foto_kta" class="form-control">
            </div>
        </div>
        <h4 class="sub-title">Akun Login</h4>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
                <input type="text" id="no_hp" name="no_hp" value="{{old('no_hp')}}" class="form-control">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-info" type="submit">Register</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
<!-- Basic Form Inputs card end -->
@endsection
@extends('layouts/app-admin')
@section('konten')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        @if (session('message'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
                                    <div class="button-container" style="display:flex;">
                                        <button class="btn-sm btn btn-info open_modal" style="margin-right: 5px;" value="{{$val->id}}"><span class="icofont icofont-ui-edit"></span></button>
                                        {{ Form::open(['route' => ['data_ppns.destroy', $val->id], 'method' => 'delete', 'style' => 'margin-bottom:0px']) }}
                                        <button class="btn-sm btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')"><span class="icofont icofont-ui-delete"></span></button>
                                        {{ Form::close() }}
                                    </div>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="">Nama</label>
                            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama">
                        </div>
                        <div class="col-sm-4">
                            <label for="">NIP</label>
                            <input type="text" class="form-control" id="edit_nip" name="edit_nip">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Pangkat</label>
                            <input type="text" class="form-control" id="edit_pangkat" name="edit_pangkat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="">Bulan & Tahun</label>
                            <input type="month" class="form-control" id="edit_bulan_tahun" name="edit_bulan_tahun">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Status</label>
                            <input type="text" class="form-control" id="edit_status" name="edit_status">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Status Lantik</label>
                            <input type="text" class="form-control" id="edit_status_lantik" name="edit_status_lantik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="">Instansi</label>
                            <input type="text" class="form-control" id="edit_instansi" name="edit_instansi">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Wilayah Kerja</label>
                            <input type="text" class="form-control" id="edit_wilayah_kerja" name="edit_wilayah_kerja">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control" id="edit_jabatan" name="edit_jabatan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="">No SK PPNS</label>
                            <input type="text" class="form-control" id="edit_no_sk_ppns" name="edit_no_sk_ppns">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Masa Berlaku</label>
                            <input type="text" class="form-control" id="edit_masa_berlaku" name="edit_masa_berlaku">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="button" id="act_update" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.open_modal', function() {
        var id = $(this).val();
        //fetch detail post with ajax
        $.ajax({
            url: `data_ppns/edit/${id}`,
            type: "GET",
            cache: false,
            success: function(response) {
                //fill data to form
                $('#edit_id').val(id);
                $('#edit_nama').val(response.data.nama);
                $('#edit_nip').val(response.data.nip);
                $('#edit_pangkat').val(response.data.pangkat);
                $('#edit_bulan_tahun').val(response.data.bulan_tahun);
                $('#edit_status').val(response.data.status);
                $('#edit_status_lantik').val(response.data.status_lantik);
                $('#edit_instansi').val(response.data.instansi);
                $('#edit_wilayah_kerja').val(response.data.wilayah_kerja);
                $('#edit_jabatan').val(response.data.jabatan);
                $('#edit_no_sk_ppns').val(response.data.no_sk_ppns);
                $('#edit_masa_berlaku').val(response.data.masa_berlaku);
                $('#edit_keterangan').val(response.data.keterangan);

                //open modal
                $('#editModal').modal('show');
            }
        });
    });
</script>
<script>
    $(document).on('click', '#act_update', function() {
        let id = $('#edit_id').val();
        let nama = $('#edit_nama').val();
        let nip = $('#edit_nip').val();
        let pangkat = $('#edit_pangkat').val();
        let bulan_tahun = $('#edit_bulan_tahun').val();
        let status = $('#edit_status').val();
        let status_lantik = $('#edit_status_lantik').val();
        let instansi = $('#edit_instansi').val();
        let wilayah_kerja = $('#edit_wilayah_kerja').val();
        let jabatan = $('#edit_jabatan').val();
        let no_sk_ppns = $('#edit_no_sk_ppns').val();
        let masa_berlaku = $('#edit_masa_berlaku').val();
        let keterangan = $('#edit_keterangan').val();
        let token = $('#token').val();

        $.ajax({
            url: `data_ppns/update/${id}`,
            type: "put",
            cache: false,
            data: {
                "nama": nama,
                "nip": nip,
                "pangkat": pangkat,
                "bulan_tahun": bulan_tahun,
                "status": status,
                "status_lantik": status_lantik,
                "instansi": instansi,
                "wilayah_kerja": wilayah_kerja,
                "jabatan": jabatan,
                "no_sk_ppns": no_sk_ppns,
                "masa_berlaku": masa_berlaku,
                "keterangan": keterangan,
                "_token": token
            },
            success: function(response) {
                location.replace('/data_ppns');
            }
        });

    });
</script>
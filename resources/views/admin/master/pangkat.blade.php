@extends('layouts/app-admin')
@section('konten')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header">
                <h5>Master Pangkat</h5>
                <!-- Modal Add-->
                <button type="button" class="btn-sm btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal">Add</button>
                <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{ Form::open(['route' => ['master_pangkat.store'], 'method' => 'post']) }}
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Kode</label>
                                        <input type="text" class="form-control" id="kode" name="kode">
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
                                <th>Nama Pangkat</th>
                                <th>Kode Pangkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $val)
                            <tr>
                                <td>
                                    <div class="button-container" style="display:flex;">
                                        <button class="btn-sm btn btn-info open_modal" style="margin-right: 5px;" value="{{$val->id}}"><span class="icofont icofont-ui-edit"></span></button>
                                        {{ Form::open(['route' => ['master_pangkat.destroy', $val->id], 'method' => 'delete', 'style' => 'margin-bottom:0px']) }}
                                        <button class="btn-sm btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')"><span class="icofont icofont-ui-delete"></span></button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                                <td>{{$val->nama}}</td>
                                <td>{{$val->kode}}</td>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Nama</label>
                            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" id="edit_kode" name="edit_kode">
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
            url: `master_pangkat/${id}/edit`,
            type: "GET",
            cache: false,
            success: function(response) {
                //fill data to form
                $('#edit_id').val(id);
                $('#edit_nama').val(response.data.nama);
                $('#edit_kode').val(response.data.kode);

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
        let kode = $('#edit_kode').val();
        let token = $('#token').val();

        $.ajax({
            url: `master_pangkat/update/${id}`,
            type: "put",
            cache: false,
            data: {
                "nama": nama,
                "kode": kode,
                "_token": token
            },
            success: function(response) {
                location.reload();
            }
        });

    });
</script>
@extends('layouts.layout')
@section('title','Gallery System')
@section('content')
<div class="card">
    <div class="card-title">
        <h4>Add Album Documentations</h4>
    </div>
    <div class="row">
    </div>
    <div class="card-body">
        <form id="productnew" action="{{route('proses.album')}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="Nama Album" name="nama_album" id="name" class="form-control"
                                required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6" id="kagebunshin">
                        <div class="form-group">
                            <small class="muted-text">Masukkan gambar:</small>
                            <div class="input-group crl-group increment">
                                <input type="file" name="filename[]" class="form-control" id="">
                                <span class="input-group-btn"><button class="btn btn-success btn-group-right
                                                " type="button"><i class="fas fa-plus"></i>
                                        Add</button></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 hide crl-group">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-success").click(function () {
            // var html = $(".clone").html();
            // $(".increment").after(html);
            console.log(this);

            // Disini kan?
            var btndelete = `<div class="form-group">
                <small class="muted-text">Masukkan gambar:</small>
                <div class="input-group">
                    <input type="file" name="filename[]" class="form-control" id="">
                    <span class="input-group-btn"><button class="btn btn-danger btn-group-right
                                                " type="button"><i class="fas fa-remove"></i>
                            Remove</button></span>
                </div>
            </div>`

            $('#kagebunshin').append(btndelete);
        });

        $(document).on("click", ".btn-danger", function () {
            // $(this).parent(".crl-group").remove();
            console.log(this);
            $(this).closest('.form-group').remove();
        });

    });

</script>
@endsection

@extends('layouts.app')
@section('style')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endsection
@section('title','Subir Archivos')

@section('content')
<div class="block mx-auto my-6 p-8 bg-white  border border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-2xl text-center pt-24">Subir archivos PDF</h1>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Acciones</th>
            <th scope="col">Titulo</th>
            <th scope="col">Estado</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($theses as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td width="25%">
                        <button type="button" class="py-2 px-2 rounded-md bg-blue-700 hover:bg-blue-800" onclick="showFile('{{ $item->id }}')">Ver</button>
                        <button type="button" class="py-2 px-2 rounded-md bg-green-700 hover:bg-green-800" onclick="modalEdit('{{ $item->id }}','{{ $item->title }}','{{ $item->state }}','{{ $item->thesis_code }}')" data-toggle="modal" data-target="#exampleModalEdit">Editar</button>                        
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->state }}</td>
                </tr>
            @endforeach

        </tbody>
      </table>
      <!-- Modal -->
        <form enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Archivo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                          </div>
                        <div class="form-group form-check">
                            <input type="checkbox" value="1" checked class="form-check-input" id="exampleCheck1" name="state">
                            <label class="form-check-label" for="exampleCheck1">Activo</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-register">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
        <form enctype="multipart/form-data" class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title-edit" name="title">
                            <input type="hidden" id="thesis_id" name="thesis_id">
                            <input type="hidden" id="thesis_code" name="thesis_code">
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="file-edit">Archivo</label>
                            <input type="file" class="form-control-file" id="file-edit" name="file">
                        </div>
                        -->
                        <div class="form-group form-check">
                            <input type="checkbox" value="1" checked class="form-check-input" id="state-edit" name="state">
                            <label class="form-check-label" for="state-edit">Activo</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-update">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
        <form enctype="multipart/form-data" class="modal fade" id="exampleModalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buscar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Codigo</label>
                            <input type="text" class="form-control" id="title-serach" name="title">
                            <input type="hidden" id="thesis_id" name="thesis_id">
                            <input type="hidden" id="thesis_code" name="thesis_code">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-search">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
</div>
@endsection
@section('script')
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function modalEdit(id,tit,est,cod){
            $('#title-edit').val(tit);
            $('#state-edit').val(est);
            $('#thesis_id').val(id);
            $('#thesis_code').val(cod);
        }
    </script>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>

        $("#btn-register" ).click(function() {
            var formData = new FormData(document.getElementById("exampleModal"));
            $.ajax({
                url: "{{ route('thesis_register') }}",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res){
                console.log(res)
            });
        });
        function showFile(id){
            $.ajax({
                url: "{{ asset('/thesis/file/') }}/"+id,
                type: "get",
                dataType: "html",
                contentType: false,
                processData: false
            }).done(function(res){
                url = JSON.parse(res).response.url
                window.open('storage/'+url,'_blank');
            }).fail(function(res){
                console.log(res)
            });
        }
        $( "#btn-update" ).click(function() {
            var formData = new FormData(document.getElementById("exampleModalEdit"));
            $.ajax({
                url: "{{ route('thesis_update') }}",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res){
                console.log(res)
            });
        });
        function deleteThesis(id){
            $.ajax({
                url: "{{ asset('/thesis/delete/') }}/"+id,
                type: "get",
                dataType: "html",
                contentType: false,
                processData: false
            }).done(function(res){
                msg = JSON.parse(res).response.msg
                alert(msg);
                location.reload();
            }).fail(function(res){
                console.log(res)
            });
        }
        $("#btn-buscar" ).click(function() {
            var formData = new FormData(document.getElementById("exampleModalSearch"));
            $.ajax({
                url: "{{ route('doc_search') }}",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){                
                redirect("{{ asset('search_list')}}"+id);
            }).fail(function(res){
                console.log(res)
            });
        });
    </script>    
@endsection   
  
@extends('layouts.app2')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap.min.css') }}">
<style>
.dataTables_filter{
    float: left;
}
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Listado de usuarios
      
    </div>
    <div class="card-body">
    	<div class="row mt-3">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Usuario</th>
                         </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Usuario</th>
                         </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(user, index) in user">
                            <td>@{{ user.id }}</td>
                            <td>@{{ user.first_name }}</td>
                            <td>@{{ user.last_name }}</td>
                            <td>@{{ user.phone }}</td>
                            <td>@{{ user.gender }}</td>
                            <td>@{{ user.email_verified_at }}</td>
                            <td>@{{ user.username }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        </div>
        <div class="card-footer">
        <div class="row text-center">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                La Paz - Bolivia
            </div>
            <div class="col-md-3">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Gestión:</label>
                    </div>
                    <select class="col-md-6 form-control" name="" id="">
                        <option value="2019" selected>2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('js/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('js/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.colVis.min.js') }}"></script>
<script>
const app = new Vue({
        el: '#app',
        data(){
            return{
                user: [],
                 }
        },
        mounted() {
            var today = new Date();
            var yyyy = today.getFullYear();
            this.select = yyyy;
            axios.get('/getusuario/').then(response => {
                this.user = response.data;
                setTimeout(function(){$('#bootstrap-data-table-export').DataTable(
                {
                        "dom": '<"text-left"<f>>rtip',
                    //searching: false,
                    //paging: false,
                    "order": [[ 0, "desc" ]],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar en las columnas:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                }
                );}, 0);
            });
            
        },
        
           
});


</script>
@endsection
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
      REGISTRO
      @{{ $data.secuencia }}
    </div>
    <div class="card-body">
        <div v-if="secuencia" class="row">
            <a class="btn btn-secondary" href="{{ route('registro.create') }}">Nuevo</a>
            <a class="btn btn-info" :href="'/reg/edit/'+secuencia+'/'+select">Editar</a>
            <a type="button" :href="'/print/ejec/reporte/'+secuencia+'/'+select" class="btn btn-danger btn-rounded">Reporte</a> 
           
        </div>
        <div v-else class="row">
            <a class="btn btn-secondary" href="{{ route('registro.create') }}">Nuevo</a>
            <button type="button" class="btn btn-info" disabled>Editar</button> 
            <button type="button" class="btn btn-danger" disabled>Reporte</button> 
            
        </div>
        <div class="row mt-3">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Secuencia</th>
                            <th>Lugar</th>
                            <th>Entidad</th>
                            <th>DA</th>
                            <th>UE</th>
                            <th>F. Elabo</th>
                            <th>Tipo Doc</th>
                            <th>C. Gasto</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Secuencia</th>
                            <th>Lugar</th>
                            <th>Entida</th>
                            <th>DA</th>
                            <th>UE</th>
                            <th>F. Elabo</th>
                            <th>Tipo Doc</th>
                            <th>C. Gasto</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(registro, index) in registros" @click="selectSecuencia(registro.sec)">
                            <td>@{{ registro.sec }}</td>
                            <td>@{{ registro.lugar }}</td>
                            <td>@{{ registro.entidad }}</td>
                            <td>@{{ registro.dir }}</td>
                            <td>@{{ registro.ue }}</td>
                            <td>@{{ registro.f_elabo }}</td>
                            <td>@{{ registro.tip }}</td>
                            <td>@{{ registro.clas_gasto }}</td>
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
                    <select class="col-md-6 form-control" name="" id="" @change="changeyear()" v-model="select">
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
                select: '',
                registros: [],
                secuencia: '',
                gestion: '',
            }
        },
        mounted() {
            var today = new Date();
            var yyyy = today.getFullYear();
            this.select = yyyy;
            this.gestion = yyyy;
            axios.get('/getregistro/'+this.select).then(response => {
                this.registros = response.data;
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
            $('#bootstrap-data-table-export tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('bg-warning') ) {
                    $(this).removeClass('bg-warning');
                }
                else {
                    $('#bootstrap-data-table-export').DataTable().$('tr.bg-warning').removeClass('bg-warning');
                    $(this).addClass('bg-warning');
                }
            } );
        },
        methods: {
            changeyear(){
                $('#bootstrap-data-table-export').DataTable().destroy();
                axios.get('/getregistro/'+this.select).then(response => {
                    //$('#bootstrap-data-table-export').DataTable().fnDestroy();
                    this.registros = response.data;
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
            selectSecuencia(secuencia){
                this.secuencia = secuencia;
            }
        },
});
</script>
@endsection
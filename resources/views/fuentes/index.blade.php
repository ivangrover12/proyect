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
		DIRECCIONES ADMINISTRATIVAS Y UNIDADES EJECUTORAS
        @{{ $data.cod }}
	</div>
	<div class="card-body">
		<div v-if="cod" class="row">
            <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-secondary">Nuevo</a>
            <a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-info" @click.prevent="editar()">Editar</a>
         </div>
        <div v-else class="row">
            <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-secondary">Nuevo</a>
            <button type="button" class="btn btn-info" disabled>Editar</button> 
         </div>
         <div class="row mt-3">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>FF</th>
                            <th>DESCRIPCIÓN</th>
                            <th>FINANCIAMIENTO</th>
                            <th>SIGLA</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>FF</th>
                            <th>DESCRIPCIÓN</th>
                            <th>FINANCIAMIENTO</th>
                            <th>SIGLA</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(docs, index) in docs" @click="selectCod(docs.cod)">
                            <td>@{{ docs.ff }}</td>
                            <td>@{{ docs.descrip }}</td>
                            <td>@{{ docs.financ }}</td>
                            <td>@{{ docs.sigla }}</td>
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit="new_das()">
      <div class="modal-body">
            
          <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Ingrese la descripción</label>
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">FF:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="ff ? '' : 'bg-warning'" v-model="ff" placeholder="Ingrese el Id de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="descrip ? '' : 'bg-warning'" v-model="descrip" placeholder="Ingrese el Detalle">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Financiamientos:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="financ ? '' : 'bg-warning'" v-model="financ" placeholder="Ingrese el Financiamiento">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Sigla:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="sigla ? '' : 'bg-warning'" v-model="sigla" placeholder="Ingrese la Sigla">
                    </div>
                                
            </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">OK</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
       </form>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit="update_das()">
      <div class="modal-body">
            
          <div class="row form-group">
                                        <div class="col-md-12">
                        <label for="">Ingrese la descripción</label>
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">FF:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="ff ? '' : 'bg-warning'" v-model="ff" placeholder="Ingrese el Id de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="descrip ? '' : 'bg-warning'" v-model="descrip" placeholder="Ingrese el Detalle">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Financiamientos:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="financ ? '' : 'bg-warning'" v-model="financ" placeholder="Ingrese el Financiamiento">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Sigla:</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="sigla ? '' : 'bg-warning'" v-model="sigla" placeholder="Ingrese la Sigla">
                    </div>
                                
            </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">OK</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
       </form>
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
                docs: [],
                secuencia: '',
                cod: '',
                ff: '',
                descrip: '',
                financ: '',
                sigla: '',
                
            }
        },
        mounted() {
            var today = new Date();
            var yyyy = today.getFullYear();
            this.select = yyyy;
            axios.get('/getfuentes/'+this.select).then(response => {
                this.docs = response.data;
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
            new_das(){
            const data = {
                ff: this.ff,
                descrip: this.descrip,
                financ: this.financ,
                sigla: this.sigla,
                gestion: this.gestion,
                                
            };
            axios.post('/new_fuente', data).then(response => {
                $('#modal1').modal('hide');
            });
            // var convert = numeroALetras(this.saldo, {
            //     plural: "Bolivianos",
            //     singular: "Boliviano",
            //     centPlural: "Centavos",
            //     centSingular: "Centavo"
            // });
            // this.convert = this.first(convert);
        },
            selectCod(cod){
                    this.cod = cod;
                },
            editar(){
                    axios.get('/geteditfuente/'+this.cod).then(response => {
                    this.dass = response.data;
                    this.ff = this.dass[0].ff;
                    this.descrip = this.dass[0].descrip;
                    this.financ = this.dass[0].financ;
                    this.sigla = this.dass[0].sigla;
                    
                    });
                },
            update_das(){
              const data = {
                ff: this.ff,
                descrip: this.descrip,
                financ: this.financ,
                sigla: this.sigla,
                gestion: this.gestion,
                cod: this.cod

                
            };
            axios.post('/update_fuente', data).then(response => {
                $('#modal2').modal('hide');
            });
            // var convert = numeroALetras(this.saldo, {
            //     plural: "Bolivianos",
            //     singular: "Boliviano",
            //     centPlural: "Centavos",
            //     centSingular: "Centavo"
            // });
            // this.convert = this.first(convert);
        },
            changeyear(){
                $('#bootstrap-data-table-export').DataTable().destroy();
                axios.get('/getfuentes/'+this.select).then(response => {
                    //$('#bootstrap-data-table-export').DataTable().fnDestroy();
                    this.docs = response.data;
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
          
        },
});
</script>
@endsection
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
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dt-responsive">
                    <thead>
                        <tr>
                            <th>DA</th>
                            <th>Detalle DA</th>
                            <th>UE</th>
                            <th>Detalle UE</th>
                         </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>DA</th>
                            <th>Detalle DA</th>
                            <th>UE</th>
                            <th>Detalle UE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(das, index) in das" @click="selectCod(das.cod)">
                            <td>@{{ das.da }}</td>
                            <td>@{{ das.desc_da }}</td>
                            <td>@{{ das.ue }}</td>
                            <td>@{{ das.desc_ue }}</td>
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
                        <label for="">Ingrese los datos de DA y UE:</label>
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="nda ? '' : 'bg-warning'" v-model="nda" placeholder="Ingrese el Id de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="dda ? '' : 'bg-warning'" v-model="dda" placeholder="Ingrese el Detalle de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="nue ? '' : 'bg-warning'" v-model="nue" placeholder="Ingrese el ID de U.E.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="due ? '' : 'bg-warning'" v-model="due" placeholder="Ingrese el Detalle de U.E.">
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
                        <label for="">Ingrese los datos de DA y UE:</label>
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="nda ? '' : 'bg-warning'" v-model="nda" placeholder="Ingrese el Id de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="dda ? '' : 'bg-warning'" v-model="dda" placeholder="Ingrese el Detalle de D.A.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="number" class="form-control" :class="nue ? '' : 'bg-warning'" v-model="nue" placeholder="Ingrese el ID de U.E.">
                    </div>
                    <div class="col-md-2 pt-3" >
                        <label for="">Detalle :</label>
                    </div>
                    <div class="col-md-10 pt-3">
                        <input type="text" class="form-control" :class="due ? '' : 'bg-warning'" v-model="due" placeholder="Ingrese el Detalle de U.E.">
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
                das: [],
                secuencia: '',
                nda: '',
                dda: '',
                nue:'',
                due:'',
                gestion: '',
                lugar: '',
                desc_lug: '',
                entidad: '',
                desc_lug: '',
                cod: '',

            }
        },
        mounted() {
            var today = new Date();
            var yyyy = today.getFullYear();
            this.gestion = yyyy;
            this.select = yyyy;
            axios.get('/getdas/'+this.select).then(response => {
            this.das = response.data;
            // this.lugar = das.lugar;
            // this.desc_lug =das.desc_lug;
            // this.entidad = das.entidad;
            // this.desc_entidad = das.desc_entidad



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
                nda: this.nda,
                dda: this.dda,
                nue: this.nue,
                due: this.due,
                gestion: this.gestion,
                lugar: this.das[0].lugar, 
                desc_lug: this.das[0].desc_lug,
                entidad: this.das[0].entidad,
                desc_entidad: this.das[0].desc_entidad,

                
            };
            axios.post('/new_das', data).then(response => {
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
                    axios.get('/geteditdas/'+this.cod).then(response => {
                    this.dass = response.data;
                    this.nue = this.dass[0].ue;
                    this.due = this.dass[0].desc_ue;
                    this.nda = this.dass[0].da;
                    this.dda = this.dass[0].desc_da;
                    
                    });
                },
            update_das(){
              const data = {
                nda: this.nda,
                dda: this.dda,
                nue: this.nue,
                due: this.due,
                gestion: this.gestion,
                lugar: this.das[0].lugar, 
                desc_lug: this.das[0].desc_lug,
                entidad: this.das[0].entidad,
                desc_entidad: this.das[0].desc_entidad,
                cod: this.cod

                
            };
            axios.post('/update_das', data).then(response => {
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
                axios.get('/getdas/'+this.select).then(response => {
                    //$('#bootstrap-data-table-export').DataTable().fnDestroy();
                    this.das = response.data;
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
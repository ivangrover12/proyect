@extends('layouts.app2')

@section('content')
<div class="card">
    <div class="card-header">
        EJECUCION DE GASTO CORRIENTE - Registro
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Lugar:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" v-model="das.lugar" disabled>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" v-model="das.desc_lug" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="">Fec. Elaboración:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" v-model="fecha">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Entidad:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" v-model="das.entidad" disabled>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="das.desc_entidad" disabled>
                    </div>
                    <div class="col-md-1">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control"  disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Dir. Administrativa:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" v-model="das.da" disabled>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="das.desc_da" disabled>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" 
                        disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Unidad Ejecutora:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" :class="ue ? '' : 'bg-warning'" v-model="ue" @keyup="findUE()">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="das.desc_ue" disabled>
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">MOMENTOS</label>
                    </div>
                    <div class="col-md-10 mt-4">
                    <label for=""> Preventivo </label>
                    <input type="checkbox" value="" /> 
                    <label for="">------Comprometido </label>
                    <input type="checkbox" value="" />
                    <label for="">-----Devengado </label>
                    <input type="checkbox" value=""/>
                    <label for="">-----Regularizacion </label>
     				<input type="checkbox" value=""/>
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">Tipo de Registro</label>
                    </div>
                    <div class="select col-md-3 mt-4">
                         
					  <select @change="reservation()">
			    <option  value="0">Seleccione</option>
				<option  value="1">Ejecucion de Gastos</option>
			    <option  value="2">Transferencia</option>
				<option  value="3">Fondos de Avance</option>
			    <option  value="4">Fondo Rotativo</option>
			    <option   value="5">Otros</option>
					   
					  </select>

                    </div>
                    <div v-if="reserve" class="select col-md-3 mt-4">
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">	BENEFICIARIO </label>
                    </div>
                    <div class="select col-md-10 mt-4">
                     
					  <input type="text" class="form-control">

                    </div>
                    
                </div>
                  <div class="row form-group">
                    <div class="col-md-12 mt-4">
                        <label for="">	DOCUMENTOS DE RESPALDO </label>
                    </div>
                    <div class="col-md-2">
                        <label for="">Tipo de Documento:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-md-1">
                        <label for="">Nº.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control">
                    </div>                
                    <div class="col-md-2 mt-2">
                        <label for="">Fecha de Recepcion:</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-2 mt-2">
                        <button class="btn btn-info btn-block" >Guardar</button>
                    </div>
                    
                </div>

            </div>
            
    </div>
    </div>



    
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Clase de Gasto:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" >
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for=""> Fuente:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" >
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled  disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Organismo:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled  disabled>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled  disabled>
                    </div>
                </div>
                
             </div>
            
            <div class="col-md-4">
                <div class="row form-group">
                    <label for="">Resumen:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="3" ></textarea>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Prog:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for=""> Proy:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Act:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Obj. Gasto:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Ent. trf:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Importe:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-4 mt-2">
                        <button class="btn btn-info btn-block" >Agregar</button>
                    </div>
                    <div class="col-md-4 mt-2">
                        <button class="btn btn-info btn-block" >Reporte</button>
                    </div>
                </div>
                                    
             </div>
             <div class="col-md-4">
                <div class="row form-group">
                    <div class="col-md-2">
                       <label for="">Total:</label>
                    </div>
                    <div class="col-md-10">
                         <input type="text" class="form-control">
                    </div>
                 </div>
                <div class="row form-group">
                    <div class="col-md-12">
                    <label for="">Literal:</label>
                    </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="" id="" rows="8" ></textarea>
                </div>
                 </div>
                
               

                </div>   
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
                    <select class="col-md-6 form-control" name="" id="" v-model="select">
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
<script>
const app = new Vue({
    el: '#app',
    data(){
        return{
            ue: '',
            select: '',
            gestion: '',
            fecha: '',
            das: {},
            desc_ue: '',
            reserve: false,
            }
    },
    mounted(){
        var today = new Date();
        var dd = today.getDate();
            if(dd < 10){
                dd = '0'+dd;
            }
            var mm = today.getMonth()+1;
            if(mm < 10){
                mm = '0'+mm;
            }
        var yyyy = today.getFullYear();
        this.gestion = yyyy;
        this.fecha = yyyy+'-'+mm+'-'+dd;
        this.select = yyyy;
    },
    methods:{
        findUE(){
                if(this.ue != ''){
                    axios.get('/find/findue/'+this.ue+'/'+this.select).then(response => {
                        const temp = response.data;
                        this.desc_ue = temp.desc_ue;
                        this.das = temp;
                    });
                }
            },
        reservation(){
            this.reserve = true;
            
            // var convert = numeroALetras(this.saldo, {
            //     plural: "Bolivianos",
            //     singular: "Boliviano",
            //     centPlural: "Centavos",
            //     centSingular: "Centavo"
            // });
            // this.convert = this.first(convert);
        },

        }
})
</script>
@endsection
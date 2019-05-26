@extends('layouts.app2')

@section('content')
<div class="card">
    <div class="card-header">
        EJECUCION DE GASTO CORRIENTE - Registro
        <!-- @{{ $data }} -->
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
                        <input type="date" class="form-control" v-model="fecha">
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
                        <input type="text" class="form-control"  v-model="secuencia" disabled>
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
                    <input type="checkbox" value="false" v-model="mpre" /> 
                    <label for="">------Comprometido </label>
                    <input type="checkbox" value="false" v-model.bool="mcom"/>
                    <label for="">-----Devengado </label>
                    <input type="checkbox" value="false" v-model.bool="mdev"/>
                    <label for="">-----Regularizacion </label>
     				<input type="checkbox" value="false" v-model.bool="mreg"/>
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">Tipo de Registro</label>
                    </div>
                    <div class="select col-md-3 mt-4">
                         
			  <select @change="reservation()" v-model="registro">
			    <option  value=" ">Seleccione</option>
				<option  id="r1" value="Ejecucion de gastos">Ejecucion de gastos</option>
			    <option  id="r2" value="Transferencia">Transferencia</option>
			    						    
			    <option  id="r3" value="Fondos en avance">Fondos en avance</option>
			    
			    <option  id="r4" value="Fondo Rotativo">Fondo Rotativo</option>
			    <option   id="r5" value="Otros">Otros</option>
					  
					  </select>

                    </div>
                    <div v-if="reserve" class="select col-md-3 mt-4">
                        <input type="text" class="form-control" v-model="detipo">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">	BENEFICIARIO </label>
                    </div>
                    <div class="select col-md-10 mt-4">
                     
					  <input type="text" class="form-control" value=" " v-model="benefi">

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
                        <input type="text" class="form-control" v-model="tip" @keyup="findTip()">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="ddoc" disabled>
                    </div>
                    <div class="col-md-1">
                        <label for="">Nº.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" v-model="nro">
                    </div>                
                    <div class="col-md-2 mt-2">
                        <label for="">Fecha de Recepcion:</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="Date" class="form-control" v-model="f_rece">
                    </div>
                    <div class="col-md-2 mt-2">
                        <button class="btn btn-info btn-block" @click.prevent="saveej_gasto()">Guardar</button>
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
                        <input type="text" class="form-control" v-model="clas_gasto" v-on:keyup="findClas_gasto()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" v-model="dgasto" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for=""> Fuente:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="ff" @keyup="findFuente()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" v-model="dff" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Organismo:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="org" @keyup="findOrg()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" v-model="dorg" disabled>
                    </div>
                </div>
                
             </div>
            
            <div class="col-md-4">
                <div class="row form-group">
                    <label for="">Resumen:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="4" style="font-size:12px; font-type:Arial" v-model="res"></textarea>
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
                        <input type="text" class="form-control" :class="detall.prog ? '' : 'bg-warning'" v-model="detall.prog">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for=""> Proy:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" :class="detall.proy ? '' : 'bg-warning'"v-model="detall.proy">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Act:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control" :class="detall.act ? '' : 'bg-warning'"v-model="detall.act">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Obj. Gasto:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control" :class="detall.obj_gast ? '' : 'bg-warning'" v-model="detall.obj_gast">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Ent. trf:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control" :class="detall.ent_trf ? '' : 'bg-warning'" v-model="detall.ent_trf">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Importe:</label>
                    </div>
                    <div class="col-md-3">
                         <input type="text" class="form-control" :class="detall.importe ? '' : 'bg-warning'" v-model="detall.importe">
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-4 mt-2">
                        <button class="btn btn-info btn-block" @click.prevent="savedetall_ega()">Agregar</button>
                    </div>
                    <div class="col-md-4 mt-2">
                        <!-- <button class="btn btn-info btn-block" >Reporte</button> -->
                        <a type="button" :href="'/print/ejec/reporte/'+secuencia+'/'+select" class="btn btn-info btn-block">Reporte</a> 
                    </div>
                </div>
                                    
             </div>
             <div class="col-md-4">
                <div class="row form-group">
                    <div class="col-md-2">
                       <label for="">Total:</label>
                    </div>
                    <div class="col-md-10">
                         <input type="text" value=" " class="form-control" disabled v-model='total'>
                    </div>
                 </div>
                <div class="row form-group">
                    <div class="col-md-12">
                    <label for="">Literal:</label>
                    </div>
                <div class="col-md-12">
                    <textarea class="form-control" value=" " name="" id="" rows="8" disabled v-model='lite'></textarea>
                </div>
                 </div>
                
               

                </div>   
            </div>
        </div>
    <hr v-if="det">
    <div v-if="det" class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">PROG</th>
                    <th class="text-center">PROY</th>
                    <th class="text-center">ACT</th>
                    <th class="text-center">OBJ. GASTO</th>
                    <th class="text-center">ENT.TRF.</th>
                    <th class="text-center">IMPORTE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="get_detall in detall">
                    
                    <td class="text-center">@{{ get_detall.prog }}</td>
                    <td class="text-center">@{{ get_detall.proy }}</td>
                    <td class="text-center">@{{ get_detall.act }}</td>
                    <td class="text-center">@{{ get_detall.obj_gast }}</td>
                    <td class="text-center">@{{ get_detall.ent_trf }}</td>
                    <td class="text-center">@{{ get_detall.importe }}</td>
                    <td style="display:none;" class="text-center">@{{ get_detall.cod }}</td>
                    <td class="text-center"><button @click.prevent="deletedetall(get_detall)">Borrar</button></td>
                </tr>
            </tbody>
        </table>
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
            secuencia: '',
            reserve: false,
            detall: [],
            det: true,
            nro: '',
            tipo: '',
            detipo: '',
            benefi: '',
            tip: '',
            ddoc: '',
            f_rece: '',
            clas_gasto: '',
            ff: '',
            org: '',
            dgasto: '',
            dff: '',
            dorg: '',
            res: '',
            TRUE: true,
             mpre: false,
            mcom: false,
            mdev: false,
            mreg: false,
            secu: '',
            cod_prev: '',
            registro: '',
            total: '',
            lite: '',

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
        this.gestion = {{$gestion}};
        this.fecha = yyyy+'-'+mm+'-'+dd;
        this.select = {{$gestion}};
				           axios.get('/find/findej_gasto/'+{{$secuencia}}+'/'+{{$gestion}}).then(res => 
				           {
				                    const temp = res.data;
				                    this.nro = temp.nro;
				                    this.registro = temp.tipo;
				                    this.detipo = temp.detipo;
				                    this.benefi = temp.benefi;
				                    this.tip = temp.tip;
				                    this.f_rece = temp.f_rece;
				                    this.clas_gasto = temp.clas_gasto;
				                    this.ff = temp.ff;
				                    this.org = temp.org;
				                    this.res = temp.resumen;
				                    this.mpre = temp.mpre;
				                    this.mcom = temp.mcom;
				                    this.mdev = temp.mdev;
				                    this.mreg = temp.mreg;
                                    this.secu = temp.secu;
                                    axios.get('/find/finddetall_ega/'+this.secu).then(respon =>
                                    {
                                    
                                    if(respon.data){
                                            this.detall = respon.data[0];
                                            this.total = respon.data[1];
                                            var convert = numeroALetras(this.total, {
                                                plural: "Bolivianos",
                                                singular: "Boliviano",
                                                centPlural: "Centavos",
                                                centSingular: "Centavo"
                                            });
                                            this.convert = this.first(convert);
                                            console.log(this.convert);
                                            this.lite = this.convert;

                                        }
                                        else{
                                            this.det = false;
                                        }
                                        // this.prog = temp.prog;
                                        // this.proy = temp.proy;
                                        // this.act = temp.act;
                                        // this.obj_gast = temp.obj_gast;
                                        // this.ent_trf = temp.ent_trf;
                                        // this.importe = temp.importe;
                                    });

				                    if(this.registro){
				                    	this.reserve = true;
				                    }

				                    for (var i = 1; i <= 5; i++) {
				                    	// if($('#r'+i).text()==this.tipo){
				                    	//    $('#r'+i).attr('selected', true)
				                    	// console.log('okey')
				                    	// console.log(this.tipo)
				                    	// }
				                    	($('#r'+i).text()==this.registro)?$('#r'+i).attr('selected', true):''
				                    }
				            });
          axios.get('/getregistroedit/'+{{$secuencia}}+'/'+this.select).then(response => 
          {
                    this.certificados = response.data;
                    this.secuencia = {{$secuencia}};
                    // -+++++
                    this.ue = this.certificados[0].ue;
                    this.das.entidad = this.certificados[0].entidad;
                    this.obs = this.certificados[0].obs;
                    this.gast = this.certificados[0].tipo;
                    this.prog = this.certificados[0].prog;
                    this.act = this.certificados[0].act;
                    this.proy = this.certificados[0].proy;


		                axios.get('/find/findue/'+this.ue+'/'+this.select).then(res => 
			                {
			                    const temp = res.data;
			                    this.desc_ue = temp.desc_ue;
			                    this.das = temp;
			                });
		               
                
		                axios.get('/find/finddoc/'+this.select+'/'+this.tip).then(respo => 
			                {
			                    const doc = respo.data;
			                    this.ddoc = doc.descrip;
			                    // console.log(respo.data)
			                });
		        axios.get('/find/findtipogasto/'+this.select+'/'+this.clas_gasto).then(resp => {
                    const temp = resp.data;
                    this.dgasto = temp.nom;
                    // console.log(resp.data)
                });
		        axios.get('/find/findfuente/'+this.select+'/'+this.ff).then(res => {
                    const temp = res.data;
                    this.dff = temp.descrip;
                    // console.log(respo.data)
                });
		         axios.get('/find/findorg/'+this.select+'/'+this.org).then(re => {
                    const temp = re.data;
                    this.dorg = temp.descr_org;
                    // console.log(respo.data)
                });


             });
    },
    methods:{
            saveej_gasto(){
                
            if(this.ue && this.desc_ue && this.secuencia && this.nro && this.benefi && this.tip && this.clas_gasto && this.ff && this.org && this.registro && this.detipo && this.fecha){
            const data = {
                secuencia: this.secuencia,
                lugar: this.das.lugar,
                registro: this.registro,
                detipo: this.detipo,
                entidad: this.das.entidad,
                dir: this.das.da,
                ue: this.das.ue,
                f_elabo: this.fecha,
                mpre: this.mpre,
                mcom: this.mcom,
                mdev: this.mdev,
                mreg: this.mreg,
                tip: this.tip,
                f_rece: this.f_rece,
                nro: this.nro,
                clas_gasto: this.clas_gasto, 
                ff: this.ff,
                org: this.org,
                resumen: this.res,
                total: this.total,
                lite: this.lite,
                benefi: this.benefi,
                gestion: this.gestion,
                
            };

            axios.post('/ej_gasto/update', data).then(response => {
                console.log(response.data);
                toastr.success('Registro Guardado', 'Operación exitosa');
                if(response.data[0]){
                    this.det = true;
                    this.detall = response.data[0];
                    console.log(this.detall)
                }
                else{
                    this.det = false;
                    console.log('else')
                }
            });
            }
            else{
                toastr.error('Complete los campos en amarillo', '¡Error!')
            }
            
        },
        first(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        savedetall_ega(){
                this.det = true;
            if(this.detall.prog && this.detall.proy && this.detall.act && this.detall.obj_gast && this.detall.ent_trf && this.detall.importe){
            const data = {
                cod_prev: this.secu,
                prog: this.detall.prog,
                proy: this.detall.proy,
                act: this.detall.act,
                obj_gast: this.detall.obj_gast,
                ent_trf: this.detall.ent_trf,
                importe: this.detall.importe,
                gestion: this.gestion,
                
            };
            axios.post('/detall/create', data).then(response => {
                  if(response.data[0]){
                    this.det = true;
                    this.detall = response.data[0];
                    
                }
                else{
                    this.det = false;
                }
            });
            }
            else{
                toastr.error('Complete los campos en amarillo', '¡Error!')
            }
            
        },
        deletedetall(get_detall){
            axios.delete('/det/delete/'+get_detall.cod).then(response => {
                if(response.data){
                    this.detall = response.data;
                }
                else{
                    this.det = false;
                }
                
                });
            },
	        findUE(){
	            if(this.ue != ''){
	                axios.get('/find/findue/'+this.ue+'/'+this.select).then(response => {
	                        const temp = response.data;
	                        this.desc_ue = temp.desc_ue;
	                        this.das = temp;
	                    });
	                }
	            },
            findClas_gasto(){
            	
                if(this.clas_gasto != ''){
                   axios.get('/find/findtipogasto/'+this.select+'/'+this.clas_gasto).then(resp => {
                    const temp = resp.data;
                    this.dgasto = temp.nom;
                    // console.log(resp.data)
                });
                }
            },
            findFuente(){
                if(this.ff != ''){
                   axios.get('/find/findfuente/'+this.select+'/'+this.ff).then(res => {
                    const temp = res.data;
                    this.dff = temp.descrip;
                    // console.log(respo.data)
                });
                }
            },
            findOrg(){
                if(this.org != ''){
                   axios.get('/find/findorg/'+this.select+'/'+this.org).then(re => {
                    const temp = re.data;
                    this.dorg = temp.descr_org;
                    // console.log(respo.data)
                });
                }
            },
	        findTip(){

	                if(this.tip != ''){
	                   axios.get('/find/finddoc/'+this.select+'/'+this.tip).then(respo => {
	                    const doc = respo.data;
	                    this.ddoc = doc.descrip;
	                    
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
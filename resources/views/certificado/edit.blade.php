@extends('layouts.app2')

@section('content')
<div class="card">
    <div class="card-header">
        CERTIFICACION PRESUPUESTARIA
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Fecha:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" v-model="fecha">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Saldo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step="0.01" v-model="saldoN" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Literal:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="" id="" rows="3" disabled v-model="convert"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Gestión:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="gestion" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="secuencia" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                    <div class="col-md-8 pt-3">
                        <button v-if="!secuencia" class="btn btn-info btn-block" @click.prevent="reservation()">Reservar</button>
                        <button v-else class="btn btn-info btn-block" @click.prevent="reservation()" disabled>Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr v-if="reserve">
    <div v-if="reserve" class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Entidad:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.entidad">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_entidad">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.da">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_da">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" :class="ue ? '' : 'bg-warning'" v-model="ue" @keyup="findUE()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="desc_ue">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Tipo Gasto:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" :class="gast ? '' : 'bg-warning'" v-model="gast" @keyup="findGast()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="tipo_gasto">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Prog.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" :class="prog ? '' : 'bg-warning'" v-model="prog">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Act.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" :class="act ? '' : 'bg-warning'" v-model="act">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">SISIN:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <label for="">Observaciones:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="3" v-model="obs"></textarea>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Proy.:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" :class="proy ? '' : 'bg-warning'" v-model="proy" @keyup="findDetail()">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="nombre">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Activo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="cod">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block" @click.prevent="update()">Modificar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" @click.prevent="newcert()">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr v-if="reserve">
    <div v-if="reserve" class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Entidad</th>
                    <th class="text-center">D.A.</th>
                    <th class="text-center">U.E.</th>
                    <th class="text-center">Tipo Gasto</th>
                    <th class="text-center">Prog</th>
                    <th class="text-center">Proy</th>
                    <th class="text-center">Act.</th>
                    <th class="text-center">Sisin</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th class="text-center">Entidad</th>
                    <th class="text-center">D.A.</th>
                    <th class="text-center">U.E.</th>
                    <th class="text-center">Tipo Gasto</th>
                    <th class="text-center">Prog</th>
                    <th class="text-center">Proy</th>
                    <th class="text-center">Act.</th>
                    <th class="text-center">Sisin</th>
                    <th class="text-center"></th>
                </tr>
            </tfoot>
            <tbody>
                <tr v-for="(certificate, index) in certificados">
                    <td class="text-center"><button @click.prevent="seleccionar(certificate)">@{{ certificate.cod }}</button></td>
                    <td class="text-center">@{{ certificate.entidad }}</td>
                    <td class="text-center">@{{ certificate.da }}</td>
                    <td class="text-center">@{{ certificate.ue }}</td>
                    <td class="text-center">@{{ certificate.tipo }}</td>
                    <td class="text-center">@{{ certificate.prog }}</td>
                    <td class="text-center">@{{ certificate.proy }}</td>
                    <td class="text-center">@{{ certificate.act }}</td>
                    <td class="text-center">@{{ certificate.sisin }}</td>
                    <td class="text-center"><button @click.prevent="deleteCert(certificate)">Borrar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr v-if="step">
    <div v-if="step" class="card-body">
        <div class="row">
            <div class="row col-md-8">
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">FF</label><br>
                        <input type="text" class="form-control" v-model="certificado2.ff">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">ORG</label><br>
                        <input type="text" class="form-control" v-model="certificado2.org">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">PART</label><br>
                        <input type="text" class="form-control" v-model="certificado2.part">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">PT. LEY</label><br>
                        <input type="text" class="form-control" v-model="certificado2.ppto_ley">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">PT. MOD</label><br>
                        <input type="text" class="form-control" v-model="certificado2.ppto_mod">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-center">
                        <label for="">EJEC</label><br>
                        <input type="text" class="form-control" v-model="certificado2.eje_com">
                    </div>
                </div>
            </div>
            <div class="row col-md-4">
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="">RESERV</label><br>
                        <input type="text" class="form-control" v-model="certificado2.reserva">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <button class="btn btn-info btn-sm" @click.prevent="savecert2()">Guardar</button>
                        <a type="button" :href="'/print/cert/reporte1/'+secuencia+'/'+select" class="btn btn-danger btn-rounded">Reporte 1</a> 
                        <a type="button" :href="'/print/cert/reporte2/'+secuencia+'/'+select" class="btn btn-danger btn-rounded">Reporte 2</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr v-if="cert2">
    <div v-if="cert2" class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">COD</th>
                    <th class="text-center">FF</th>
                    <th class="text-center">ORG</th>
                    <th class="text-center">PART</th>
                    <th class="text-center">PPTO LEY</th>
                    <th class="text-center">PPTO MOD</th>
                    <th class="text-center">EJE COM</th>
                    <th class="text-center">RESERVA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr v-for="(certificate.cod, index) in certificados"> -->
                <tr v-for="get_cert in cer2">
                    <td class="text-center">@{{ get_cert.cod_cert }}</td>
                    <td class="text-center">@{{ get_cert.ff }}</td>
                    <td class="text-center">@{{ get_cert.org }}</td>
                    <td class="text-center">@{{ get_cert.part }}</td>
                    <td class="text-center">@{{ get_cert.ppto_ley }}</td>
                    <td class="text-center">@{{ get_cert.ppto_mod }}</td>
                    <td class="text-center">@{{ get_cert.eje_com }}</td>
                    <td class="text-center">@{{ get_cert.reserva }}</td>
                    <td class="text-center"><button @click.prevent="deletecert2(get_cert)">Borrar</button></td>
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
            select: '',
            reserve: true,
            step: true,
            cert2: true,
            certificado: {},
            certificados: [],
            certificados2: [],
            convert: '',
            gestion: '',
            fecha: '',
            saldo: '',
            secuencia: '',
            das: {},
            ue: '',
            desc_ue: '',
            gast: '',
            tipo_gasto: '',
            proy: '',
            prog: '',
            act: '',
            nombre: '',
            cod: '',
            obs: '',
            certificado2: {},
            cer2: [],
            saldoN: ''
        }
    },
    mounted() {
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
        axios.get('/getedit/'+{{$secuencia}}+'/'+{{$gestion}}).then(response => {
                    this.certificados = response.data;
                    //console.log(this.certificados);
                    this.secuencia = {{$secuencia}};
                    this.fecha = this.certificados[0].gestion;
                    this.ue = this.certificados[0].ue;
                    this.das.entidad = this.certificados[0].entidad;
                    this.obs = this.certificados[0].obs;
                    this.gast = this.certificados[0].tipo;
                    this.prog = this.certificados[0].prog;
                    this.act = this.certificados[0].act;
                    this.proy = this.certificados[0].proy;


                 axios.get('/find/findue/'+this.ue+'/'+this.select).then(res => {
                    const temp = res.data;
                    this.desc_ue = temp.desc_ue;
                    this.das = temp;
                });
                 axios.get('/find/findgast/'+this.gast).then(response => {
                    this.tipo_gasto = response.data;
                });
                
            for(var i = 0; i < this.certificados.length; i++){
                 
                
                axios.get('/cert2/'+this.certificados[i].cod).then(response => {
                    //console.log(response.data[0])
                    if(response.data[0]){
                    
                    this.cer2 = this.cer2.concat(response.data[0]);
                    this.saldo = response.data[1];
                    this.saldoN = eval(this.saldo+this.saldoN);
                    
                    }
                    else{
                        this.cer2 = [];
                    }
                    console.log(this.saldoN)
                    var convert = numeroALetras(this.saldoN, {
                        plural: "Bolivianos",
                        singular: "Boliviano",
                        centPlural: "Centavos",
                        centSingular: "Centavo"
                        });
                    this.convert = this.first(convert);
                    
                }); 
                 
             }            
            });

    },
    methods:{
     
        reservation(){
            this.reserve = true;
            const data = {
                gestion: this.gestion,
                fecha: this.fecha
            };
            axios.post('/certificado', data).then(response => {
                this.secuencia = response.data[0];
                this.certificados = response.data[1];
            });
            // var convert = numeroALetras(this.saldo, {
            //     plural: "Bolivianos",
            //     singular: "Boliviano",
            //     centPlural: "Centavos",
            //     centSingular: "Centavo"
            // });
            // this.convert = this.first(convert);
        },
        newcert(){
            const data = {
                gestion: this.gestion,
                fecha: this.fecha,
                secuencia: this.secuencia
            };
            axios.post('/new', data).then(response => {
                this.step = true;
                this.secuencia = response.data[0];
                this.certificados = response.data[1];
            });
        },
        first(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        addCertificate(){
            this.certificado.cod = this.cod;
            this.certificado.entidad = this.das.entidad;
            this.certificado.da = this.das.da;
            this.certificado.ue = this.ue;
            this.certificado.gast = this.gast;
            this.certificado.prog = this.prog;
            this.certificado.proy = this.proy;
            this.certificado.act = this.act;
            this.certificado.sisin = '';
            this.certificados.push(this.certificado);
            this.certificado = {};
            this.cod = this.cod + 1;
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
        findGast(){
            if(this.gast != ''){
                axios.get('/find/findgast/'+this.gast).then(response => {
                    this.tipo_gasto = response.data;
                });
            }
        },
        findDetail(){
            if(this.das.da && this.ue && this.prog && this.act && this.proy){
                axios.get('/findnombre/'+this.das.da+'/'+this.ue+'/'+this.prog+'/'+this.act+'/'+this.proy).then(response => {
                    this.nombre = response.data;
                })
            }
        },
        update(){
            this.step = true;
            if(this.ue && this.gast && this.proy && this.act && this.prog){
                if(this.cod){
                    const data = new FormData();
                    data.append('_method', 'PATCH');
                    data.append('ue', this.ue);
                    data.append('gast', this.gast);
                    data.append('proy', this.proy);
                    data.append('prog', this.prog);
                    data.append('act', this.act);
                    data.append('cod', this.cod);
                    data.append('da', this.das.da);
                    data.append('obs', this.obs);
                    axios.post('/certificado/'+this.cod, data).then(response => {
                        this.certificados = response.data;
                        toastr.success('Certificado Guardado', 'Operación exitosa','Recargue la Pagina');
                    });
                }
                else{
                    toastr.warning('¡Error!', 'Seleccione la partida que desea modificar')
                }
            }
            else{
                toastr.error('Complete los campos en amarillo', '¡Error!')
            }
        },
        seleccionar(certificado){
            this.cod = certificado.cod;
            axios.get('/cert2/'+certificado.cod).then(response => {
                //console.log(response.data);
                if(response.data[0]){
                    this.cert2 = true;
                    
                    this.certificados2 = response.data[0];
                    this.saldo = response.data[1];
                    var convert = numeroALetras(this.saldo, {
                        plural: "Bolivianos",
                        singular: "Boliviano",
                        centPlural: "Centavos",
                        centSingular: "Centavo"
                    });
                    this.convert = this.first(convert);
                }
                else{
                    this.cert2 = false;
                    this.certificados2 = [];
                }
            });
        },
        deleteCert(certificado){
            axios.delete('/certificado/'+certificado.cod).then(response => {
                this.certificados = response.data;
                toastr.success('Eliminado', 'Operación exitosa');
            });
        },
        deletecert2(get_cert){
            axios.delete('/cert2/delete/'+get_cert.cod).then(response => {
                if(response.data){
                    this.certificados2 = response.data;
                    this.cer2 = this.certificados2;
                }
                else{
                    this.cert2 = false;
                }
                toastr.success('Eliminado', 'Operación exitosa');
            });
        },
        savecert2(){
            if(this.certificado2.ff && this.certificado2.org && this.certificado2.part && this.certificado2.ppto_ley && this.certificado2.ppto_mod){
            if(this.cod){
            const data = {
                cod_cert: this.cod,
                da: this.das.da,
                ue: this.ue,
                prog: this.prog,
                proy: this.proy,
                act: this.act,
                ff: this.certificado2.ff,
                org: this.certificado2.org,
                part: this.certificado2.part,
                gestion: this.gestion,
                ppto_ley: this.certificado2.ppto_ley,
                ppto_mod: this.certificado2.ppto_mod,
                eje_com: this.certificado2.eje_com,
                reserva: this.certificado2.reserva
            };
            axios.post('/cert2/create', data).then(response => {
                if(response.data[0]){
                    this.cert2 = true;
                    this.certificados2 = response.data[0];
                    this.saldo = response.data[1];
                    var convert = numeroALetras(this.saldo, {
                        plural: "Bolivianos",
                        singular: "Boliviano",
                        centPlural: "Centavos",
                        centSingular: "Centavo"
                    });
                    this.convert = this.first(convert);

                   }
                else{
                    this.cert2 = false;
                }

                toastr.success('Guardado', 'Operación exitosa','Recargue la pagina');
                
            });
        }
        else
        {
            toastr.warning('¡Error!', 'Seleccione la partida que desea modificar')
        }}
        else{
            toastr.error('Complete todos los campos', '¡Error!')
        }
    },
  
        
},
   
    
})
</script>
@endsection
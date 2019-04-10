@extends('layouts.app')

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
                        <input type="text" class="form-control" v-model="lugar1">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" v-model="lugar2">
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
                        <input type="text" class="form-control" v-model="numentidad">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="entidad">
                    </div>
                    <div class="col-md-1">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" v-model="secuencia">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Dir. Administrativa:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" v-model="numdir">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="dir">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" v-model="admi">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label for="">Unidad Ejecutora:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" v-model="numunid">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="unidad">
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
                     
					  <select>
			    <option value="0">Seleccione</option>
				<option value="1">Ejecucion de Gastos</option>
			    <option value="2">Transferencia</option>
				<option value="3">Fondos de Avance</option>
			    <option value="4">Fondo Rotativo</option>
			    <option value="5">Otros</option>
					   
					  </select>

                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2 mt-4">
                        <label for="">	BENEFICIARIO </label>
                    </div>
                    <div class="select col-md-10 mt-4">
                     
					  <input type="text" class="form-control" v-model="beneficiario">

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
                        <input type="text" class="form-control" v-model="tipdocument">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" v-model="tipodedocuemnto">
                    </div>
                    <div class="col-md-1">
                        <label for="">Nº.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" v-model="numero">
                    </div>                
                    <div class="col-md-2 mt-2">
                        <label for="">Fecha de Recepcion:</label>
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" class="form-control" v-model="tipdocument">
                    </div>
                    <div class="col-md-4 mt-2">
                        <button class="btn btn-info btn-block" >Guardar</button>
                    </div>
                    
                </div>

            </div>
            
    </div>
    </div>



    <hr v-if="reserve">
    <div v-if="reserve" class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Clase de Gasto:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="clas.Gasto">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="clasgasto">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for=""> Fuente:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="fuente">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="desfuente">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Organismo:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" :class="ue ? '' : 'bg-warning'" v-model="ue" @keyup="findUE()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="desOrganis">
                    </div>
                </div>
                
             </div>
            
            <div class="col-md-4">
                <div class="row form-group">
                    <label for="">Resumen:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="3" v-model="resumen"></textarea>
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
                        <button class="btn btn-danger btn-sm">Reporte 1</button>
                        <button class="btn btn-danger btn-sm">Reporte 2</button>
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
                <tr>
                    <td class="text-center">@{{ get_cert.cod_cert }}</td>
                    <td class="text-center">@{{ get_cert.ff }}</td>
                    <td class="text-center">@{{ get_cert.org }}</td>
                    <td class="text-center">@{{ get_cert.part }}</td>
                    <td class="text-center">@{{ get_cert.ppto_ley }}</td>
                    <td class="text-center">@{{ get_cert.ppto_mod }}</td>
                    <td class="text-center">@{{ get_cert.eje_com }}</td>
                    <td class="text-center">@{{ get_cert.reserva }}</td>
                    <td class="text-center"><button @click.prevent="deletecert2()">Borrar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')

@endsection
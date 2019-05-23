<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
   body{
    font-family: "Times New Roman";       
}
.contenedor{
    width: 100%;       
}
.texto-centro{
    text-align: center;
}
.texto-derecha{
    text-align: right;
}
#tabla-superior {
    border-width: 1px;
    border-style: solid;    
}
.fila td{
    padding: 10px 10px 10px 10px;
}

.letra-mediana{
    font-size: 10px;
}

.letra-chica{
    font-size: 9px;
}
.letra-muy-chica{
    font-size: 7px; 
}
#tabla-superior{
    margin: 0px 0px 5px 0px;
}
.contenedor > tr td{
    border: collapse;
    border-width: 1px;
    border-style: solid;
        padding: 5px;
}
.subtitulo{
    font-weight: bold;
    font-size: 10px;
    padding: 3px 0px 3px 10px;
}
.in1{
    width: 20px;
}
.in2{
    width: 350px;
}
.in3{
    width: 60px;
}
.in4{
    width: 100px;
}

.in5, .in6, .in7{
    width: 30px;
}
.in8{
    width: 260px;
}
.in9{
    width: 80px;
}
.in11{
    width: 250px;
}
.in10{
    width: 30px;
}
.partidas-desc{
    font-size: 7px;
}
.totales-completos{
    font-size: 13px;
}
.negrita{
    font-weight: bold;
    font-size: 10px;
}
.negrito{
    font-weight: bold;
    font-size: 13px;
}
.letra-grande{
    font-size: 11px;    
}
.inp1{
    width: 45px;
}
.inp2{
    width: 120px;
}
.abajo{
    padding: 40px 0px 0px 0px
}
#documento1{
    width: 50px;
} 
#documento2{
    width: 200px;
}
.tgr{
    width: 300px;
}
.todoizq{
    text-align: right;          
}
#tipo1{
    width: 200px;
}
#tipo2{
    width: 300px;
}
pre{
    font-family: "Times New Roman";  
    font-size: 8px;
}
    </style>
</head>
<body>
    <table class='contenedor' id='tabla-superior'>
                    <tr id='fila'>
                    <td align='center' width='240px'><span style='font-size: 10px'>MINISTERIO DE DESARROLLO RURAL Y TIERRAS<span><br /><img src="{{public_path() .'/'. 'imagenes/logo-sipmdryt.png'}}" width='250' height='80px' /></td>
                        <td align='center'><h1>REGISTRO DE LA EJECUCI&Oacute;N DE GASTO</h1><br /></td>
                        <td align='center' width='120px'><span style='font-size: 13px'>{{ $fhs }} <br /><br />Gestion: {{ $ys }}<br /><br /> Pagina 1 de 1<br /><br />R_EGA_C_31</span></td>	
                    </tr>                   
                </table>
    
                <table class='contenedor' border='1'>
                    <tr>
                        <td>
                            <table class='letra-mediana' >
                                <tr>
                                    <td width='80px'>Lugar:</td>
                                    <td width='30px'><input class='in1' type='text' value='LAP'/></td>
                                    <td width='370px'><input class='in2' type='text' value='LA PAZ'  /></td>
                                    <td width='60px' class='letra-muy-chica'></td>
                                    <td width='20px' ></td>   
                                    <td width='85px' >Fecha de Emision:</td>                                             
                                    <td width='80px' ><input class= 'in3' type='text' value='{{ $cert->f_elabo }}'  /></td>
                                                        
                                </tr>
                                <tr>
                                    <td>Entidad:</td>
                                    <?php $entidad=str_pad($cert->entidad, 2, "0", STR_PAD_LEFT);?>
                                    <td><input class='in1' type='text' value='{{ $entidad }}'  /></td>
                                    <td><input class='in2' type='text' value='MINISTERIO DE DESARROLLO RURAL Y TIERRAS'  /></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                       
                                </tr>
                                <tr>
                                    <td>Dir. Administrativa:</td>
                                    <?php $dir=str_pad($cert->dir, 2, "0", STR_PAD_LEFT);?>
                                    <td><input class='in1' type='text' value='{{$dir}}'  /></td>
                                    <td><input class='in2' type='text' value='{{$das->desc_da}}'  /></td>
                                    <td></td>
                                    <td></td>
                                    <td>Preventivo:</td>
                                    <td><input class='in4' type='text' value='00000' /></td>                       
                                </tr>
                                <tr>
                                    <td>Unidad Ejecutora:</td>
                                    <?php $ue=str_pad($cert->ue, 2, "0", STR_PAD_LEFT);?>
                                    <td><input class='in1' type='text' value='{{$ue}}'  /></td>
                                    <td><input class='in2' type='text' value='{{$das->desc_ue}}'  /></td>
                                    <td></td>
                                    <td></td>
                                    <td>Secuencia:</td>
                                    <?php $sec=str_pad($cert->sec, 5, "0", STR_PAD_LEFT);?>
                                    <td><input type='text' value='{{$sec}}' /></td>                        
                                </tr>                       
                            </table>
                        </td>
                    </tr>
                                        <tr>
                                            <td style='padding: 10px 10px 10px 10px'>
                                                <span class='negrita'>MOMENTOS:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size: 13px' colspan='7'>Preventivo &nbsp;&nbsp;&nbsp;<input type='checkbox' ".$preven."/></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size: 13px' colspan='7'>Comprometido&nbsp;&nbsp;&nbsp;<input type='checkbox' ".$com." /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size: 13px' colspan='7'>Devengado&nbsp;&nbsp;&nbsp;<input type='checkbox' ".$deven." /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size: 13px' colspan='7'>Regularizado&nbsp;&nbsp;&nbsp;<input type='checkbox' ".$reg."/><br />
                                                <span class='negrita'>TIPO DE REGISTRO:</span> <input id='tipo1' type='text' value='{{ $cert->tipo }}' />&nbsp;&nbsp;&nbsp;&nbsp;<input id='tipo2' type='text' value='{{ $cert->detipo }}' /></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 5px 5px 5px 5px'>
                                                <span style='font-size: 12px'class='negrita' >BENEFICIARIO</span><br />
                                                <span style='font-size: 13px' type="text">{{ $cert->benefi }}</span>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 5px 5px 5px 5px'>
                                                <span style='font-size: 13px' class='negrita'>DOCUMENTOS DE RESPALDO</span> <br />
                                                <table width='720px' class='letra-mediana' >
                                                    <tr>
                                                        <td width='500px'>Tipo de Documento: <input style='font-size: 10px'type='text' value='{{ $cert->tip }}' />&nbsp;&nbsp;&nbsp;<input type='text' value='{{ $doc->descrip }}' /></td>
                                                        <td>Nro.: <input style='font-size: 10px'type='text' value='{{$cert->nro}}' /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fecha de Recepci&oacute;n: <input style='font-size: 10px'type='text' value='{{$cert->f_rece}}' /></td>
                                                        <td></td>
                                                    </tr>
                                                 
                                                </table>
                                            </td>
                                            <tr>
                                            
                                                <td style='padding: 5px 5px 5px 5px'>
                                                    <span style='font-size: 11px'class='negrita' >Clase de Gasto:</span> <input style='font-size: 10px'  type='text' value='{{$cert->clas_gasto}}' />&nbsp;&nbsp;&nbsp;<input style='font-size: 10px' class='tgr' type='text' value='{{$clas->nom}}' />                                                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 5px 5px 5px 5px'>
                                                    <table>
                                                        <tr>
                                                            <td class='negrita'>Fuente: </td>
                                                            <td><input style='font-size: 10px' type='text' value='{{ $cert->ff }}' /> <input style='font-size: 10px'class='tgr' type='text' value='{{ $ff->descrip }}' /></td>
                                                        </tr>
                                                        <tr>
                                                            <td class='negrita'>Organismo: </td>
                                                            <td><input style='font-size: 10px'class='tpe' type='text' value='{{ $cert->org }}' /> <input style='font-size: 10px' class='tgr' type='text' value='{{ $org->descr_org}}' /></td>
                                                        </tr>
                                                    </table>
                                                </td>                                                
                                            </tr>
                                           
                                            <tr>
                                                <td>
                                                    <table border='1' class='letra-mediana' style='border-collapse:collapse' width='100%'> 
                                                        <tr>
                                                            <td colspan='5' align='center' class='negrita'>IMPUTACI&Oacute;N</td>
                                                            <td rowspan='2' align='center' class='negrita' width='300px'>Descripci&oacute;n</td>
                                                            <td rowspan='2' align='center' class='negrita'>Importe</td>                                                               
                                                        </tr>
                                                        <tr>
                                                            <td width='60px' align='center' class='negrita'>Prog</td>   
                                                            <td width='60px' align='center' class='negrita'>Proy</td>
                                                            <td width='60px' align='center' class='negrita'>Act</td>
                                                            <td width='60px' align='center' class='negrita'>Obj. Gasto</td>
                                                             <td width='80px' align='center' class='negrita'>Ent. Trf.</td>
                                                        </tr>
                                                        <?php	
                                                        $totales= array();
                                                        $totales['importe']=0;
                                                        	
                                            foreach( $ega  as $partida )	
                                            {
                                                $par = App\Partidas::where('gestion',$partida->gestion)->where('objgast',$partida->obj_gast)->first();
                                            ?>
                                                 <tr>
                                                    <td align='center'>{{$partida->prog}}</td>
                                                    <?php $proy=str_pad($partida->proy, 4, "0", STR_PAD_LEFT);?>
                                                    <td align='center'>{{$proy}}</td>
                                                    <?php $act=str_pad($partida->act, 3, "0", STR_PAD_LEFT);?>
                                                    <td align='center'>{{$act}}</td>
                                                    <?php $obj_gast=str_pad($partida->obj_gast, 3, "0", STR_PAD_LEFT);?>
                                                    <td align='center'>{{$obj_gast}}</td>
                                                    <td align='center'>{{$partida->ent_trf}}</td>
                                                    <td style='padding: 6px 6px 6px 10px'>{{$par->descrip}}</td>
                                                    <td align='right' style='padding: 0px 10px 0px 0px' width='90px'>{{number_format($importe=$partida->importe,2)}}</td>
                                                </tr>
                                                <?php       
                                                    
                                                    $totales['importe']+=$importe;
                                                   
                                                }
                                                ?>
                                                <tr >
                                                <td style='padding: 5px 5px 5px 5px' colspan='6'width='690px' class='totales-completos'><span class='negrito'>Son:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ NumerosEnLetras::convertir($totales['importe'],'Bolivianos',false,'Centavos') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='negrito'>Total Autorizado:</span></td>
                                                    <td align='right' style='padding: 10px'>{{number_format($totales['importe'],2)}}</td>
                                                </tr>
                                            </table>
                                    </td>
                            </tr>
                            <tr>
                                <td style='padding: 5px 5px 5px 5px'>
                                    <span class='negrito'>Resumen de Operaci&oacute;n:</span> <br />
                                    <span style='font-size: 12px'>{{ $cert->resumen}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width='100%' >
                                        <tr>
                                            <td width='50px'>&nbsp;</td>
                                            <td width='50px' style='font-size: 13px'>Moneda</td>
                                            <td width='40px'><input style='font-size: 10px' class='inp1' type='text' value='69' /></td>
                                            <td width='80px'><input style='font-size: 10px' class='inp2' type='text' value='BOLIVIANOS' /></td>
                                            <td width='380px'>&nbsp;</td>
                                            <td width='160px'style='font-size: 13px'>Aprobado en Fecha: </td>
                                            <td><input type='text' style='font-size: 10px' value='{{ $cert->f_elabo }}'></td>
                                            <td width='50px'>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height='120px'>
                                    <table width='100%'>
                                        <tr>
                                            <td style='font-size: 11px' height='100px' width='340px' class='texto-centro abajo'>1-Firma</td>
                                            <td style='font-size: 11px' width='340px' class='texto-centro abajo'>2-Firma</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
   
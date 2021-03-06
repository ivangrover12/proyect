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
	/* width: 740px;	 */
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
	font-size: 9px;
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
}
.subtitulo{
	font-weight: bold;
	font-size: 10px;
	padding: 3px 0px 3px 10px;
}
.in1{
    width: 21px;
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
	font-size: 11px;
}
.negrita{
	font-weight: bold;
}
.letra-grande{
	font-size: 11px;	
}
.inp1{
	width: 35px;
}
.inp2{
	width: 70px;
}
.abajo{
	padding: 90px 0px 0px 0px
}
pre{
    font-family: "Times New Roman";  
    font-size: 8px;
}
.letra-grande-menos{
font-size: 9px;
}
    </style>
</head>
<body>
    <table class='contenedor' border='2'>
        <tr>
            <td>
                <table class='contenedor' style='font-size: 10px'>
                    <tr>
                        <td width='90px'>Lugar:</td>
                        <td width='30px' ><input class='in1' type='text' value='LAP'  /></td>
                        <td width='370px'><input class='in2' type='text' value='LA PAZ'  /></td>
                        <td width='85px'>Fecha de Emision:</td>						
                        <td width='80px'><input class= 'in3' type='text' value='{{ $cert->gestion }}'  /></td>
                        <td width='70px'>Tipo de Gasto:</td>
                        <td width='120px'><input class='in4' type='text' value='{{ $clasgast->descrip}}' /></td>						
                    </tr>
                    <tr>
                        <td>Entidad:</td>
                        <td><input class='in1' type='text' value='{{ $cert->entidad }}'  /></td>
                        <td><input class='in2' type='text' value='MINISTERIO DE DESARROLLLO RURAL Y TIERRAS'  /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>						
                    </tr>
                    <tr>
                        <td>Dir. Administrativa:</td>
                        <td><input class='in1' type='text' value='{{$cert->da}}'  /></td>
                        <td><input class='in2' type='text' value='{{$das->desc_da}}'  /></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>						
                    </tr>
                    <tr>
                        <td >Unidad Ejecutora:</td>
                        <td><input class='in1' type='text' value='{{$cert->ue}}'  /></td>
                        <td><input class='in2' type='text' value='{{$das->desc_ue}}'  /></td>
                        <td></td>
                        <td></td>
                        <td>Secuencia:</td>
                        <?php $secuencia=str_pad($cert->secuencia, 5, "0", STR_PAD_LEFT);?>
                        <td><input type='text' value='{{$secuencia}}' /></td>						
                    </tr>						
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class='contenedor' width='720px' style='font-size: 10px'>
                    <tr>
                        <td style='font-size: 13px' colspan='7' class='subtitulo'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATOS UNIDAD EJECUTORA SOLICITANTE - PROYECTO Y/O PROGRAMA</td>	
                    </tr>
                    <tr>
                        <td width='130px;'>Estructura Program&aacute;tica:</td>
                        <td width='50px'><input class='in5' type='text' value='{{$cert->prog}}'  /></td>
                        <td width='50px'><input class='$in' type='text' value='{{$cert->proy}}'  /></td>
                        <?php $act=str_pad($cert->act, 3, "0", STR_PAD_LEFT);?>
                        <td width='80px'><input class='in7' type='text' value='{{$act}}'  /></td>
                        <td width='380px'><textarea rows='3' cols='80'>{{$cat_prog->nombre}}</textarea></td>
                        <td width='50px'>SISIN:</td>
                        <td><input class='in9' type='text' value='{{ $cert->proy }}'  /></td>
                    </tr>
                </table>
            </td>
        </tr>

		<?php		
		$totales= array();
		$totales['ppto_ley']=0;
		$totales['ppto_mod']=0;
		$totales['ppto_vig']=0;
		$totales['ejec_com']=0;
		$totales['saldo_ejec']=0;
		$totales['reserva']=0;
		$totales['ppto_disp']=0;

		?>
        
		<?php		
		foreach( $cer  as $ce )	
		{
            
            $par = App\Partidas::where('gestion',$ce->gestion)->where('objgast',$ce->part)->first();
            $org = App\Org::where('gestion',$ce->gestion)->where('org',$ce->org)->first();
            $ff = App\Ff::where('gestion',$ce->gestion)->where('ff',$ce->ff)->first();
        
        ?>
             
   
            <tr>
                <td>
					<center>
                    <table class='contenedor'style='font-size: 10px'>
                        <tr>
                            <td width='50px'>&nbsp;</td>
                            <td width='50px'>Fuente:</td>
                            <td width='20px'><input  class='in10' type='text' value='{{ $ce->ff }}' /></td>
                            <td width='200px'><input class='in11' type='text' value=<?php if ($ff) { ?>'{{ $ff->descrip }}' <?php }?>></td>
                            <td width='200px'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Organismo:</td>
                            <td><input class='in10' type='text' value='{{$ce->org}}'  /></td>
                            
                            <td><input class='in11' type='text' value=<?php if($org) { ?>'{{$org->descr_org}}'<?php }?>  ></td>
                            
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan='5'>										
                                <table  border='1' style='border-collapse: collapse; width:100%; font-size: 10px' >
                                    <tr>
                                        <td class='texto-centro' width='30px'>PROG</td>
                                        <td class='texto-centro' width='30px'>PROY</td>
                                        <td class='texto-centro' width='30px'>ACT</td>
                                        <td class='texto-centro' width='30px'>FTE</td>
                                        <td class='texto-centro' width='30px'>ORG</td>
                                        <td class='texto-centro' width='30px'>OBJ.GASTO</td>
                                        <td class='texto-centro' width='100px'>DESCRIPCION</td>
                                        <td class='texto-centro' width='60px'>PPTO. LEY</td>
                                        <td class='texto-centro' width='60px'>PPTO. MOD.</td>
                                        <td class='texto-centro' width='60px'>PPTO. VIG.</td>
                                        <td class='texto-centro' width='60px'>EJEC_COM.</td>
                                        <td class='texto-centro' width='60px'>SALDO EJEC.</td>
                                        <td class='texto-centro' width='60px'>RESERVA</td>
                                        <td class='texto-centro' width='60px'>PPTO. DISP.</td>
                                    </tr>
                                    <tr>
                                        <td class='texto-centro'>{{$ce->prog}}</td>
                                        <td class='texto-centro'>{{$ce->proy}}</td>
                                        <?php $ac=str_pad($ce->act, 3, "0", STR_PAD_LEFT);?>
                                        <td class='texto-centro'>{{$ac}}</td>
                                        <td class='texto-centro'>{{$ce->ff}}</td>
                                        <td class='texto-centro'>{{$ce->org}}</td>
                                        <td class='texto-centro'>{{$ce->part}}</td>
                                        <td class='texto-centro'><?php if ($org) { ?>{{$par->descrip}}<?php }?></td>
                                        <td class='texto-derecha'>{{number_format($ppto_ley=$ce->ppto_ley,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_mod=$ce->ppto_mod,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_vig=($ce->ppto_ley+$ce->ppto_mod),2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ejec_com=$ce->eje_com,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($saldo_ejec=($ce->ppto_ley+$ce->ppto_mod-$ce->eje_com),2)}}</td>
                                        <td class='texto-derecha'>{{number_format($reserva=$ce->reserva,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_disp=($ce->ppto_ley+$ce->ppto_mod-$ce->eje_com-$ce->reserva),2)}}</td>
                                    </tr>												
                                </table>
                                <table  border='0' style='border-collapse: collapse; width:100%;' >
                                    <tr>
                                        <td width='30px'></td>
										<td width='30px'></td>
										<td width='30px'>TOTAL</td>
										<td width='30px'></td>
										<td width='30px'></td>													
                                        <td width='30px'>{{$ce->ff}}</td>
                                        <td width='30px'>{{$ce->org}}</td>
                                        <td width='175px'></td>
                                        
                                        <td class='texto-derecha'>{{number_format($ppto_ley=$ce->ppto_ley,2)}}</td>
                                        <td width='50px' class='texto-derecha'>{{number_format($ppto_mod=$ce->ppto_mod,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_vig=($ce->ppto_ley+$ce->ppto_mod),2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ejec_com=$ce->eje_com,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($saldo_ejec=($ce->ppto_ley+$ce->ppto_mod-$ce->eje_com),2)}}</td>
                                        <td class='texto-derecha'>{{number_format($reserva=$ce->reserva,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_disp=($ce->ppto_ley+$ce->ppto_mod-$ce->eje_com-$ce->reserva),2)}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
					</table>
					</center>
                </td>
            </tr>
 
			<?php		
				
				$totales['ppto_ley']+=$ppto_ley;
				$totales['ppto_mod']+=$ppto_mod;
				$totales['ppto_vig']+=$ppto_vig;
				$totales['ejec_com']+=$ejec_com;
				$totales['saldo_ejec']+=$saldo_ejec;
				$totales['reserva']+=$reserva;
				$totales['ppto_disp']+=$ppto_disp;
				

		?>
				
		<?php       
                }
         ?>
    <tr>
        <td style='background-color:#ccc;' height='30px'>
            <table class='contenedor' width='730px'style='font-size: 10px'>
                <tr>
                    <td width='30px'></td>
                    <td width='90px' class='negrita'>TOTAL (FF - ORG)</td>													
                    <td width='30px'></td>
                    <td width='30px'></td>
                    <td width='115px'></td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['ppto_ley'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['ppto_mod'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['ppto_vig'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['ejec_com'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['saldo_ejec'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['reserva'],2)}}</td>
                    <td width='60px' class='texto-derecha negrita'>{{number_format($totales['ppto_disp'],2)}}</td>
                </tr>							
            </table>
        </td>					
    </tr>
    <tr>
        <td height='30px'>
            <table class='contenedor' width='730px' >
                <tr>
                    <td width='690px' class='totales-completos'>Son: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ NumerosEnLetras::convertir($totales['ppto_disp'],'Bolivianos',false,'Centavos') }} </td>
                    <td></td>
                </tr>
            </table>												
        </td>					
    </tr>
    <tr>
        <td height='90px'>
            <table width='100%' >
                <tr>
                    <td style='font-size: 12px' valign='top'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resumen de Operaci&oacute;n:</b><br/><pre-wrap>{{$cert->obs}}</pre-wrap></td>								
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class='contenedor' width='730px' style='font-size: 10px'>
                <tr>
                    <td width='50px'>&nbsp;</td>
                    <td width='30px'>Moneda</td>
                    <td width='40px'><input class='inp1' type='text' value='69' /></td>
                    <td width='80px'><input class='inp2' type='text' value='BOLIVIANOS' /></td>
                    <td width='280px'>&nbsp;</td>
                    <td>Fecha de Validez</td>
                    <td><input type='text' value='31/12/{{$cert->gest}}' /></td>								
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height='55px'>
            <table class='contenedor' style='font-size: 10px'>
                <tr>
                    <td height='55px' width='240px' class='texto-centro abajo'>1-Firma</td>
                    <td width='240px' class='texto-centro abajo'>2-Firma</td>
                    <td width='240px' class='texto-centro abajo'>3-Firma</td>
                </tr>
            </table>
        </td>
    </tr>

    </table>				

</body>
</html>
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
    width: 20px;
}
.in2{
    width: 250px;
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
	padding: 40px 0px 0px 0px
}
.partidas{
	font-size: 8px;
}
pre{
    font-family: "Times New Roman";  
    font-size: 8px;
}
    </style>
</head>
<body>
    <table class='contenedor' id='tabla-superior'  >
        <tr id='fila'>
            <td align='center' width='240px'><span style='font-size: 10px'>MINISTERIO DE DESARROLLO RURAL Y TIERRAS<span><br /><img src="{{public_path() .'/'. 'imagenes/logo-sipmdryt.png'}}" width='250' height='80px' /></td>
            <td align='center'><h1>CERTIFICACI&Oacute;N PRESUPUESTARIA</h1><h2>ORIGINAL PARA TRAMITES</h2></td>
            <td align='center' width='120px'><span style='font-size: 13px'>{{ $fhs }} <br /><br />Gestion: {{ $ys }}<br /><br /> Pagina 1<br /></span></td>							
        </tr>					
    </table>
		
				<table class='contenedor' border='1'>
					<tr>
						<td>
							<table class='contenedor letra-mediana' >
								<tr>
									<td width='20px'>Lugar:</td>
									<td width='10px'><input class='in1' type='text' value='LAP'  /></td>
									<td width='280px'><input class='in2' type='text' value='LA PAZ'  /></td>
									<td width='70px'>Fecha de Emision:</td>						
									<td width='80px' ><input class= 'in3' type='text' value='{{ $fs }}'  /></td>
									<td width='60px'>Tipo de Gasto:</td>
									<td width='120px' ><input class='in4' type='text' value='{{ $clasgast->descrip}}' /></td>						
								</tr>
								<tr>
									<td class='letra-muy-chica'>Entidad:</td>
									<td><input class='in1' type='text' value='{{ $cert->entidad }}'/></td>
									<td><input class='in2' type='text' value='MINISTERIO DE DESARROLLO RURAL Y TIERRAS'  /></td>
									<td></td>
									<td></td>
									<td class='letra-muy-chica'>Secuencia:</td>
                                    <?php $secuencia=str_pad($cert->secuencia, 5, "0", STR_PAD_LEFT);?>
									<td><input type='text' value='{{$secuencia}}' /></td>						
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
		?>
    
   
            <tr>
                <td>
					<center>
                    <table class='contenedor'style='font-size: 10px'>
                        
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
                                        <td></td>
                                        <td class='texto-derecha'>{{number_format($ppto_ley=$ce->ppto_ley,2)}}</td>
                                        <td class='texto-derecha'>{{number_format($ppto_mod=$ce->ppto_mod,2)}}</td>
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
						<table class='contenedor' width='30px' >
							<tr>
                            <td width='690px' class='totales-completos'>Son: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ NumerosEnLetras::convertir($totales['ppto_disp'],'Bolivianos',false,'Centavos') }} </td>
								<td></td>
							</tr>
						</table>												
					</td>					
				</tr>
				<tr>
					<td height='90px'>
						<table width='930px' >
							<tr>
								<td width='690px' class='letra-grande'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resumen de Operaci&oacute;n:</b><br /><p>{{$cert->obs}}</p></td>								
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
                <td height='100px'>
                    <table class='contenedor' style='font-size: 10px'>
                        <tr>
                            <td height='100px' width='240px' class='texto-centro abajo'>1-Firma</td>
                            <td width='240px' class='texto-centro abajo'>2-Firma</td>
                            <td width='240px' class='texto-centro abajo'>3-Firma</td>
                        </tr>
                    </table>
                </td>
            </tr>
				
				</table>
</body>
</html>
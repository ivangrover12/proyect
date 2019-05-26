
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
                <br>
    </body>
</html>
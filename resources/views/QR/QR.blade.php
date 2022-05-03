@extends('layouts.app')
@section('content')
<body style=" background-color: slateblue;">
<div class="container mt-5">
	<div class="container col-md-8 justify-content-center">
		<div class= "contenedorqr">
				<ul class="ul">
					<li class="li activo btn">Opcion 1</li>
					<li class="li btn">Opcion 2</li>
				</ul>		
			<div class="subcontenedor">
				<div class="opciones activo">
					<div>
						<div class="panel-heading">
							<h1>Decodificar códigos QR</h1>
						</div>
						<hr>
						<form action="{{ route('QR.leerQR') }}" method="post" enctype="multipart/form-data">
						@csrf
							<input type="file" name="qrimage" id="qrimage" class="form-control" required=""><br>
							<input type="submit" class="btn btn-md btn-block btn-info" value="Enviar datos" name="">					
						</form>
						
					</div>
				</div>
				<div class = "opciones" >
					<div class="video">
						<video id="preview"></video>
					</div>
					<button class="btn botonsito btn-primary" id="btnstartscan">Comenzar Escaneo</button>
					<button class="btn botonsito btn-primary" id="btnendscan">Terminar Escaneo</button>
				</div>		
			</div>		
		</div>
	</div>
</div>
</body>
@endsection
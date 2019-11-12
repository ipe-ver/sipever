@extends('almacen.reportes.encabezado_reporte')
@section('content')
	<div class="hijo">
		<table class="table">
			<thead>
				<tr>
		          @foreach($headers as $header)
		              <th style="white-space: nowrap;">{{$header}}</th>
		          @endforeach
		        </tr>
			</thead>
		</table>
	</div>
@endsection
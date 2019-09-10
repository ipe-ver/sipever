@extends('adminlte::layouts.landing')

@section('style')
	@include('expediente.style')
@endsection

@section('content')
<div class="col-md-12">

	<div class="box">
		<div class="box-header">
		<div class="col-md-1">
							
			</div>
				 
			<div class="col-md-4">
				
						 
	        
            </div> 			
			<h3 class="box-title pull-right">Listado de Plazas</h3>
			
		</div>
		<div class="box-body">
 			<table class="table" id="table" data-toolbar="#custom-toolbar"></table>
 		</div>
 	</div>
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')

		{!! HTML::script('components/select2/dist/js/select2.js') !!}	
		{!! HTML::script('components/select2/dist/js/select2.min.js') !!}
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.js') !!}
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.date.extensions.js') !!}	
		{!! HTML::script('components/inputmask/dist/inputmask/inputmask.extensions.js') !!}	

		
    
@endsection


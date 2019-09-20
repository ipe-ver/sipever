@extends('adminlte::layouts.landing')

@section('style')
	
	{!! Html::style('components/bootstrap-table/dist/bootstrap-table.css') !!}
@endsection

@section('content')
 
<div class="col-md-1">
</div>

<!-- TAB DE MISIÓN - VISIÓN  - FILOSOFÍA -->
<div class="row">
    <div class="col-md-10">
        <h2 style="text-align:right;">ORGANIGRAMA</h2>
        <br>
        <!-- Custom Tabs -->
        
    </div>
</div>


<div class="col-md-1">
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection


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
         <div class="nav-tabs-custom">
            
            <div class="tab-content" >
                <img src="{!! url('') !!}/img_system/Organigrama.png" style="display:block; margin:auto;">
            </div>
            <br>
            
        </div>


   


      
        

         
    </div>



        
   
</div>


<div class="col-md-1">
</div>

@include('adminlte::layouts.partials.modal_gral')

@endsection

@section('script')


@endsection


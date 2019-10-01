@extends('adminlte::layouts.landing')

@section('style')
	
@endsection

@section('content')
 

<div class="row">
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
    <div class="col-md-10">
    

        <div class="box box-solid">
                <div class="box-header with-border">
                    <h2 style="text-align:right;">ORGANIGRAMA</h2>

                    <div class="tab-content" >
                        <img src="{!! url('') !!}/img_system/Organigrama.png" style="display:block; margin:auto;">
                    </div> <!-- ./ tab-content -->

                </div> <!-- ./ box-header with-border -->
        </div> <!-- ./ box box-solid -->
  
    </div> <!-- ./ col-md-10 -->
    <div class="col-md-1"></div> <!-- ./ col-md-1 -->
</div> <!-- ./ row -->



@endsection

@section('script')


@endsection


@if ($item['submenu'] == [])
	<li class="">
		<a href="">
			<i class="{{ $item['icono'] }}"></i> <span>{{ $item['nombre'] }}</span>
		</a>
	</li>
@else
	<li class="treeview">
		<a href="#"><i class="{{ $item['icono'] }}"></i> <span>{{ $item['nombre'] }}</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			@foreach($item['submenu'] as $submenu)				
				@if ($submenu['submenu'] == [])					
					<li class="">
						<a href="">
							<i class="{{ $submenu['icono'] }}"></i> <span>{{ $submenu['nombre'] }}</span>
						</a>
					</li>				
				@else
					@include('layouts.partials.sidebar-menu', ['item' => $submenu])
				@endif			
			@endforeach
		</ul>
	</li>
@endif



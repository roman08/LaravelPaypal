

@if(Session::has('success'))

    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('success')}}
    </div>

@endif


@if(Session::has('status'))

    <div class="alert alert-info" >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('status')}}
    </div>

@endif

<!-- Recibe los errores de retornados de la empresa -->
		@if($status = Session::get('error'))
            <div class="alert alert-danger alert-dismissable fade in">
   				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong> {{ $status }}!</strong> 
  			</div>
          @endif
@if( session()->get('success') )
    
    <div class="row justify-content-center">
        <div class="col-md-3 alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
    </div>

@elseif( session()->get('failed') )

    <div class="row justify-content-center">
        <div class="col-md-3 alert alert-warning">
          {{ session()->get('failed') }}  
        </div><br />
    </div>

@endif
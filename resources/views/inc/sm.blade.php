 @if( $sm = Session::get('sm'))
         <div class="row sm-box">
             <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <p>{{ $sm }}</p>
                    </div>
                </div>
            </div>

        @endif
<!DOCTYPE html>
<html>
    <head>
        <title>rabariel Admin Panel</title>
        <script> var BASE_URL = "{{ url('') }}/";</script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.6-dist/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.6-dist/css/bootstrap-theme.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						   
    </head>
    <body>
       
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-12"><h2 class="text-center">rabariel Admin Panel</h2></div>
           </div><hr>
            
           
           
           <div class="row">
               <div class="col-md-12">
                   <div class="col-md-2">
                       <ul class="nav nav-pills nav-stacked">
                           <li><a href="{{url('cms/dashboard')}}">Dashboard</a></li>
                           <li><a href="{{url('cms/menu')}}">Menu</a></li>
                           <li><a href="{{url('cms/content')}}">Content</a></li>
                           <li><a href="{{url('cms/categories')}}">Categories</a></li>
                           <li><a href="{{url('cms/products')}}">Products</a></li>
                           <li><a href="{{url('cms/orders')}}">Orders</a></li>
                           <li><a href="{{url('')}}">Volver al sitio</a></li>
                           <li><a href="{{url('user/logout')}}">Log Out</a></li>
                       </ul>
                   </div>
                   <div class="col-md-10">
                  @include('inc.sm')
                  @include('inc.errors')
                  @yield('cms_content')
                   </div>
               </div>
           </div><hr>
             
           <div class="row">
               <div class="col-md-12"><p class="text-center">rabariel admin panel &COPY; {{date('Y')}}</p></div>
           </div>
            
        </div>
        
        <script type="text/javascript" src="{{ asset('lib/jquery/jquery-1.12.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/script.js')}}"></script>

    </body>
</html>

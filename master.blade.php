<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <script> var BASE_URL = "{{ url('') }}/";</script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.6-dist/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.6-dist/css/bootstrap-theme.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('')}}"><img style="max-width:200px; margin-top: -11px" src="{{ asset('images/rabariel.png') }}"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('about')}}">About</a></li>
                        <li><a href="{{ url('shop')}}">Shop</a></li>
                        @if( ! Cart::isEmpty())
                        <li><a href="{{ url('shop/checkout') }}">
                                <img width="20" border="0" src="{{ asset('images/shop.png') }}">
                                <div class="total-cart">{{ Cart::getTotalQuantity() }}</div>
                            </a></li>
                            @endif
                            
                    </ul>
                    <ul class="nav navbar-nav pull-right" >
                        <li><a href="{{ url('user/signin')}}">Sign in</a></li>
                        <li><a href="{{ url('user/signup')}}">Sign up</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
        
        <div class="container">

        @if( $sm = Session::get('sm'))
         <div class="row sm-box">
             <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <p>{{ $sm }}</p>
                    </div>
                </div>
            </div>

        @endif
            
        @if($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        
            @yield('content')</div>

        <hr>
        <div class="container">
            <div class="row"> 
                <div class="col-md-12">
                    <p class="text-center">Rab Ariel &copy; {{ date('Y') }}</p>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('lib/jquery/jquery-1.12.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/script.js')}}"></script>

    </body>
</html>

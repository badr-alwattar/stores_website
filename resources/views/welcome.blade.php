<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}" />

    <title>{{ config('app.name', 'Sanad') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://i.pinimg.com/originals/f3/a2/84/f3a284df1dfd84822b7686aaa29fef1f.png">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style scoped>

        .back {
            
            margin: 0px;
            padding: 0px;
        }
    
        .img-container {
          text-align: center;
          display: block;
          position: relative;
        }
        .cen {
            text-align: center;
        }
        .fit-img {
          width: 100%;
          opacity: .3;
        }
        .centered {
          position: absolute;
          top: 10%;
          left: 50%;
          right: 30%;
          transform: translate(-50%, -50%);
        }
        
      @media screen and (min-width : 320px)
      {
      .head-text
      {
          font-size: 13px;
      }
      }
      @media screen and (min-width : 1204px)
      {
      .head-text
      {
          font-size: 20px;
      }
      }
        /*  */
        /*  */
      
      
    </style>
</head>
<body>
    
        @include('layouts.navbar')
        


        
        <div class="img-container mb-4"> <!-- Block parent element -->
            <!-- <img src="https://www.everynation.org/wp-content/uploads/2018/02/Monthly-Website-Header-background.jpg"  alt="..." class="fit-img"> -->
            <img src="https://www.lirent.net/wp-content/uploads/2014/10/Android-Lollipop-wallpapers-5.jpg"  alt="..." class="fit-img" >
            {{-- <div class="centered head-text"
            style="font-weight:bold; color: white;">
                All Stores Website..
            </div> --}}
            <!-- <img src="https://drive.google.com/uc?export=view&id=1bxPWTPFV_1xvYpnqCIug8hXFqI4JAQw7"  alt="..." class="fit-img"> -->
        </div>
        
        
        <div class="container">
        
            
            
            <div class="row mb-3">
                <div class="col col-12 py-2 ">    
                    <h3 class="card-title text-center">About the project</h3>
                    <h4 class="card-title text-center"></h4>
                    <h4 class="card-title text-center"></h4>
                    <h4 class="card-title text-center"></h4>
                </div>
            </div>
        
        
        
        
        
            <h3 class="card-title"> Categories: </h3>
            <div class="row">
                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <div class="col col-lg-3 py-2">
                            <div class="card" >
                                <img class="card-img-top" src='{{ $category->img }}' alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold text-center py-3">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2> No stores in the hood </h2>
                @endif
                
            </div>
        </div>

  
</body>
</html>


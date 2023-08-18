<head>
    <title>{{ $title ?? 'CensuraOut.es' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/cardAds.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/navbar.js') }}"></script>
    <link href="{{ asset('css/globalstyles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>
  
    
    <x-navbar />
    <div class="mt60px">
    {{$slot}}
  
  </div>
    <x-footer />
    @vite(['resources/js/app.js'])
  
  

    
  </body>
  
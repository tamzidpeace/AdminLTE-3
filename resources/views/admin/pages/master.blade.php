<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Dashboard</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('admin.includes.styles')
  @yield('scripts')  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('admin.includes.navbar')   
    @include('admin.includes.sidebar')    
    @include('admin.includes.content_top')   
    @yield('content')       
    @include('admin.includes.footer')    
  </div>  
  @include('admin.includes.scripts')
  @yield('scripts')
</body>
</html>
<!doctype html>
<html lang="en">
<head> 
    <meta charset="utf-8" />
    <title>Urban Mart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    {{-- icons cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>    
<body data-sidebar="dark">
   <div id="layout-wrapper">
      <header id="page-topbar" class="isvertical-topbar">
         <div class="navbar-header">
            <div class="d-flex">
               <div class="d-none d-sm-block ms-3 align-self-center">
                  <h4 class="page-title">URBAN MART POS SYSTEM</h4>
               </div>
               
            </div>

            <div class="d-flex">
               <div class="d-none d-sm-block ms-3 align-self-center">
                  <a href="{{ route('logout')}}" class="btn btn-light btn-md" title="Logout">
                     <i class="fas fa-power-off"></i>
                  </a>
               </div>
            </div>
         </div>
      </header>
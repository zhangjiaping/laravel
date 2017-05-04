<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>
            
        <!-- CSS -->
        <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/generics.css') }}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">
        <section id="login">
            <header>
                <h1>SUPER ADMIN</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            </header>
        
            <div class="clearfix"></div>
            
            
            <!-- Register -->
            <form class="box animated tile active" id="box-register" action='/admin/doreset' method='post'>
                {{ csrf_field() }}
                <h2 class="m-t-0 m-b-15">Reset</h2> 
                <input type="hidden" name='name' value="{{ $name }}"> 
                <input type="text" value="{{ $name }}" disabled class="login-control m-b-10">
                <input type="password" name='pass' required class="login-control m-b-20" placeholder="Confirm Password">

                <button class="btn btn-sm m-r-5">Reset</button>

            </form>
            
        </section>                      
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{ asset('Admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>
        
        <!--  Form Related -->
        <script src="{{ asset('Admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->
        
        <!-- All JS functions -->
        <script src="{{ asset('Admin/js/functions.js') }}"></script>
    </body>
</html>

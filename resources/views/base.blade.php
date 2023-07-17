<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cypress Activity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  


    <!-- CSS -->
    <style type="text/css">
        header {
            background-color: #182d32;
            padding: 10px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-size: 24px;
            margin: 0;
        }

        nav {
            display: flex;
            justify-content: flex-end;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
        }

        nav ul li a:hover {
            background-color: #fff;
            color: #333;
            text-decoration: none;
        }


        /* Media query for mobile devices */
        @media (max-width: 768px) {
            .logo {
                text-align: center;
                margin-bottom: 10px;
            }

            nav {
                text-align: center;
            }

            nav ul {
                display: block;
                text-align: center;
            }

            nav ul li {
                display: block;
                margin: 5px 0;
            }
        }
    </style>
    <!-- end CSS -->
</head>



<!-- BODY -->
<body style="background-color: #769981;">

    <!-- Header menu bar -->
    <header>
        <div class="header-container">
            <h1 class="logo">Cypress Activity | {{ auth()->user()->name }}</h1>
            <nav>
                <ul>
                    <li><a href="/admin/dashboard">Global Activities</a></li>
                    <li><a href="/admin/user-activities">User Activities</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>    
            </nav>
        </div>
    </header>

    <!-- Content for each page -->
    @yield('content')

</body>


<!-- SCRIPTS -->
<script>
$(document).ready(function(){

    //Time out for flash message
    setTimeout(function(){
       $("div.alert.alert-success").remove();
    }, 5000 ); // 8 secs

});
</script>

</html>
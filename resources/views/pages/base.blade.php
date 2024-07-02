<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Laravel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar img.circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .sidebar h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .sidebar nav {
            width: 100%;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar a.active {
            color: #007bff;
            font-weight: bold;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .topbar {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .topbar.hidden {
            display: none;
        }

        .container-fluid {
            padding: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 5px 10px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="{{ asset('images/cast logo.jpg') }}" alt="Logo" class="circle">
        <h1>CAST ATTENDANCE</h1>
        <nav>
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Home</a>
            <a href="{{ url('/event') }}" class="{{ Request::is('event') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Events</a>
            <a href="{{ url('/student') }}" class="{{ Request::is('student') ? 'active' : '' }}"><i class="fas fa-user-graduate"></i> Students</a>
            <a href="{{ url('/attendance') }}" class="{{ Request::is('attendance') ? 'active' : '' }}"><i class="fas fa-check-square"></i> Attendance</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="topbar" id="topbar">
            <h1 id="topbar-title">CAST ATTENDANCE</h1>
        </div>

        <div class="container-fluid mt-5">
            @yield('content')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.sidebar a');
            const topbar = document.getElementById('topbar');
            const topbarTitle = document.getElementById('topbar-title');

            links.forEach(link => {
                link.addEventListener('click', function(event) {
                    
                    event.preventDefault();

                    
                    links.forEach(l => l.classList.remove('active'));

                    this.classList.add('active');

                   
                    if (this.querySelector('i').classList.contains('fa-house')) {
                        topbar.classList.add('hidden');
                    } else {
                        topbar.classList.remove('hidden');
                       
                        topbarTitle.textContent = this.textContent.trim();
                    }

                    
                    window.location.href = this.href;
                });
            });

           
            if (document.querySelector('.sidebar a.active i').classList.contains('fa-house')) {
                topbar.classList.add('hidden');
            } else {
                topbarTitle.textContent = document.querySelector('.sidebar a.active').textContent.trim();
            }
        });
    </script>
</body>
</html>

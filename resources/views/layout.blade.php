<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #4a5568;
        }

        p {
            font-size: 16px;
            color: #4a5568;
        }
        
    </style>
</head>
<body >
    @yield('content')
</body>
</html>
 
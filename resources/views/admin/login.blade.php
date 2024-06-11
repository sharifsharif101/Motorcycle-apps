<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
        <h2> login </h2>

        @if ($errors->any())
 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
 
    @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ Session::get('error') }}</li>
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ Session::get('success') }}</li>
            </ul>
        </div>
        @endif
    
 
    <form action="{{ route('admin_login_submit') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Emial"> <br>
        <input type="password" name="password" placeholder="password"> <br>
        <button type="submit"> Login </button>
    </form>
</body>
</html>
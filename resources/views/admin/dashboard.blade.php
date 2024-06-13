<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
    a {
      display: inline-block;
      padding: 8px 16px;
      margin-top: 20px;
      background-color: #4a5568;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    a:hover {
      background-color: #718096;
    }
  </style>
</head>
<body>
  <div class="container mx-auto px-4 sm:px-8 text-center">
    <h2 class="text-2xl font-semibold leading-tight">لوحة تحكم الادمن</h2>

    <div class="flex justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
          <img class="w-full" src="https://via.placeholder.com/300" alt="Card image">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">عدد أصحاب الدراجات النارية </div>
            <a href="{{ route('admin_index') }}" class="mt-4"> 
                <p class="text-white text-base">{{ $userCount }} / أشخاص</p>
            </a>
          </div>
    
        </div>
      
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
          <img class="w-full" src="https://via.placeholder.com/300" alt="Card image">


          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"> عدد الدراجات النارية</div> 
             <a href="{{ route('admin_index') }}" class="mt-4"> 
                <p class="text-white text-base">     {{ $motorcyclesCount }} / دراجة نارية </p>
            </a>
          </div>

 
        </div>
      </div>
      



    <a href="{{ route('admin_logout') }}" class="mt-4">تسجيل الخروج</a>
  </div>
</body>
</html>

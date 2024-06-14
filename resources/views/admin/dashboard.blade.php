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



  <div class="bg-gradient-to-b from-purple-700 to-purple-900 py-8">
    <div class="container mx-auto px-4 sm:px-8 text-center">
      <h2 class="text-3xl font-semibold text-white leading-tight mb-8">لوحة تحكم الأدمن</h2>

      <div class="flex flex-wrap justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4 bg-white">
          <img class="w-full" src="{{asset ('images\rider1.png')}}" alt="Card image">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">عدد أصحاب الدراجات النارية</div>
            <a href="{{ route('admin_index') }}" class="text-purple-700 block mt-4">
              <p class="text-white">{{ $userCount }} / أشخاص</p>
            </a>
          </div>
        </div>

        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4 bg-white">
          <img class="w-full" src="{{asset ('images\grop.png')}}" alt="Card image">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">عدد الدراجات النارية</div>
            <a href="{{ route('admin_index') }}" class="text-purple-700 block mt-4">
              <p class="text-white">{{ $motorcyclesCount }} / دراجة نارية</p>
            </a>
          </div>
        </div>

        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4 bg-white">
          <img class="w-full" src="{{asset ('images\time.png')}}" alt="Card image">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"> أخر دراجة تم تسجيلها في النظام كان  </div>
            <a href="{{ route('admin_index') }}" class="text-purple-700 block mt-4">
              <p class="text-white">  {{$lastMotorcycleTime}}     </p>
            </a>
          </div>
        </div>

      </div>
      <!-- زر الانتقال إلى الصفحة الرئيسية -->
      <a href="{{ route('home') }}"
        class="inline-block mt-8 px-6 py-3 bg-purple-700 hover:bg-purple-900 text-white rounded-lg transition duration-300">
        الصفحة الرئيسية
      </a>
      <a href="{{ route('admin_logout') }}"
        class="inline-block mt-8 px-6 py-3 bg-blue-700 hover:bg-purple-900 text-white rounded-lg transition duration-300">تسجيل
        الخروج</a>

        <a href="{{ route('Createmotorcycle') }}"
        class="inline-block mt-8 px-6 py-3 bg-pink-600 hover:bg-pink-800 text-white rounded-lg transition duration-300"> إضافة دراجة</a>

    </div>
  </div>

{{-- //////////////////////////// --}}





</body>

</html>
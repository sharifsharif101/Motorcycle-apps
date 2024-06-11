<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table Example</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

 

  <div class="container mx-auto px-4 sm:px-8">
    @if(session('success'))
    <div id="successAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>

    <script>
        // Wait for 3 seconds then hide the success message
        setTimeout(function(){
            document.getElementById('successAlert').style.display = 'none';
        }, 3000);
    </script>
@endif

@if(session('danger'))
<div id="dangerAlert" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
    <p>{{ session('danger') }}</p>
</div>

<script>
    // Wait for 3 seconds then hide the success message
    setTimeout(function(){
        document.getElementById('dangerAlert').style.display = 'none';
    }, 2000);
</script>
@endif



<div>
  <a href="{{ route('profile.edit') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
    الملف الشخصي (البروفايل)
</a>


  <h2 class="text-2xl font-semibold leading-tight text-right">
      الدراجات النارية الخاصة بي   {{ $userName }}
  </h2>
</div>
@if ($motorcycles->isEmpty())
  <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
      <p class="font-bold">لا توجد بيانات!</p>
      <p>لا توجد بيانات متاحة لعرضها في الوقت الحالي.</p>
  </div>
@else
   <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
<div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
<table class="min-w-full leading-normal">
  <thead>
    <tr>
      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
          اسم الدراجة النارية
      </th>
      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
        نوع / تصنيف الدراجة النارية
      </th>
      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
         رخصة المدراجة النارية
      </th>
      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
        عمليات أخرى
      </th>
      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($motorcycles as $motorcycle)
    

    <tr>
      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <div class="flex flex-row">
          <div class="flex-shrink-0 w-10 h-10 ml-5">
            <img class="w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.2&amp;w=160&amp;h=160&amp;q=80" alt="">
          </div>
          <div class="ml-3">
            <p class="text-gray-900 whitespace-no-wrap">{{$motorcycle->motorcycle_name }} </p>
           
          </div>
        </div>
      </td>
      
      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">{{$motorcycle->motorcycle_type }}</p>
       
      </td>

      <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <a href="{{ asset('storage/' . $motorcycle->contract_pdf) }}" class="text-blue-500 hover:text-blue-700" target="_blank">
            رخصة الدراجة النارية
        </a>
    </td>
      

    <td class="px-5 py-5 border-b mr-5 border-gray-200 bg-white text-sm">
      <div class="flex space-x-2">
          <a href="/edit/{{ $motorcycle->id }}" class=" ml-5 inline-flex items-center bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6  w-6 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8a3 3 0 00-3-3M22 12h-6M20 20a2 2 0 11-4 0v-2h2a4 4 0 004-4v-4a2 2 0 00-2-2H10a2 2 0 00-2 2v4a4 4 0 004 4h2v2a2 2 0 11-4 0V8M4 4v2M6 4v2M10 4v2M18 4v2M20 4v2" />
              </svg>
              تعديل
          </a>
          <form action="/delete/{{$motorcycle->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="inline-flex items-center bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 15h12l3-15H3zm2 0V4c0-1.1.9-2 2-2h10a2 2 0 012 2v2M9 10v6m6-6v6" />
                  </svg>
                  حذف
              </button>
          </form>
      </div>
  </td>
  

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@endif
</div>
  </div>
</body>
</html>

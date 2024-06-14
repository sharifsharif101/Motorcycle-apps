
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Motorcycle</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">

@if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    
@if (Session::has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                <li>{{ Session::get('error') }}</li>
            </ul>
        </div>
@endif
    
@if (Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <ul>
                <li>{{ Session::get('success') }}</li>
            </ul>
        </div>
@endif

        <div>
            <h2 class="text-2xl font-semibold leading-tight text-right">
                تعديل الدراجة النارية
            </h2>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">


 
                <form action="{{ route('Postmotorcycle', ['id' => $motorcycle->id]) }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT') <!-- تحديد استخدام طريقة PUT -->
                
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
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <input type="text" name="motorcycle_name" value="{{ $motorcycle->motorcycle_name }}" class="border rounded-md p-2 w-full">
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <input type="text" name="motorcycle_type" value="{{ $motorcycle->motorcycle_type }}" class="border rounded-md p-2 w-full">
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <input type="file" name="contract_pdf" class="border rounded-md p-2 w-full">
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <button type="submit" class="inline-flex items-center bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8a3 3 0 00-3-3M22 12h-6M20 20a2 2 0 11-4 0v-2h2a4 4 0 004-4v-4a2 2 0 00-2-2H10a2 2 0 00-2 2v4a4 4 0 004 4h2v2a2 2 0 11-4 0V8M4 4v2M6 4v2M10 4v2M18 4v2M20 4v2" />
                                        </svg>
                                        تحديث
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                



            </div>
        </div>
    </div>
</div>

</body>
</html>






{{-- {{$motorcycle}}
<div>
  <p>User Name: {{ \App\Models\User::find($motorcycle->user_id)->name }}</p>
</div> --}}
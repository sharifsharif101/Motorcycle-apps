<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabs with Tailwind CSS</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-100 min-h-screen flex items-center justify-center">
     
    <div class="w-full max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden" style="max-width: 71rem;">

        <a href="{{ route('admin_dashboard') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">العودة إلى لوحة التحكم</a>
        <div class="flex justify-around bg-purple-200 p-4">
            <button class="tab-btn bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded-lg transition duration-300 hover:from-purple-700 hover:to-purple-900 focus:outline-none">قائمة الدراجات التي أدخلها المستخدم</button>
            <button class="tab-btn bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded-lg transition duration-300 hover:from-purple-700 hover:to-purple-900 focus:outline-none">قائمة الدراجات التي ادخلها الأدمن</button>
        </div>
        <div class="p-4">

            <div class="tab-content">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-right py-2 px-4">الرقم</th>
                                <th class="text-right py-2 px-4">الاسم</th>
                                <th class="text-right py-2 px-4">رقم الهوية الوطنية</th>
                                <th class="text-right py-2 px-4">الايميل</th>
                                <th class="text-right py-2 px-4">عدد الدرجات النارية</th>
                                <th class="text-right py-2 px-4">الصورة الشخصية</th>
                                <th class="text-right py-2 px-4">حالة المستخدم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr class="border-t border-gray-300">
                                <td class="text-right py-2 px-4">{{ $index + 1 }}</td>
                                <td class="text-right py-2 px-4">
                                    <a href="{{ route('motorcycle.show', ['id' => $user->id ?? '#']) }}" class="text-blue-500 hover:underline">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="text-right py-2 px-4">{{ $user->national_id }}</td>
                                <td class="text-right py-2 px-4">{{ $user->email }}</td>
                                <td class="text-right py-2 px-4">{{ $user->motorcycles_count }}</td>
                                <td class="text-right py-2 px-4">
                                    <img src="{{ asset('storage/' . $user->personal_image) }}" alt="Personal Image"
                                         class="w-12 h-12 rounded-full object-cover">
                                </td>
                                <td class="text-right py-2 px-4">
                                    <a href="{{ route('user.changeStatus', ['id' => $user->id]) }}" class="inline-block px-2 py-1 text-white {{ $user->status ? 'bg-green-500' : 'bg-red-500' }} rounded">
                                        {{ $user->status ? 'Enable' : 'Disable' }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


{{-- ////////////////////////   التابة التانية ///////////////////      ////////// --}}

            <div class="tab-content hidden">
                <div class="max-w-full mx-auto overflow-x-auto">
                    <div class="w-full md:w-full text-center">
                        <table class="table-auto min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                            <thead>
                                <tr class="bg-purple-600 text-white">
                                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase border-r border-gray-300">اسم الدراجة النارية</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase border-r border-gray-300 ">نوع الدراجة النارية</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase border-r border-gray-300 "> رخصة الدراجة النارية</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase border-r border-gray-300">عمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($motorcycles as $motoer )
                            
                   
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r border-gray-300">{{$motoer->motorcycle_name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r border-gray-300">{{$motoer->motorcycle_type}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border-r border-gray-300">
                                             <a href="{{ asset('storage/' . $motoer->contract_pdf) }}" class="text-indigo-500 hover:text-indigo-700" target="_blank">
                                                الرخصة
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
<a href="{{ route('Editemotorcycle', ['id' => $motoer->id]) }}" class=" mx-5	 inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                             <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                             <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 10-2 0v8H4V4h7a1 1 0 100-2H4z" clip-rule="evenodd" />
                                          </svg>
                                          تعديل
                                       </a>
                                       <form id="deleteForm_{{$motoer->id }}"
        action="{{ route('deleteemotorcycle', ['id' => $motoer->id]) }}" method="POST" class="inline">
                                          @csrf
                                          @method('DELETE')
<button type="button" onclick="confirmDelete('{{ $motoer->id }}')" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a1 1 0 011-1h2a1 1 0 011 1v1h3a1 1 0 110 2H5a1 1 0 110-2h3V4zM4 7h12l-1.2 10.6A1 1 0 0113.8 18H6.2a1 1 0 01-.996-.9L4 7zm7 3a1 1 0 00-2 0v4a1 1 0 002 0v-4z" clip-rule="evenodd" />
                                             </svg>
                                             حذف
                                          </button>
                                       </form>
                                    </div>
                                 </td>
                                </tr>
                                @endforeach
                                <!-- يمكنك إضافة صفوف إضافية هنا -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <script>
        function confirmDelete(id) {
          if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
            document.getElementById('deleteForm_' + id).submit();
          }
        }
     </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab-btn");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach((tab, index) => {
                tab.addEventListener("click", () => {
                    tabs.forEach(t => t.classList.remove("bg-purple-700"));
                    tab.classList.add("bg-purple-700");

                    contents.forEach(c => c.classList.add("hidden"));
                    contents[index].classList.remove("hidden");
                });
            });
        });
    </script>
</body>
</html>

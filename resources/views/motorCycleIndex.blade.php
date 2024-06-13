{{-- <!DOCTYPE html>
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
               <table class="min-w-full divide-y divide-gray-200 shadow-lg rounded-lg overflow-hidden">
                  <thead class="bg-gray-50">
                     <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(0)">
                           اسم الدراجة النارية
                           <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                           </svg>
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(1)">
                           نوع / تصنيف الدراجة النارية
                           <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                           </svg>
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(2)">
                           رخصة الدراجة النارية
                           <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                           </svg>
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                           عمليات أخرى
                     </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                     @foreach ($motorcycles as $motorcycle)
                     <tr class="hover:bg-gray-100 even:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                           <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10 ml-4">
                                 <img class="h-10 w-10 rounded-full" src="{{ asset('images/moto.png') }}" alt="Motorcycle">
                              </div>
                              <div class="ml-4">
                                 <div class="text-sm font-medium text-gray-900">{{ $motorcycle->motorcycle_name }}</div>
                              </div>
                           </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                           <div class="text-sm text-gray-900">{{ $motorcycle->motorcycle_type }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                           <a href="{{ asset('storage/' . $motorcycle->contract_pdf) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                           رخصة الدراجة النارية
                           </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                           <div class="flex space-x-2">
                              <a href="/edit/{{ $motorcycle->id }}" class=" mx-5	 inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 10-2 0v8H4V4h7a1 1 0 100-2H4z" clip-rule="evenodd" />
                                 </svg>
                                 تعديل
                              </a>
                              <form id="deleteForm_{{ $motorcycle->id }}" action="/delete/{{ $motorcycle->id }}" method="POST" class="inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="button" onclick="confirmDelete('{{ $motorcycle->id }}')" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
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
                  </tbody>
               </table>
               <script>
                  function confirmDelete(id) {
                    if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
                      document.getElementById('deleteForm_' + id).submit();
                    }
                  }
                  
                  function sortTable(columnIndex) {
                    const table = document.querySelector("table tbody");
                    const rows = Array.from(table.rows);
                    const isAscending = table.getAttribute("data-sort-order") === "asc";
                    const sortedRows = rows.sort((a, b) => {
                      const aText = a.cells[columnIndex].innerText.trim();
                      const bText = b.cells[columnIndex].innerText.trim();
                      return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
                    });
                    table.setAttribute("data-sort-order", isAscending ? "desc" : "asc");
                    while (table.firstChild) {
                      table.removeChild(table.firstChild);
                    }
                    table.append(...sortedRows);
                  }
               </script>
               <script>
                  function confirmDelete(id) {
                    if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
                      document.getElementById('deleteForm_' + id).submit();
                    }
                  }
               </script>
            </div>
         </div>
         @endif
      </div>
      </div>
   </body>
</html> --}}


@extends('layout')

@section('title', 'ادخال الدراجة النارية')

@section('content')
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
        <table class="min-w-full divide-y divide-gray-200 shadow-lg rounded-lg overflow-hidden">
           <thead class="bg-gray-50">
              <tr>
                 <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(0)">
                    اسم الدراجة النارية
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                 </th>
                 <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(1)">
                    نوع / تصنيف الدراجة النارية
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                 </th>
                 <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(2)">
                    رخصة الدراجة النارية
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                 </th>
                 <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    عمليات أخرى
              </tr>
           </thead>
           <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($motorcycles as $motorcycle)
              <tr class="hover:bg-gray-100 even:bg-gray-50">
                 <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                       <div class="flex-shrink-0 w-10 h-10 ml-4">
                          <img class="h-10 w-10 rounded-full" src="{{ asset('images/moto.png') }}" alt="Motorcycle">
                       </div>
                       <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">{{ $motorcycle->motorcycle_name }}</div>
                       </div>
                    </div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $motorcycle->motorcycle_type }}</div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ asset('storage/' . $motorcycle->contract_pdf) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                    رخصة الدراجة النارية
                    </a>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                       <a href="/edit/{{ $motorcycle->id }}" class=" mx-5	 inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                             <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                             <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 10-2 0v8H4V4h7a1 1 0 100-2H4z" clip-rule="evenodd" />
                          </svg>
                          تعديل
                       </a>
                       <form id="deleteForm_{{ $motorcycle->id }}" action="/delete/{{ $motorcycle->id }}" method="POST" class="inline">
                          @csrf
                          @method('DELETE')
                          <button type="button" onclick="confirmDelete('{{ $motorcycle->id }}')" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
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
           </tbody>
        </table>
        <script>
           function confirmDelete(id) {
             if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
               document.getElementById('deleteForm_' + id).submit();
             }
           }
           
           function sortTable(columnIndex) {
             const table = document.querySelector("table tbody");
             const rows = Array.from(table.rows);
             const isAscending = table.getAttribute("data-sort-order") === "asc";
             const sortedRows = rows.sort((a, b) => {
               const aText = a.cells[columnIndex].innerText.trim();
               const bText = b.cells[columnIndex].innerText.trim();
               return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
             });
             table.setAttribute("data-sort-order", isAscending ? "desc" : "asc");
             while (table.firstChild) {
               table.removeChild(table.firstChild);
             }
             table.append(...sortedRows);
           }
        </script>
        <script>
           function confirmDelete(id) {
             if (confirm("هل أنت متأكد من أنك تريد الحذف؟")) {
               document.getElementById('deleteForm_' + id).submit();
             }
           }
        </script>
     </div>
  </div>
  @endif
</div>
</div>


@endsection

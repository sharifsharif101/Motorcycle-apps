<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8 text-center">الدراجات الخاصة بي {{ $user->name }}</h1>

    @if ($motorcycles->isEmpty())
      <p class="text-center text-gray-600 text-lg">لا توجد دراجات متاحة لهذا المستخدم.</p>
    @else
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
          <!-- Table Headers -->
          <thead>
            <tr>
              <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 bg-indigo-600 text-right text-xs font-semibold text-white uppercase tracking-wider">
                اسم الدراجة النارية
              </th>
              <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 bg-indigo-600 text-right text-xs font-semibold text-white uppercase tracking-wider">
                نوع / تصنيف الدراجة النارية
              </th>
              <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 bg-indigo-600 text-right text-xs font-semibold text-white uppercase tracking-wider">
                رخصة الدراجة النارية
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- Table Rows -->
            @foreach ($motorcycles as $motorcycle)
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 border-b border-gray-200 text-sm">
                <p class="text-gray-900">{{ $motorcycle->motorcycle_name }}</p>
              </td>
              <td class="px-6 py-4 border-b border-gray-200 text-sm">
                <p class="text-gray-900">{{ $motorcycle->motorcycle_type }}</p>
              </td>
              <td class="px-6 py-4 border-b border-gray-200 text-sm">
                <a href="{{ asset('storage/' . $motorcycle->contract_pdf) }}" class="text-indigo-500 hover:text-indigo-700" target="_blank">
                  رخصة الدراجة النارية
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</body>



</html>

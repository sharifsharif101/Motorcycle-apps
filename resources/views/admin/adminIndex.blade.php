
@extends('layout')

@section('title', 'index')

@section('content')
    
<div class="container mx-auto px-4 sm:px-8">

    <div class="py-8" style="display: flex; justify-content: center; align-items: center;">
        <h2 class="text-2xl font-semibold leading-tight">قائمة أصحاب الدراجات النارية</h2>
    </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <a href="{{ route('admin_dashboard') }}" class="btn btn-primary my-3">العودة إلى لوحة التحكم</a>

            <div class="inline-block py-20 min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-right">الرقم</th>
                            <th class="text-right">الاسم</th>
                            <th class="text-right">رقم الهوية الوطنية</th>
                            <th class="text-right">الايميل</th>
                            <th class="text-right">عدد الدرجات النارية</th>
                            <th class="text-right">الصورة الشخصية</th>
                            <th class="text-right">حالة المستخدم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td class="text-right">{{ $index + 1 }}</td>
                            <td class="text-right">
                                <a href="{{ route('motorcycle.show', ['id' => $user->id ?? '#']) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td class="text-right">{{ $user->national_id }}</td>
                            <td class="text-right">{{ $user->email }}</td>
                            <td class="text-right">{{ $user->motorcycles_count }}</td>
                            <td class="text-right">
                                <img src="{{ asset('storage/' . $user->personal_image) }}" alt="Personal Image"
                                     class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="text-right">
                                <a href="{{ route('user.changeStatus', ['id' => $user->id]) }}" class="btn btn-{{ $user->status ? 'success' : 'danger' }} btn-sm">
                                    {{ $user->status ? 'Enable' : 'Disable' }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</div>
</div>

@endsection
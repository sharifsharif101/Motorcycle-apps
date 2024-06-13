import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// update-profile-information-form.blade.php
// البروفايل دا نمنع منو اي تعديل في الاسم 

// ارجع ظبط الاستيل بتاع الصفحة دي بعدين 
// motorCycleCreate.blade.php

// عشان توصل ليها 
// http://localhost:8000/motorcycle
// لازم تكون مسجل 

// الدخول كأدمن 
// $obj->email= "admin@gmail.com";
// $obj->password= Hash::make("1234");
// php artisan db:seed 


// =======  الاستايل ============
// خلفية الجسم (Body Background Color):

// #f3f4f6
// لون النص الأساسي (Primary Text Color):

// #4a5568
// لون حدود الجدول (Table Border Color):

// #dee2e6
// لون النص في الجدول (Table Text Color):

// #212529
// لون خلفية رؤوس الجدول (Table Header Background Color):

// #343a40
// لون النص في رؤوس الجدول (Table Header Text Color):

// #ffffff
// لون الصفوف المتعاقبة في الجدول (Table Striped Rows Color):

// rgba(0, 0, 0, 0.05)
// لون الصف عند التمرير فوقه (Table Hover Row Color):

// rgba(0, 0, 0, 0.075)
// يمكنك نسخ هذه الأكواد واستخدامها حسب الحاجة في تصميمك.

// الكود الخارق للتحويل من اليسار الى اليمين 
// unicode-bidi: bidi-override !important;
// direction: unset !important;
// text-align:right;
{/* <div style="unicode-bidi: bidi-override !important; direction: unset !important; text-align:right;">
   <!-- Your content here -->
</div> */}
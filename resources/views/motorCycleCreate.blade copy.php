{{-- =====================================--}}


  @extends('layout')

@section('title', 'ادخال الدراجة النارية')

@section('content')  
<style>
    .center-div {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  
</style>
<div class="container">
           
    <div class="center-div">
        
       <div style="unicode-bidi: bidi-override !important; direction: unset !important; text-align:right;">
                
          <h2 class="my-5">أدخل الدراجة النارية</h2>
                @if ($errors->any())
                  
          <div class="alert alert-danger">
                       
             <ul>
                            @foreach ($errors->all() as $error)
                              
                <li>{{ $error }}</li>
                            @endforeach
                          
             </ul>
                     
          </div>
                @endif
                @if (session('success'))
                  
          <div class="alert alert-success" id="successMessage">
                       {{ session('success') }}
                     
          </div>
                  <script>
                       setTimeout(function() {
                         var successMessage = document.getElementById('successMessage');
                         if (successMessage) {
                           successMessage.style.display = 'none';
                         }
                       }, 3000);
                     
          </script>
                @endif
                <form action="{{ route('store_motorcycle') }}" method="post" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
                   
                   <div class="form-group mb-5">
                       <label for="motorcycle_name">اسم الدراجة النارية</label>
                       <input type="text" id="motorcycle_name" name="motorcycle_name" class="form-control">
                   </div>
                   
                   <div class="form-group mb-5">
                       <label for="motorcycle_type">نوع الدراجة النارية</label>
                       <input type="text" id="motorcycle_type" name="motorcycle_type" class="form-control">
                   </div>
                   
                   <div class="form-group mb-2">
                       <label for="contract_pdf">  pdf أرفق الرخصة الخاصة بهذه الدراجة </label>
                       <input type="file" id="contract_pdf" name="contract_pdf" class="form-control-file">
                   </div>
                   
                   <button type="submit" class="btn btn-primary">تسجيل</button>
               </form>
               
              
       </div>
           

         
    </div>
 </div>
 @endsection

{{-- ظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظظ --}}
{{-- /////////////// نسخة ممتازة --}}
{{-- <!DOCTYPE html>
<html lang="ar">
   <head>
        
      <meta charset="UTF-8">
        
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
      <title>إدخال الدراجة النارية</title>
        
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        
      <style>
             .center-div {
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
             }
           
      </style>
   </head>
   <body>
      <div class="container">
           
         <div class="center-div">
                
            <div style="unicode-bidi: bidi-override !important; direction: unset !important; text-align:right;">
                     
               <h2 class="my-5">أدخل الدراجة النارية</h2>
                     @if ($errors->any())
                       
               <div class="alert alert-danger">
                            
                  <ul>
                                 @foreach ($errors->all() as $error)
                                   
                     <li>{{ $error }}</li>
                                 @endforeach
                               
                  </ul>
                          
               </div>
                     @endif
                     @if (session('success'))
                       
               <div class="alert alert-success" id="successMessage">
                            {{ session('success') }}
                          
               </div>
                       <script>
                            setTimeout(function() {
                              var successMessage = document.getElementById('successMessage');
                              if (successMessage) {
                                successMessage.style.display = 'none';
                              }
                            }, 3000);
                          
               </script>
                     @endif
                     <form action="{{ route('store_motorcycle') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
                        
                        <div class="form-group mb-5">
                            <label for="motorcycle_name">اسم الدراجة النارية</label>
                            <input type="text" id="motorcycle_name" name="motorcycle_name" class="form-control">
                        </div>
                        
                        <div class="form-group mb-5">
                            <label for="motorcycle_type">نوع الدراجة النارية</label>
                            <input type="text" id="motorcycle_type" name="motorcycle_type" class="form-control">
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="contract_pdf">  pdf أرفق الرخصة الخاصة بهذه الدراجة </label>
                            <input type="file" id="contract_pdf" name="contract_pdf" class="form-control-file">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">تسجيل</button>
                    </form>
                    
                   
            </div>
                
     
              
         </div>
      </div>
   </body>
</html> --}}

{{-- /////////////// نهاية نسخة ممتازة --}}
 
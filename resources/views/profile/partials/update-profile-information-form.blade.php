<section>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div style="unicode-bidi: bidi-override !important; direction: unset !important; text-align:right;">

        <header style="text-align: -webkit-right;">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('المعلومات الشخصية') }}
            </h2>
    
            <div style="width:200px; height: 200px; border-radius: 50%; overflow: hidden; border: 3px solid black; margin: 20px 0;">
                <img src="{{ asset('storage/' . Auth::user()->personal_image) }}" alt="Personal Image" class="mt-2 rounded-full" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
         
            <button style="background-color: #007bff; color: #fff; border: none; padding: 0.375rem 0.75rem; border-radius: 0.25rem; cursor: pointer;">
                <a href="{{ route('motors.index', ['user' => auth()->user()->id]) }}" style="color: white; text-decoration: none;">الدراجات النارية </a>
            </button>
            
            <button style="background-color: #28a745; color: #fff; border: none; padding: 0.375rem 0.75rem; border-radius: 0.25rem; cursor: pointer;">
                <a href="{{route('crete_motorcycle')}}" style="color: white; text-decoration: none;"> اضافة دراجات نارية </a>
            </button>
            
    
    
     
    
            {{-- <button><a href="{{ route('motors.index') }}">showMymotoer </a></button> --}}
        </header>
    
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
    
        
    
        <form method="post" style="unicode-bidi: bidi-override !important; direction: unset !important; text-align:right;" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
    
            <div>
                <x-input-label for="name" :value="__('الإسم')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
    
            <div>
                <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
    
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('بريدك الإلكتروني غير مغعل') }}
    
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
    
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
    
            <div class=" items-center gap-4   justify-content-end "   >
                <x-primary-button >{{ __('حفظ') }}</x-primary-button>
    
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>

</section>
 
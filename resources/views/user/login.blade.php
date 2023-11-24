@extends('user.layouts.usermain')
@section('title', 'Login')
@section('usercontent')

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="flex flex-col items-center justify-center mt-16">
            <img class="max-h-24 " src="{{ asset('assets/images/logo-formadiksi.png') }}" alt="">
            <span class="text-xl font-semibold text-black mt-7 dark:text-white ">Selamat Datang</span>
            <span class="mt-3 text-black/50 dark:text-white/50 ">Silahkan login terlebih dahulu</span>
            @if (session()->has('loginError'))
                <div id="alert-login-error"
                    class="items-center p-4 mb-4 text-red-800 rounded-lg w-75 h-20flex bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-login-error" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                    <div class="w-56 text-sm font-medium ms-3">
                        {{ session('loginError') }}
                    </div>
                </div>
            @endif

            <input type="text" id="username" name="username"
                class=" mt-12 bg-gray-100 border border-gray-300 text-gray-900 rounded-md  block w-64 p-2.5"
                placeholder="Username" value="{{ old('username') }}">
            <input type="password" id="password" name="password"
                class=" mt-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-md  block w-64 p-2.5"
                placeholder="Password">
            <div class="flex items-center mt-4 justify-normal ">
                <input id="default-checkbox" type="checkbox" onclick="showPass()"
                    class="-ml-[105px] w-4 h-4 bg-gray-100 border-gray-300 rounded ">
                <label for="default-checkbox" class="text-sm text-gray-900 ms-2 dark:text-gray-300">Tampilkan
                    Password</label>
            </div>
            <button type="submit" class="w-64 py-3 mx-3 mt-10 text-white rounded-lg bg-slate-700 ">Login</button>
        </div>
    </form>

    <script>
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

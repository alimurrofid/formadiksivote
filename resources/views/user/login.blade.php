@extends('user.layouts.usermain')
@section('title', 'Login')
@section('usercontent')

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="flex flex-col items-center justify-center mt-16">
            <img class="max-h-24 " src="{{ asset('assets/images/logo-formadiksi.png') }}" alt="">
            <span class="text-xl font-semibold text-black mt-7 dark:text-white ">Selamat Datang</span>
            <span class="mt-3 text-black/50 dark:text-white/50 ">Silahkan login terlebih dahulu</span>
            <input type="text" id="username" name="username" required
                class=" mt-12 bg-gray-100 border border-gray-300 text-gray-900 rounded-md  block w-64 p-2.5"
                placeholder="Username" value="{{ old('username') }}">
            <input type="password" id="password" name="password" required
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

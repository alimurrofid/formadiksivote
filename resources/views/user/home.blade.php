@extends('user.layouts.usermain')
@section('title', 'Login')
@section('usercontent')
<div class="flex flex-wrap justify-between pt-10 md:mx-20 mx-7 md:my-20 my-10">
    <div class="md:basis-1/2 basis-full md:w-full w-[300px]">
        <div class="md:text-start text-center">
            <span class="md:text-5xl text-2xl font-semibold text-neutral-800 dark:text-white">Masa Depan Formadiksi dalam <span class="text-slate-700 dark:text-gray-400">Genggamanmu!</span></span>
        </div>
        <div class="md:mt-7 mt-4 md:w-[350px] w-[250px] md:mx-0 mx-auto md:text-start text-center ">
            <span class="text-black/50 font-medium md:text-base text-xs dark:text-white/60">Kita juga punya andil untuk menentukan masa depan Formadiksi</span>
        </div>
        <div class="md:mt-7 mt-4 md:text-start text-center">
            <a href="#" type="button" class="py-3 md:text-sm text-xs text-white rounded-lg bg-slate-700 md:px-9 px-5 ">Vote Caketum</a>
        </div>
    </div>
    <div class="relative md:mt-0 mt-14 md:mx-0 mx-auto">
        <div class="absolute rounded-[4px] z-40 bg-slate-500 p-1 md:px-4 px-3 -top-4 md:left-[35%] left-[28%]">
            <span class=" md:text-xs text-[10px] text-white">Video Tutorial Memilih</span>
        </div>
        <iframe class="rounded-md md:w-[500px] w-[300px] md:h-[265px] h-[165px]" src="https://www.youtube.com/embed/QFJhm2p7368?si=ZhO6G30vKX_g3z5T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>

@endsection

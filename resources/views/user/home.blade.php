@extends('user.layouts.usermain')
@section('title', 'Home')
@section('usercontent')
<div class="flex flex-wrap justify-between pt-10 my-10 lg:mx-20 mx-7 lg:my-20">
    <div class="basis-full lg:basis-1/2 w-[300px] lg:w-full">
        <div class="text-center lg:text-start">
            <span class="text-2xl font-semibold lg:text-5xl text-neutral-800 dark:text-white">Masa Depan Formadiksi dalam <span class="text-slate-700 dark:text-gray-400">Genggamanmu!</span></span>
        </div>
        <div class="lg:mt-7 mt-4 lg:w-[350px] w-[250px] lg:mx-0 mx-auto lg:text-start text-center ">
            <span class="text-xs font-medium text-black/50 lg:text-base dark:text-white/60">Kita juga punya andil untuk menentukan masa depan Formadiksi</span>
        </div>
        <div class="mt-4 text-center lg:mt-7 lg:text-start">
            <a href="{{route('login')}}" type="button" class="px-5 py-3 text-xs text-white rounded-lg lg:text-sm bg-slate-700 lg:px-9 ">Vote Caketum</a>
        </div>
    </div>
    <div class="relative mx-auto md:mt-10 lg:mt-0 mt-14 lg:mx-0">
        <div class="absolute rounded-[4px] z-40 bg-slate-500 p-1 lg:px-4 px-3 -top-4 lg:left-[35%] left-[28%]">
            <span class=" lg:text-xs text-[10px] text-white">Video Tutorial Memilih</span>
        </div>
        <iframe class="rounded-lg lg:w-[400px] w-[300px] lg:h-[265px] h-[165px]" src="https://www.youtube.com/embed/QFJhm2p7368?si=ZhO6G30vKX_g3z5T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>

@endsection

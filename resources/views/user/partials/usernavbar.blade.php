<nav class="py-3 bg-white shadow-lg md:bg-white dark:bg-neutral-900 md:dark:bg-neutral-900 px-7 md:px-28 dark:shadow-white/10">
    <div class="flex items-center justify-between">
        <div>

            <a href="#" class="">
                <img class="max-h-14" src="{{asset('assets/images/logo-formadiksi.png')}}" alt="">
            </a>
        </div>
        <div class="flex ">

            <button class="relative flex items-center h-5 transition md:ml-52 md:h-6 rounded-2xl" onclick="toggleTheme()">
                <div id="switch-toggle" class="w-6 h-6 md:w-7 md:h-7 mx-3 relative top-2 md:top-3.5 rounded-full bg-white text-black">
                    <ion-icon name="sunny"></ion-icon>
                </div>
            </button>

            <span class="block mx-2 text-3xl text-black cursor-pointer dark:text-white md:hidden">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>
            <div class="bg-white dark:bg-neutral-900">
                <ul
                    class="md:flex text-center md:items-center bg-white md:bg-white dark:bg-neutral-900 md:dark:bg-neutral-900 z-10 md:py-0 py-4 md:w-auto md:z-auto md:static absolute w-full left-0 md:opacity-100 opacity-0 top-[-400px]">
                    <li>
                        <a href="/" class="nav">Beranda</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}" class="nav">Vote</a>
                    </li>
                    <li>
                        <a href="{{route('quickcount')}}" class="nav">Quick Count</a>
                    </li>
                    <a href="{{route('login')}}" type="button" class="py-3 mx-3 text-sm text-white rounded-lg bg-slate-700 px-9 ">Login</a>
                </ul>
            </div>
        </div>

    </div>
</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name = "close", list.classList.add('top-[70px]'), list.classList.add('opacity-100')) : (e
            .name = "menu", list.classList.remove('top-[70px]'), list.classList.remove('opacity-100'))
    }
</script>

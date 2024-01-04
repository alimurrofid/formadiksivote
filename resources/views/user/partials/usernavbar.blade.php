<nav class="py-3 bg-white shadow-lg lg:bg-white dark:bg-neutral-900 lg:dark:bg-neutral-900 px-7 lg:px-28 dark:shadow-white/10">
    <div class="flex items-center justify-between">
        <div>

            <a href="#" class="">
                <img class="max-h-14" src="{{asset('assets/images/logo-formadiksi.png')}}" alt="">
            </a>
        </div>
        <div class="flex ">

            <button class="relative flex items-center h-5 transition lg:ml-52 lg:h-6 rounded-2xl" onclick="toggleTheme()">
                <div id="switch-toggle" class="w-6 h-6 lg:w-7 lg:h-7 mx-3 relative top-2 lg:top-3.5 rounded-full bg-white text-black">
                    <ion-icon name="sunny"></ion-icon>
                </div>
            </button>

            <span class="block mx-2 text-3xl text-black cursor-pointer dark:text-white lg:hidden">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>
            <div class="bg-white dark:bg-neutral-900 ">
                <ul
                    class="shadow-md lg:shadow-none lg:flex text-center lg:items-center bg-white lg:bg-white dark:bg-neutral-900 lg:dark:bg-neutral-900 z-50 md:py-0 py-4 lg:w-auto lg:z-auto lg:static absolute w-full left-0 lg:opacity-100 opacity-0 top-[-400px]">
                    <li>
                        <a href="/" class="nav">Beranda</a>
                    </li>
                    <li>
                        <a href="{{route('user.vote')}}" class="nav">Vote</a>
                    </li>
                    <li>
                        <a href="{{route('quickcount')}}" class="nav">Quick Count</a>
                    </li>
                    <a href="{{route('login')}}" type="button" class="py-3 mb-5 lg:mb-0 mx-3 text-sm text-white rounded-lg bg-slate-700 px-9 ">Login</a>
                </ul>
            </div>
        </div>

    </div>
</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name = "close", list.classList.add('top-[70px]'), list.classList.add('shadow-md'), list.classList.add('opacity-100')) : (e
            .name = "menu", list.classList.remove('top-[70px]'), list.classList.remove('opacity-100'), list.classList.remove('shadow-md'))
    }
</script>

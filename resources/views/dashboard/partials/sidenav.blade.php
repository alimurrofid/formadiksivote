<!-- sidenav  -->
<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="#">
            <img src="{{ asset('assets/images/logo-formadiksi.png') }}"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                alt="main_logo" />
            <img src="{{ asset('assets/images/logo-formadiksi.png') }}"
                class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Pilketum Formadiksi</span>
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('dashboard.home') ? 'font-semibold text-slate-700 rounded-lg bg-blue-500/13' : '' }}"
                    href="{{ route('dashboard.home') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-indigo-700 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('candidate.index', 'candidate.create', 'candidate.edit') ? 'font-semibold text-slate-700 rounded-lg bg-blue-500/13' : '' }}"
                    href="{{ route('candidate.index') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-circle-08"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Candidate</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('user.index') ? 'font-semibold text-slate-700 rounded-lg  bg-blue-500/13' : '' }}"
                    href="{{ route('user.index') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">User</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('hope.index') ? 'font-semibold text-slate-700 rounded-lg bg-blue-500/13' : '' }}"
                    href="{{ route('hope.index') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-send"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Hope</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p
            class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400">
        </p>
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border"
            sidenav-card>
            <img class="w-1/2 mx-auto" src="{{ asset('assets/img/illustrations/icon-documentation.svg') }}"
                alt="sidebar illustrations" />
            <div class="flex-auto w-full p-4 pt-0 text-center">
                <div class="transition-all duration-200 ease-nav-brand">
                    <h6 class="mb-0 dark:text-white text-slate-700">Need help?</h6>
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Please check our
                        docs</p>
                </div>
            </div>
        </div>
        <!-- Button Start Voting  -->
        @if ($VoteSession->session_run == 0)
            <form action="{{ route('start-voting', $VoteSession->id) }}" method="post"
                id="start-form-{{ $VoteSession->id }}">
                @csrf
                <button type="button" onclick="confirmStart({{ $VoteSession->id }})"
                    data-tooltip-target="tooltip-start"
                    class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in bg-green-600 rounded-lg shadow-md bg-150 hover:shadow-xs hover:-translate-y-px"><i
                        class="pr-2 fa-solid fa-circle-play"></i>Start</button>
                <div id="tooltip-start" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Mulai Pemilihan
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </form>
        @else
            <form id="stop-form-{{ $VoteSession->id }}" action="{{ route('start-voting', $VoteSession->id) }}"
                method="post">
                @csrf
                <button type="button" onclick="confirmStop({{ $VoteSession->id }})" data-tooltip-target="tooltip-stop"
                    class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in bg-red-600 rounded-lg shadow-md bg-150 hover:shadow-xs hover:-translate-y-px"><i
                        class="pr-2 fa-solid fa-circle-stop"></i>Stop</button>
                <div id="tooltip-stop" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Hentikan Pemilihan
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </form>
        @endif
        <!-- Button Countdown-->
        <a href="{{ route('countdown') }}" target="_blank" data-tooltip-target="tooltip-countdown"
            class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in bg-yellow-400 rounded-lg shadow-md bg-150 hover:shadow-xs hover:-translate-y-px"><i
                class="pr-2 fa-solid fa-hourglass-start"></i>Countdown</a>
        <div id="tooltip-countdown" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Hitung Mundur Pemilihan
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <!-- Button Documentation-->
        <a href="https://linktr.ee/FormadiksiMroyek" data-tooltip-target="tooltip-documentation" target="_blank"
            class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Documentation</a>
        <div id="tooltip-documentation" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Dokumentasi Penggunaan Website
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

    </div>
</aside>
<!-- end sidenav -->

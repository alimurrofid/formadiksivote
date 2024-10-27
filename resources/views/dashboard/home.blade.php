@extends('dashboard.layouts.dashboardmain')
@section('title', 'Home')
@section('content')
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
            data-tooltip-target="tooltip-candidate">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row ">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-lg font-semibold leading-normal uppercase truncate dark:text-white dark:opacity-60">
                                    Candidate</p>
                                <h5 class="text-4xl font-bold dark:text-white counter">{{ $candidate_count }}</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right">
                            <div
                                class="inline-block w-16 h-16 text-center mt-1.5 rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="relative text-3xl text-white fa-solid fa-user-tie top-3.5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tooltip-candidate" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
            Jumlah Kandidat
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
            data-tooltip-target="tooltip-userall">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row ">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-lg font-semibold leading-normal uppercase truncate dark:text-white dark:opacity-60">
                                    All Users</p>
                                <h5 class="text-4xl font-bold dark:text-white counter">{{ $user_count }}</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right">
                            <div
                                class="inline-block w-16 h-16 text-center mt-1.5 rounded-circle bg-gradient-to-tl  from-red-600 to-orange-600">
                                <i class="relative text-3xl text-white fa-solid fa-users top-3.5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tooltip-userall" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
            Jumlah Semua User
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
            data-tooltip-target="tooltip-uservote">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row ">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-lg font-semibold leading-normal uppercase truncate dark:text-white dark:opacity-60">
                                    Already Vote</p>
                                <h5 class="text-4xl font-bold dark:text-white counter">{{ $user_voted }}</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right">
                            <div
                                class="inline-block w-16 h-16 text-center mt-1.5 rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="relative text-3xl text-white fa-solid fa-user-check top-3.5 left-0.5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tooltip-uservote" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
            Jumlah User yang Sudah Memilih
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <!-- card4-->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
            data-tooltip-target="tooltip-usernotvote">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row ">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-lg font-semibold leading-normal uppercase truncate dark:text-white dark:opacity-60">
                                    Not yet Vote</p>
                                <h5 class="text-4xl font-bold dark:text-white counter">{{ $user_not_voted }}</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right">
                            <div
                                class="inline-block w-16 h-16 text-center mt-1.5 rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                <i class="relative text-3xl text-white fa-solid fa-user-xmark top-3.5 left-0.5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tooltip-usernotvote" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
            Jumlah User yang Belum Memilih
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

    </div>

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <!-- Chart Quick vote -->
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Quick Vote</h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <i class="fa fa-arrow-up text-emerald-500"></i>
                        Bar Chart Candidate Vote
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="QuickCount" class="h-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart Quick vote -->

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div slider class="relative w-full h-full overflow-hidden rounded-2xl">
                <!-- slide 1 -->
                <div slide class="absolute w-full h-full transition-all duration-500">
                    <img class="object-cover h-full" src="./assets/img/carousel-1.jpg" alt="carousel image" />
                    <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                        <div
                            class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                            <i class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
                        </div>
                        <h5 class="mb-1 text-white">Get started with Argon</h5>
                        <p class="dark:opacity-80">There’s nothing I really wanted to do in life that I wasn’t
                            able to get good at.</p>
                    </div>
                </div>

                <!-- slide 2 -->
                <div slide class="absolute w-full h-full transition-all duration-500">
                    <img class="object-cover h-full" src="./assets/img/carousel-2.jpg" alt="carousel image" />
                    <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                        <div
                            class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                            <i class="top-0.75 text-xxs relative text-slate-700 ni ni-bulb-61"></i>
                        </div>
                        <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                        <p class="dark:opacity-80">That’s my skill. I’m not really specifically talented at
                            anything except for the ability to learn.</p>
                    </div>
                </div>

                <!-- slide 3 -->
                <div slide class="absolute w-full h-full transition-all duration-500">
                    <img class="object-cover h-full" src="./assets/img/carousel-3.jpg" alt="carousel image" />
                    <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                        <div
                            class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                            <i class="top-0.75 text-xxs relative text-slate-700 ni ni-trophy"></i>
                        </div>
                        <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                        <p class="dark:opacity-80">Don’t be afraid to be wrong because you can’t learn anything
                            from a compliment.</p>
                    </div>
                </div>

                <!-- Control buttons -->
                <button btn-next
                    class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 active:scale-110 top-6 right-4"><i
                        class="fa-solid fa-chevron-right"></i></button>
                <button btn-prev
                    class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 active:scale-110 top-6 right-16"><i
                        class="fa-solid fa-chevron-left"></i></button>
            </div>
        </div>
    </div>



    @include('dashboard.partials.footer')
@endsection
@push('customJS')
    {{-- countUp.js --}}
    <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js"></script>
    <script>
        const counterUp = window.counterUp.default;

        const callback = entries => {
            entries.forEach(entry => {
                const el = entry.target;
                if (entry.isIntersecting && !el.classList.contains('is-visible')) {
                    counterUp(el, {
                        duration: 1000,
                        delay: 6,
                    });
                    el.classList.add('is-visible');
                }
            });
        };

        const IO = new IntersectionObserver(callback, {
            threshold: 1
        });

        // Mengamati setiap elemen dengan kelas 'counter'
        const elements = document.querySelectorAll('.counter');
        elements.forEach(el => {
            IO.observe(el);
        });
    </script>

    {{-- Chart.js --}}
    <script>
        var ctx = document.getElementById("QuickCount");
        var QuickCount = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Vote',
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: ["#e53844", "#ecad48", "#3376bd", "#00798c", "#52499c"],
                    borderColor: 'rgb(255, 99, 132)',
                    data: [],
                }]
            },
            options: {
                responsive: true,
            }
        });
        var updateChart = function() {
            $.ajax({
                url: "{{ route('api.chart') }}",
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    QuickCount.data.labels = data.name;
                    QuickCount.data.datasets[0].data = data.vote_count;
                    QuickCount.update();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        updateChart();
        setInterval(() => {
            updateChart();
        }, 5000);
    </script>
@endpush

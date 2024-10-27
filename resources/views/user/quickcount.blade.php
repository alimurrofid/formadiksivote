@extends('user.layouts.usermain')
@section('title', 'Quick Count')
@section('usercontent')
    <div class="flex flex-col items-center justify-center mb-10 mt-14">
        <span class="text-sm font-semibold text-black/50 dark:text-white/70">Quick Count Pilketum Formadiksi</span>
        <span class="mx-16 mt-3 text-base font-semibold text-center text-black xl:mx-0 xl:text-xl dark:text-white">Yuk Pantau Perolehan Suara <span class="text-slate-700 dark:text-gray-400">Kandidat</span> Pilihanmu!</span>

        <!-- Chart Quick vote -->
        <div class="w-full max-w-full px-3 mt-5 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-neutral-900 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border dark:shadow-lg dark:shadow-white/10">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Quick Count</h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <i class="fa fa-arrow-up text-emerald-500"></i>
                        Bar Chart Candidate Vote
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="QuickCount" class="h-full bg-white dark:bg-neutral-900 text-black/50 dark:text-white/70"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart Quick vote -->
    </div>
@endsection
@push('customJS')
    <script src="{{ asset('assets/vendor/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
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

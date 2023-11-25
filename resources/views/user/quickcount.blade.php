@extends('user.layouts.usermain')
@section('title', 'Voting')
@section('usercontent')
    <div class="flex flex-col items-center justify-center mb-10 mt-14">
        <span class="text-sm font-semibold text-black/50 ">Quick Count Pilketum Formadiksi</span>
        <span class="mt-3 text-xl font-semibold text-black">Yuk Pantau Perolehan Suara Kandidat Pilihanmu!</span>

        <!-- Chart Quick vote -->
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Quick Count</h6>
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
        }, 1000);
    </script>
@endpush

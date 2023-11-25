@extends('user.layouts.usermain')
@section('title', 'Voting')
@section('usercontent')
    <div class="flex flex-col items-center justify-center mt-5">
        <p class="mt-3 text-xl font-semibold text-black ">Selamat Kepada <span
                class="font-bold text-red-600 underline">{{ $candidate->name }}</span> Sebagai Ketua Umum Terpilih!</p>

        <!-- Card Candidates -->
        <div class="flex flex-wrap items-center justify-center mx-auto gap-7 mt-7">
            <div class="max-w-sm bg-white border border-black rounded-md shadow w-72 dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-md w-72 h-[384px]" src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}"
                    alt="{{ $candidate->name }}" />
                <div class="flex flex-col items-center justify-center mt-2 ">
                    <span class="text-black/50">Kandidat #{{ $candidate->voting_number }}</span>
                    <span class="mt-1 text-lg font-semibold text-black">{{ $candidate->name }}</span>
                    <span class="mt-1 mb-6 text-sm text-black/50">{{ $candidate->major }} /
                        {{ $candidate->department }}</span>
                </div>
            </div>
            <!-- End Card Candidates -->
        </div>
        <a href="{{ route('quickcount') }}" class="mt-4 text-lg font-semibold text-red-500 underline">Lihat Detail</a>
    </div>
@endsection
@push('customJS')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.1/dist/confetti.browser.min.js"></script>
    <script>
        // do this for 30 seconds
        var duration = 30 * 1000;
        var end = Date.now() + duration;

        (function frame() {
            // launch a few confetti from the left edge
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: {
                    x: 0
                }
            });
            // and launch a few from the right edge
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: {
                    x: 1
                }
            });

            // keep going until we are out of time
            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        }());
    </script>
@endpush

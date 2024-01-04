@extends('user.layouts.usermain')
@section('title', 'Countdown')
@section('usercontent')
    <div class="flex flex-col items-center justify-center">
        <div class="z-10">
            <div id="startButton"
                class="flex items-center justify-center w-40 h-40 mt-56 text-4xl font-bold text-white transition duration-300 ease-in-out bg-green-500 rounded-full shadow-lg cursor-pointer hover:bg-blue-700 hover:shadow-indigo-600/60">
                Start
            </div>
        </div>


        <div class="relative top-28">
            <div id="countdown" class="hidden">
                <div id="countdownCircle"
                    class="border-t-8 border-blue-400 border-solid rounded-full h-96 animate-spin w-96 -z-10"></div>
                <div id="countdownText"
                    class="absolute z-10 flex mx-auto mb-10 font-bold transform -translate-x-1/2 -translate-y-1/2 text-slate-400 text-9xl justify-items-center top-1/2 left-1/2">
                </div>
            </div>
        </div>

        <div id="card" class="hidden mt-3">
            <p class="text-xl font-semibold text-black dark:text-white">Selamat Kepada <span
                    class="font-bold text-blue-600 underline">{{ $candidate->name }}</span> Sebagai Ketua Umum Terpilih!</p>

            <div class="flex flex-wrap items-center justify-center mx-auto gap-7 mt-7">
                <!-- Card Candidates -->
                <div
                    class="max-w-sm bg-white border border-black rounded-md shadow w-72 dark:bg-neutral-900 dark:border-white">
                    <img class="rounded-t-md w-72 h-[384px]"
                        src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}" alt="{{ $candidate->name }}" />
                    <div class="flex flex-col items-center justify-center mt-2">
                        <span class="text-black/50 dark:text-white/70">Kandidat #{{ $candidate->voting_number }}</span>
                        <span class="mt-1 text-lg font-semibold text-black dark:text-white">{{ $candidate->name }}</span>
                        <span class="mt-1 mb-6 text-sm text-black/50 dark:text-white/70">{{ $candidate->major }} /
                            {{ $candidate->department }}</span>
                    </div>
                </div>
                <!-- End Card Candidates -->
            </div>

            <a href="{{ route('quickcount') }}"
                class="flex justify-center mt-4 text-lg font-semibold text-blue-500 underline">Lihat Detail</a>
        </div>
    </div>

@endsection
@push('customJS')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.1/dist/confetti.browser.min.js"></script>
    <script>
        document.getElementById('startButton').addEventListener('click', startCountdown);

        function startCountdown() {
            // Sembunyikan tombol mulai
            document.getElementById('startButton').classList.add('hidden');

            // Tampilkan countdown
            const countdownElement = document.getElementById('countdown');
            countdownElement.classList.remove('hidden');

            // Mulai countdown dari 5 ke 0
            let countdownValue = 5;
            updateCountdownText(countdownValue);

            const countdownInterval = setInterval(() => {
                countdownValue--;

                if (countdownValue >= 1) {
                    updateCountdownText(countdownValue);
                } else {
                    // Countdown selesai, sembunyikan countdown dan tampilkan card
                    clearInterval(countdownInterval);
                    countdownElement.classList.add('hidden');
                    showCard();
                    startConfetti();
                }
            }, 1000);
        }

        function updateCountdownText(value) {
            document.getElementById('countdownText').innerText = value;
        }

        function showCard() {
            const cardElement = document.getElementById('card');
            cardElement.classList.remove('hidden');
        }

        function startConfetti() {
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
        }
    </script>
@endpush

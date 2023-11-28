@extends('user.layouts.usermain')
@section('title', 'Voting')
@section('usercontent')
    <div class="flex flex-col items-center justify-center mb-10 mt-14">
        <span class="text-sm font-semibold text-black/50 ">Pemilihan Ketua Umum Formadiksi</span>
        <span class="mt-3 text-xl font-semibold text-black ">Yuk Kenali Kandidat Pilihanmu!</span>

        @foreach ($candidates as $candidate)
            <!-- Card Candidates -->
            <div class="flex flex-wrap items-center justify-center mx-auto gap-7 mt-7">
                <div
                    class="max-w-sm bg-white border border-black rounded-md shadow w-72 dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-md w-72 h-[384px]"
                        src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}" alt="{{ $candidate->name }}" />
                    <div class="flex flex-col items-center justify-center mt-7 ">
                        <span class="text-black/50">Kandidat #{{ $candidate->voting_number }}</span>
                        <span class="mt-2 text-lg font-semibold text-black">{{ $candidate->name }}</span>
                        <span class="mt-2 text-sm text-black/50">{{ $candidate->major }} /
                            {{ $candidate->department }}</span>
                        <button class="mt-3 underline" data-modal-target="visimisi{{ $candidate->id }}"
                            data-modal-toggle="visimisi{{ $candidate->id }}">Lihat
                            Visi dan Misi</button>
                        <button data-modal-target="vote{{ $candidate->id }}" data-modal-toggle="vote{{ $candidate->id }}"
                            type="button"
                            class="px-10 py-2 mx-3 my-3 text-sm text-white rounded-lg bg-slate-700 ">Vote</button>
                    </div>
                    <!-- Main modal -->
                    <div id="visimisi{{ $candidate->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-center p-4 rounded-t md:p-5 ">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Informasi Kandidat #{{ $candidate->voting_number }}
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <div class="flex flex-col items-center justify-center p-4 space-y-4 md:p-5">
                                    <img class="max-h-32"
                                        src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}"
                                        alt="{{ $candidate->name }}">
                                    <span class="mt-2 text-lg font-semibold text-black">{{ $candidate->name }}</span>
                                    <span class="mt-2 text-sm text-black/50">{{ $candidate->major }} /
                                        {{ $candidate->department }}</span>
                                    <div class="flex flex-col items-center justify-center">
                                        <p class="text-center">{{ $candidate->vision }}</p>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center justify-center p-4 md:p-5">
                                    <button data-modal-hide="visimisi{{ $candidate->id }}" type="button"
                                        class="py-3 mx-3 text-sm text-white rounded-lg bg-slate-700 px-9 ">
                                        Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main modal -->
                    <div id="vote{{ $candidate->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-center p-4 rounded-t md:p-5 ">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Kamu yakin ingin memilih :
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('vote.candidate') }}" method="post">
                                    @csrf
                                    <div class="flex flex-col items-center justify-center p-4 space-y-4 md:p-5">
                                        <img class="max-h-32"
                                            src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}"
                                            alt="{{ $candidate->name }}">
                                        <span class="mt-2 text-lg font-semibold text-black">{{ $candidate->name }}</span>
                                        <span class="mt-2 text-sm text-black">Sebagai ketua umum Formadiksi?</span>
                                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                        <textarea id="message" rows="4" name="desire"
                                            class="max-h-60 min-h-[100px] block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                                            placeholder="Tuliskan harapan kamu..."></textarea>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center justify-center p-4 md:p-5">

                                        <button data-modal-hide="vote" type="submit"
                                            class="py-3 mx-3 text-sm text-white rounded-lg bg-slate-700 px-9 ">
                                            Yakin</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card Candidates -->
        @endforeach

    </div>
@endsection

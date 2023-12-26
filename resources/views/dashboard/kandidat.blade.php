@extends('dashboard.layouts.dashboardmain')
@section('title', 'Candidate')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 flex justify-between">
                    <h5 class="mb-0 dark:text-white">Table Candidate</h5>
                    <div class="flex">
                        <!-- Button Add Candidate -->
                        <button data-modal-target="add-candidate-modal" data-modal-toggle="add-candidate-modal" type="button"
                            data-tooltip-target="tooltip-addcandidate"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                            Candidate</button>
                        <div id="tooltip-addcandidate" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Tambahkan Kandidat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!-- End Button Add Candidate -->
                    </div>
                </div>
                <!-- Modal Create -->
                <div id="add-candidate-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Add candidate
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="add-candidate-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('candidate.store') }}" class="p-4 md:p-5" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="col-span-2">
                                        <label for="voting_number"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                            Urut</label>
                                        <input type="text" name="voting_number" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('voting_number') is-invalid @enderror"
                                            placeholder="eg. 1" value="{{ old('voting_number') }}">
                                        @error('voting_number')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="photo"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                        <input id="filepondInput" type="file" name="photo" required
                                            class="items-center justify-center @error('photo') is-invalid @enderror">
                                        @error('photo')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="photo">PNG, JPG or
                                            JPEG (MAX. 2MB).</p>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="name" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500  @error('name') is-invalid @enderror"
                                            placeholder="eg. Ali Murofid" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="major"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                        <input type="text" name="major" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('major') is-invalid @enderror"
                                            placeholder="eg. Teknologi Informasi" value="{{ old('major') }}">
                                        @error('major')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="department"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                                        <input type="text" name="department" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('department') is-invalid @enderror"
                                            placeholder="eg. D-IV Teknik Informatika" value="{{ old('department') }}">
                                        @error('department')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="vision"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi
                                            Misi</label>
                                        <textarea required class="summernote" name="vision" rows="4" class="@error('vision') is-invalid @enderror"
                                            value="{!! old('vision') !!}"></textarea>
                                        @error('vision')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="pr-2 fa-solid fa-plus"></i>
                                    Add candidate
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Create -->



                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Kandidat</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jurusan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Prodi</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Visi Misi</th>
                                    <th
                                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $candidate->voting_number }}</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-7 w-7 md:h-9 md:w-9 rounded-xl"
                                                        alt="{{ $candidate->name }}" />
                                                </div>
                                                <div class="flex items-center justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $candidate->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                    {{ $candidate->major }}</h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                    {{ $candidate->department }}</h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 shadow-transparent">
                                            <!-- Button Show Candidate -->
                                            <span class="flex items-center justify-center">
                                                <button data-modal-target="modal1{{ $candidate->id }}"
                                                    data-tooltip-target="tooltip-vision{{ $candidate->id }}"
                                                    data-modal-toggle="modal1{{ $candidate->id }}"
                                                    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    type="button">Show</button>
                                                <div id="tooltip-vision{{ $candidate->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    Lihat Visi Misi
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </span>
                                            <!-- End Button Show Candidate -->

                                            <!-- Modal Show Candidate -->
                                            <div id="modal1{{ $candidate->id }}" tabindex="-1" aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full p-4">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Visi & Misi
                                                            </h3>
                                                            <button type="button"
                                                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="modal1{{ $candidate->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="relative p-4 space-y-4 md:p-5 ">
                                                            <div>
                                                                <p
                                                                    class="leading-relaxed text-gray-500 dark:text-gray-400">
                                                                    {!! $candidate->vision !!}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                                            <button data-modal-hide="modal1{{ $candidate->id }}"
                                                                type="button"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Show Candidate -->
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <!-- Button Edit Candidate -->
                                                <button data-modal-target="edit-candidate-modal{{ $candidate->id }}"
                                                    data-modal-toggle="edit-candidate-modal{{ $candidate->id }}"
                                                    type="button" data-tooltip-target="tooltip-edit{{ $candidate->id }}"
                                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">Edit</button>
                                                <div id="tooltip-edit{{ $candidate->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    Edit Kandidat
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                                <!-- End Button Edit Candidate -->

                                                <!-- Modal Edit -->
                                                <div id="edit-candidate-modal{{ $candidate->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full p-4">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                                <h3 id="candidateEditModal{{ $candidate->id }}"
                                                                    class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                    edit candidate
                                                                </h3>
                                                                <button type="button"
                                                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-toggle="edit-candidate-modal{{ $candidate->id }}">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form action="{{ route('candidate.update', $candidate->id) }}"
                                                                class="p-4 md:p-5" enctype="multipart/form-data"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                                    <div class="col-span-2">
                                                                        <label for="voting_number"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                                                            Urut</label>
                                                                        <input type="text" name="voting_number"
                                                                            required
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('voting_number') is-invalid @enderror"
                                                                            placeholder="eg. 1"
                                                                            value="{{ old('voting_number', $candidate->voting_number) }}">
                                                                        @error('voting_number')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="photo"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                                                        {{-- image old show --}}
                                                                        <img src="{{ asset('storage/public/Candidate/' . $candidate->photo) }}"
                                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-7 w-7 md:h-9 md:w-9 rounded-xl"
                                                                            alt="{{ $candidate->name }}" />
                                                                        {{-- end image old show --}}
                                                                        <input id="filepondEdit" type="file" required
                                                                            name="photo"
                                                                            class="@error('photo') is-invalid @enderror"
                                                                            value="{{ old('photo', $candidate->photo) }}">
                                                                        @error('photo')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                                                            id="photo">PNG, JPG or JPEG (MAX. 2MB).</p>
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                        <input type="text" name="name" required
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') is-invalid @enderror"
                                                                            placeholder="eg. Ali Murofid"
                                                                            value="{{ old('name', $candidate->name) }}">
                                                                        @error('name')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="major"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                                                        <input type="text" name="major" required
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('major') is-invalid @enderror"
                                                                            placeholder="eg. Teknologi Informasi"
                                                                            value="{{ old('major', $candidate->major) }}">
                                                                        @error('major')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="department"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                                                                        <input type="text" name="department" required
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('department') is-invalid @enderror"
                                                                            placeholder="eg. D-IV Teknik Informatika"
                                                                            value="{{ old('department', $candidate->department) }}">
                                                                        @error('department')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="vision"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi
                                                                            Misi</label>
                                                                        <textarea required class="summernote" name="vision" rows="4" class="@error('vision') is-invalid @enderror">{!! old('vision', $candidate->vision) !!}</textarea>
                                                                        @error('vision')
                                                                            <div class="mt-2 text-sm text-red-500">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <button type="submit" data-id="{{ $candidate->id }}"
                                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                    <i class="pr-2 fa-regular fa-pen-to-square"></i>
                                                                    Edit candidate
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit -->

                                                <!-- Button Delete Candidate -->
                                                <a href="{{ route('candidate.destroy', $candidate->id) }}"
                                                    data-tooltip-target="tooltip-delete{{ $candidate->id }}"
                                                    class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                    data-confirm-delete="true">Delete</a>
                                                <div id="tooltip-delete{{ $candidate->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    Hapus Kandidat
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                                <!-- End Button Delete Candidate -->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection
@push('customCSS')
    <!-- filepond css -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.css') }}">
@endpush
@push('customJS')
    <!-- Argon -->
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

    <!-- filepond js -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('assets/vendor/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/summernote-custom.js') }}"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.getElementById('filepondInput');
        const editElement = document.getElementById('filepondEdit');
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
        );
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        const editPond = FilePond.create(editElement);
        FilePond.setOptions({
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            maxFileSize: '2MB',
            server: {
                // timeout: 7000,
                process: '/tmp-upload',
                revert: '/tmp-delete',
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
        });
    </script>
@endpush

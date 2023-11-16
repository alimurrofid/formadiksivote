@extends('dashboard.layouts.dashboardmain')
@section('title', 'kandidat')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 flex justify-between">
                    <h5 class="mb-0 dark:text-white">Tabel Kandidat</h5>
                    <div class="flex">
                        <button data-modal-target="add-kandidat-modal" data-modal-toggle="add-kandidat-modal" type="button"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                            User</button>
                        <button type="button"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Import</button>
                        <button type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete
                            All</button>
                    </div>
                </div>
                <!-- Modal Create -->
                <div id="add-kandidat-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Add Kandidat
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="add-kandidat-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="#" class="p-4 md:p-5">
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="col-span-2">
                                        <label for="no"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                            Urut</label>
                                        <input type="text" name="no"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="eg. 1">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="foto"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="foto" id="file_input" type="file">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="foto">SVG,
                                            PNG, JPG or GIF (MAX. 800x400px).</p>

                                    </div>
                                    <div class="col-span-2">
                                        <label for="nama"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="nama"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="eg. Ali Murofid">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="jurusan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                        <input type="text" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="eg. Teknologi Informasi">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="prodi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                                        <input type="text" name="prodi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="eg. D-IV Teknik Informatika">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="visimisi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi
                                            Misi</label>
                                        <textarea id="visimisi" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write your thoughts here..."></textarea>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i class="pr-2 fa-solid fa-plus"></i>
                                    Add Kandidat
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
                                <tr>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">1</span>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/team-2.jpg') }}"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-7 w-7 md:h-9 md:w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                            <div class="flex items-center justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">Ropid gans</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">Teknologi Informasi
                                            </h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">Teknik Informatika</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 shadow-transparent">
                                        <span class="flex items-center justify-center">
                                            <button data-modal-target="modal1" data-modal-toggle="modal1"
                                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">Show</button>
                                        </span>

                                        <div id="modal1" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-2xl max-h-full p-4">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Visi & Misi
                                                        </h3>
                                                        <button type="button"
                                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="modal1">
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
                                                            <span class="text-xl font-bold">Visi</span>
                                                            <p class="leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                                Officiis, dolores provident aliquam accusantium dolorem
                                                                doloremque, libero id voluptas at eligendi quaerat odit
                                                                quasi aperiam porro. Quas, labore! Id, nostrum vel.
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <span class="text-xl font-bold">Misi</span>
                                                            <p class="leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                                Officiis, dolores provident aliquam accusantium dolorem
                                                                doloremque, libero id voluptas at eligendi quaerat odit
                                                                quasi aperiam porro. Quas, labore! Id, nostrum vel.
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                                        <button data-modal-hide="modal1" type="button"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                            <button type="button"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">2</span>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/team-2.jpg') }}"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-7 w-7 md:h-9 md:w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                            <div class="flex items-center justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">Ropid ganszz</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">Teknologi Informasi
                                            </h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm text-left bg-transparent border-b align-center dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">Teknik Informatika</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 shadow-transparent">
                                        <span class="flex items-center justify-center">
                                            <button data-modal-target="modal2" data-modal-toggle="modal2"
                                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">Show</button>
                                        </span>

                                        <div id="modal2" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-2xl max-h-full p-4">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Visi & Misi
                                                        </h3>
                                                        <button type="button"
                                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="modal2">
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
                                                            <span class="text-xl font-bold">Visi</span>
                                                            <p class="leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                                Officiis, dolores provident aliquam accusantium dolorem
                                                                doloremque, libero id voluptas at eligendi quaerat odit
                                                                quasi aperiam porro. Quas, labore! Id, nostrum vel.
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <span class="text-xl font-bold">Misi</span>
                                                            <p class="leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                                Officiis, dolores provident aliquam accusantium dolorem
                                                                doloremque, libero id voluptas at eligendi quaerat odit
                                                                quasi aperiam porro. Quas, labore! Id, nostrum vel.
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                                                        <button data-modal-hide="modal2" type="button"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                            <button type="button"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('dashboard.layouts.footer')
        </div>
    </div>
@endsection

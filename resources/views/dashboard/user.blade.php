@extends('dashboard.layouts.dashboardmain')
@section('title', 'User')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 flex justify-between">
                    <h5 class="mb-0 dark:text-white">Table User</h5>
                    <div class="sm:flex">
                        <!-- Button Add User-->
                        <button data-modal-target="add-user-modal" data-modal-toggle="add-user-modal" type="button"
                            data-tooltip-target="tooltip-adduser"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                            User</button>
                        <div id="tooltip-adduser" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Tambahkan User
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!-- End Button Add User-->

                        <!-- Button Import User-->
                        <button type="button" data-modal-target="import-user-modal" data-modal-toggle="import-user-modal"
                            data-tooltip-target="tooltip-import"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Import</button>
                        <div id="tooltip-import" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Import User dari Excel
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!-- End Button Import User-->

                        <!-- Modal Import-->
                        <div id="import-user-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Import User
                                        </h3>
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="import-user-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('user.import-users') }}" class="p-4 md:p-5" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid grid-cols-2 gap-4 mb-4">
                                            <div class="col-span-2">
                                                <label for="file"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Import</label>
                                                <input type="file" name="file" required
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('file') is-invalid @enderror">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">XLS, XLXS or CSV.
                                                </p>
                                                @error('file')
                                                    <div class="mt-2 text-sm text-red-500">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="pr-3 fa-solid fa-upload"></i>
                                            Import User
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Import-->

                        <!-- ====== Reset All User is_voted ====== -->
                        <form action="{{ route('user.reset-all') }}" method="POST" id="reset-form" class="w-max">
                            @csrf
                            <button type="button" onclick="confirmResetAll()" data-tooltip-target="tooltip-resetall"
                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:focus:ring-yellow-900">Reset
                                All</button>
                            <div id="tooltip-resetall" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Reset Status Pemilihan Semua User
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </form>
                        <!-- ====== End Reset All User is_voted ====== -->

                        <!-- ====== Delete All User ====== -->
                        <form action="{{ route('user.delete-all') }}" method="POST" id="delete-form" class="w-max">
                            @csrf
                            <button type="button" onclick="confirmDeleteAll()" data-tooltip-target="tooltip-deletall"
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete
                                All</button>
                            <div id="tooltip-deletall" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Hapus Semua Data User
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </form>
                        <!-- ====== End Delete All User ====== -->
                    </div>
                </div>
                <!-- Modal Create -->
                <div id="add-user-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Add User
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="add-user-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('user.store') }}" class="p-4 md:p-5" method="POST">
                                @csrf
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="name" id="name" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') is-invalid @enderror"
                                            placeholder="eg. Ali Murofid">
                                        @error('name')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="text" name="username" id="username" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('username') is-invalid @enderror"
                                            placeholder="eg. Ali Murofid">
                                        @error('username')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="password"
                                            class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Password <button type="button" onclick="showPassword(), changetext()"><i
                                                    class="fa-regular fa-eye-slash"></i></button>
                                        </label>
                                        <input type="password" required
                                            class="passwords bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                            name="password">
                                        @error('password')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="confirm-password"
                                            class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Confirm Password <button type="button"
                                                onclick="showConfPassword(), changeconftext()"><i
                                                    class="fa-regular fa-eye-slash"></i></button>
                                        </label>
                                        <input type="password" required
                                            class="confirm-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="mt-2 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Add User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Create -->
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-6 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500"
                            datatable id="datatable-search">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-sm font-normal leading-normal">{{ $loop->iteration }}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $user->name }}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $user->username }}</td>
                                        <td class="text-sm font-normal leading-normal">{{ $user->role }}</td>
                                        <td class="text-sm font-normal leading-normal">
                                            @if ($user->is_voted == 0)
                                                <span data-tooltip-target="tooltip-belum{{ $user->id }}"
                                                    class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Belum</span>
                                                <div id="tooltip-belum{{ $user->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    Belum Memilih
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            @else
                                                <form action="{{ route('user.reset', $user->id) }}" method="POST"
                                                    id="reset-form-{{ $user->id }}">
                                                    @csrf
                                                    <button type="button" onclick="confirmReset({{ $user->id }})"
                                                        data-tooltip-target="tooltip-sudah{{ $user->id }}"
                                                        class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah</button>
                                                    <div id="tooltip-sudah{{ $user->id }}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        Sudah Memilih
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="flex flex-wrap text-sm font-normal leading-normal">
                                            <!-- Button Edit User -->
                                            <button data-modal-target="edit-user-modal{{ $user->id }}"
                                                data-modal-toggle="edit-user-modal{{ $user->id }}" type="button"
                                                data-tooltip-target="tooltip-edituser{{ $user->id }}"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                            <div id="tooltip-edituser{{ $user->id }}" role="tooltip"
                                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Edit User
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            <!-- End Button Edit User -->

                                            <!-- Button Delete User -->
                                            <a href="{{ route('user.destroy', $user->id) }}"
                                                data-tooltip-target="tooltip-deleteuser{{ $user->id }}"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                data-confirm-delete="true">Delete</a>
                                            <div id="tooltip-deleteuser{{ $user->id }}" role="tooltip"
                                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Delete User
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            <!-- End Button Delete User -->

                                            <!-- Modal Edit User -->
                                            <div id="edit-user-modal{{ $user->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full p-4">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                            <h3
                                                                class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                Edit User
                                                            </h3>
                                                            <button type="button"
                                                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-toggle="edit-user-modal{{ $user->id }}">
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
                                                        <!-- Modal body edit-->
                                                        <form action="{{ route('user.update', $user->id) }}"
                                                            class="p-4 md:p-5" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid grid-cols-2 gap-4 mb-4">
                                                                <div class="col-span-2">
                                                                    <label for="name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                    <input type="text" name="name" id="name"
                                                                        required
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') is-invalid @enderror"
                                                                        placeholder="eg. Ali Murofid"
                                                                        value="{{ old('name', $user->name) }}">
                                                                    @error('name')
                                                                        <div class="mt-2 text-sm text-red-500">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="username"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                                    <input type="text" name="username" id="username"
                                                                        required
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('username') is-invalid @enderror"
                                                                        placeholder="eg. Ali Murofid"
                                                                        value="{{ old('username', $user->username) }}">
                                                                    @error('username')
                                                                        <div class="mt-2 text-sm text-red-500">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="password"
                                                                        class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                        Password <button type="button"
                                                                            onclick="showPassword(), changetext()"><i
                                                                                class="fa-regular fa-eye-slash"></i></button>
                                                                    </label>
                                                                    <input type="password" required
                                                                        class="passwords bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                                                        name="password"
                                                                        value="{{ old('password', $user->password) }}">
                                                                    @error('password')
                                                                        <div class="mt-2 text-sm text-red-500">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="confirm-password"
                                                                        class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                        Confirm Password <button type="button"
                                                                            onclick="showConfPassword(), changeconftext()"><i
                                                                                class="fa-regular fa-eye-slash"></i></button>
                                                                    </label>
                                                                    <input type="password" required
                                                                        class="confirm-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                                                        name="password_confirmation">
                                                                    @error('password_confirmation')
                                                                        <div class="mt-2 text-sm text-red-500">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button type="submit"
                                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                <i class="pr-2 fa-regular fa-pen-to-square"></i>
                                                                Edit User
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit User -->
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
@push('customJS')
    <!-- Argon -->
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>
    <script src="{{asset('build/assets/app-af0b7264.js')}}"></script>

    <!-- konfirmasi -->
    <script>
        function confirmReset(id) {
            Swal.fire({
                title: 'Konfirmasi Reset',
                text: 'User akan direset ulang!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya, Hapus!", kirimkan permintaan penghapusan ke server
                    document.getElementById('reset-form-' + id).submit();
                    Swal.fire(
                        'Direset!',
                        'User berhasil direset.',
                        'success'
                    )
                }
            });
        }

        function confirmResetAll() {
            Swal.fire({
                title: 'Konfirmasi Reset',
                html: '<input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Masukkan password">',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset Semua!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const password = Swal.getPopup().querySelector('#password').value;
                    // Ganti dengan logika yang sesuai untuk memeriksa password yang dimasukkan
                    // Misalnya, jika password benar, kirimkan permintaan penghapusan ke server
                    if (password === 'resetuserall') {
                        document.getElementById('reset-form').submit();
                        Swal.fire(
                            'Direset!',
                            'Semua Data User telah direset.',
                            'success'
                        );
                    } else {
                        Swal.showValidationMessage('Password salah');
                    }
                }
            });
        }

        function confirmDeleteAll() {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                html: '<input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Masukkan password">',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Semua!',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const password = Swal.getPopup().querySelector('#password').value;
                    // Ganti dengan logika yang sesuai untuk memeriksa password yang dimasukkan
                    // Misalnya, jika password benar, kirimkan permintaan penghapusan ke server
                    if (password === 'truncateuserall') {
                        document.getElementById('delete-form').submit();
                        Swal.fire(
                            'Dihapus!',
                            'Semua Data User telah dihapus.',
                            'success'
                        );
                    } else {
                        Swal.showValidationMessage('Password salah');
                    }
                }
            });
        }
    </script>
@endpush

@extends('dashboard.layouts.dashboardmain')
@section('title', 'User')
@section('content')
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 flex justify-between">
                    <h5 class="mb-0 dark:text-white">Table User</h5>
                    <div class="flex">
                        <button data-modal-target="add-user-modal" data-modal-toggle="add-user-modal" type="button"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                            User</button>
                        <button type="button"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Import</button>
                        <button type="button"
                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:focus:ring-yellow-900">Reset</button>
                        <button type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete
                            All</button>
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
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('name') is-invalid @enderror"
                                            placeholder="eg. Ali Murofid">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('username') is-invalid @enderror"
                                            placeholder="eg. Ali Murofid">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="password"
                                            class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Password <button type="button" onclick="showPassword(), changetext()"><i
                                                    class="fa-regular fa-eye-slash"></i></button>
                                        </label>
                                        <input type="password"
                                            class="passwords bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <label for="confirm-password"
                                            class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Confirm Password <button type="button"
                                                onclick="showConfPassword(), changeconftext()"><i
                                                    class="fa-regular fa-eye-slash"></i></button>
                                        </label>
                                        <input type="password"
                                            class="confirm-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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

                <div class="p-6 table-responsive">
                    <table class="table table-flush" datatable id="datatable-search">
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
                                        @if ($user->status == 0)
                                            <span
                                                class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Belum</span>
                                        @else
                                            <span
                                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah</span>
                                        @endif
                                        {{-- <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah</span> --}}
                                    </td>
                                    <td class="flex flex-wrap text-sm font-normal leading-normal">
                                        <button data-modal-target="edit-user-modal{{ $user->id }}"
                                            data-modal-toggle="edit-user-modal{{ $user->id }}" type="button"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                        </form>

                                        <div id="edit-user-modal{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full p-4">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
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
                                                    <form action="{{ route('user.update',$user->id) }}" class="p-4 md:p-5"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid grid-cols-2 gap-4 mb-4">
                                                            <div class="col-span-2">
                                                                <label for="name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('name') is-invalid @enderror"
                                                                    placeholder="eg. Ali Murofid" value="{{old('name',$user->name)}}">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-span-2">
                                                                <label for="username"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                                <input type="text" name="username" id="username"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('username') is-invalid @enderror"
                                                                    placeholder="eg. Ali Murofid" value="{{old('username',$user->username)}}">
                                                                @error('username')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-span-2">
                                                                <label for="password"
                                                                    class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                    Password <button type="button"
                                                                        onclick="showPassword(), changetext()"><i
                                                                            class="fa-regular fa-eye-slash"></i></button>
                                                                </label>
                                                                <input type="password"
                                                                    class="passwords bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror"
                                                                    name="password" required autocomplete="new-password" value="{{old('password',$user->password)}}">
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-span-2">
                                                                <label for="confirm-password"
                                                                    class="flex justify-between mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                    Confirm Password <button type="button"
                                                                        onclick="showConfPassword(), changeconftext()"><i
                                                                            class="fa-regular fa-eye-slash"></i></button>
                                                                </label>
                                                                <input type="password"
                                                                    class="confirm-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror"
                                                                    name="password_confirmation" required
                                                                    autocomplete="new-password">
                                                                @error('password_confirmation')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
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
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <td class="text-sm font-normal leading-normal">3</td>
                                <td class="text-sm font-normal leading-normal">Rofids</td>
                                <td class="text-sm font-normal leading-normal">Rofidganss123</td>
                                <td class="text-sm font-normal leading-normal">12345</td>
                                <td class="text-sm font-normal leading-normal">
                                    <span
                                        class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah</span>
                                </td>
                                <td class="flex flex-wrap text-sm font-normal leading-normal">
                                    <div class="flex items-center justify-center">
                                        <button type="button"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </div>

                                </td>
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
            @include('dashboard.layouts.footer')
        </div>
    </div>
@endsection
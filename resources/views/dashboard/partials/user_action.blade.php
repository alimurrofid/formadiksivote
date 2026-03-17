<div class="flex flex-wrap text-sm font-normal leading-normal">
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
                            <label for="password{{ $user->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password"
                                    id="password{{ $user->id }}"
                                    class="passwords bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                    placeholder="Password">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400"
                                    onclick="showPassword('{{ $user->id }}'), changeText('{{ $user->id }}')">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="confirm-password{{ $user->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password"
                                    name="password_confirmation"
                                    id="confirm-password{{ $user->id }}"
                                    class="confirm-password bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Confirm Password">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400"
                                    onclick="showConfPassword('{{ $user->id }}'), changeConfText('{{ $user->id }}')">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </button>
                            </div>
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
</div>

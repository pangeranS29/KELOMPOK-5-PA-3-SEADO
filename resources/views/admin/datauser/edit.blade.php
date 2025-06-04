<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {!! __('Data Pengguna &raquo; Edit &raquo; #') . $user->id . ' &middot; ' . $user->name !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                                Ada kesalahan!
                            </div>
                            <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form class="w-full" action="{{ route('admin.datauser.update', $user->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                    Nama*
                                </label>
                                <input value="{{ old('name', $user->name) }}" name="name"
                                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                       id="name" type="text" placeholder="Nama Pengguna" required>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                    Email*
                                </label>
                                <input value="{{ old('email', $user->email) }}" name="email"
                                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                       id="email" type="email" placeholder="Email Pengguna" required>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                                    Telepon
                                </label>
                                <input value="{{ old('phone', $user->phone) }}" name="phone"
                                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                       id="phone" type="text" placeholder="Nomor Telepon">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                                    Role*
                                </label>
                                <select name="roles"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="roles" required
                                        {{ $user->isSuperAdmin() && auth()->user()->id === $user->id ? 'disabled' : '' }}>
                                    <option value="USER" {{ old('roles', $user->roles) === 'USER' ? 'selected' : '' }}>USER</option>
                                    <option value="ADMIN" {{ old('roles', $user->roles) === 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                                </select>
                                @if($user->isSuperAdmin() && auth()->user()->id === $user->id)
                                    <input type="hidden" name="roles" value="SUPER_ADMIN">
                                    <p class="text-gray-600 text-xs italic">Anda tidak dapat mengubah role SUPER_ADMIN sendiri.</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <button type="submit"
                                        class="shadow bg-green-500 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>

                    @if(Auth::user()->role === 'admin')
                        <p class="mb-4">Anda login sebagai <strong>Admin</strong>. Anda dapat mengelola izin santri.</p>
                        <a href="{{ route('admin.izin.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Kelola Izin
                        </a>
                    @else
                        <p class="mb-4">Anda login sebagai <strong>Orang Tua</strong>. Anda dapat mengajukan izin untuk santri.</p>
                        <div class="space-x-4">
                            <a href="{{ route('izin.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Lihat Izin Saya
                            </a>
                            <a href="{{ route('izin.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ajukan Izin Baru
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

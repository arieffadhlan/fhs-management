<x-app-layout title="Dashboard">
    <div class="container">
        <div class="row">
            @if (Auth::user()->role == 'admin')
                <x-statistic-card>
                    <x-slot name="color">purple</x-slot>
                    <x-slot name="icon">fas fa-th-large</x-slot>
                    <x-slot name="key">Kategori</x-slot>
                    <x-slot name="value">{{ $data['0'] }}</x-slot>
                </x-statistic-card>
                <x-statistic-card>
                    <x-slot name="color">red</x-slot>
                    <x-slot name="icon">fas fa-archive</x-slot>
                    <x-slot name="key">Barang</x-slot>
                    <x-slot name="value">{{ $data['1'] }}</x-slot>
                </x-statistic-card>
                <x-statistic-card>
                    <x-slot name="color">green</x-slot>
                    <x-slot name="icon">fas fa-users</x-slot>
                    <x-slot name="key">Pemasok</x-slot>
                    <x-slot name="value">{{ $data['2'] }}</x-slot>
                </x-statistic-card>
                <x-statistic-card>
                    <x-slot name="color">blue</x-slot>
                    <x-slot name="icon">fas fa-user</x-slot>
                    <x-slot name="key">Pengguna</x-slot>
                    <x-slot name="value">{{ $data['3'] }}</x-slot>
                </x-statistic-card>
            @else
                <x-statistic-card>
                    <x-slot name="color">purple</x-slot>
                    <x-slot name="icon">fas fa-th-large</x-slot>
                    <x-slot name="key">Kategori</x-slot>
                    <x-slot name="value">{{ $data['0'] }}</x-slot>
                </x-statistic-card>
                <x-statistic-card>
                    <x-slot name="color">red</x-slot>
                    <x-slot name="icon">fas fa-archive</x-slot>
                    <x-slot name="key">Barang</x-slot>
                    <x-slot name="value">{{ $data['1'] }}</x-slot>
                </x-statistic-card>
                <x-statistic-card>
                    <x-slot name="color">green</x-slot>
                    <x-slot name="icon">fas fa-users</x-slot>
                    <x-slot name="key">Customer</x-slot>
                    <x-slot name="value">{{ $data['2'] }}</x-slot>
                </x-statistic-card>
            @endif
        </div>
    </div>
</x-app-layout>

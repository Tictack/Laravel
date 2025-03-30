<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Menu de navigation -->
    <style>
        .nav-item {
            margin-right: 1rem;
        }
    </style>

    <nav class="bg-gray-800 p-4 text-white">
        <ul class="flex">
            <li class="nav-item"><a href="{{ route('register') }}" class="hover:underline">S'enregistrer</a></li>
            <li class="nav-item"><a href="{{ route('login') }}" class="hover:underline">Se connecter</a></li>
            <li class="nav-item"><a href="{{ url('membres') }}" class="hover:underline">Consulter les membres</a></li>
            <li class="nav-item"><a href="{{ url('creer') }}" class="hover:underline">Ajouter un membre</a></li>
            <li class="nav-item"><a href="{{ url('modifier/' . auth()->user()->id) }}" class="hover:underline">Modifier détails</a></li>
        </ul>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

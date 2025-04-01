<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espace Administrateur') }}
        </h2>
    </x-slot>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <div class="container-fluid mt-4">
        <div class="card shadow-lg p-4 border-0">
            <h2 class="text-center text-secondary mb-4">Utilisateurs en attente d'approbation</h2>

            @if ($users->isEmpty())
                <div class="alert alert-info text-center">
                    Aucun utilisateur en attente d'approbation.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center align-middle w-100">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col" class="py-3 text-uppercase">Nom</th>
                            <th scope="col" class="py-3 text-uppercase">Email</th>
                            <th scope="col" class="py-3 text-uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="py-3">{{ $user->name }}</td>
                                <td class="py-3">{{ $user->email }}</td>
                                <td class="py-3">
                                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-lg px-4">
                                            ✅ Approuver
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <footer class="text-center text-muted mt-4">
        LP3MI 2025
    </footer>
</x-app-layout>

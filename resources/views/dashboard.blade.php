@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="border-4 border-dashed border-gray-200 rounded-lg p-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Bienvenue, {{ Auth::user()->name }}!</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-700">Vos Badges</h2>
                    <p class="mt-2 text-gray-600">Vous avez débloqué {{ Auth::user()->badges->count() }} badges</p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-700">Profil Twitch</h2>
                    <p class="mt-2 text-gray-600">Connecté en tant que: {{ Auth::user()->nickname }}</p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-700">Statut</h2>
                    <p class="mt-2 text-gray-600">Connecté avec succès</p>
                </div>
            </div>

            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800">Informations du compte</h2>
                <div class="mt-4 bg-white p-4 rounded-lg shadow">
                    <p><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Pseudo Twitch:</strong> {{ Auth::user()->nickname }}</p>
                    <p><strong>ID Twitch:</strong> {{ Auth::user()->twitch_id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

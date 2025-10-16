@extends('layouts.app')

@section('title', 'Modifier un Badge')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Modifier un Badge</h1>
            <a href="{{ route('badges.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <form method="POST" action="{{ route('badges.update', $badge) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $badge->name) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                        <input type="text" name="code" id="code" value="{{ old('code', $badge->code) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $badge->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="block text-sm font-medium text-gray-700">Icône (URL)</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $badge->icon) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="condition_type" class="block text-sm font-medium text-gray-700">Type de Condition</label>
                        <select name="condition_type" id="condition_type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="page_visit" {{ old('condition_type', $badge->condition_type) == 'page_visit' ? 'selected' : '' }}>Visite de page</option>
                            <option value="click_count" {{ old('condition_type', $badge->condition_type) == 'click_count' ? 'selected' : '' }}>Nombre de clics</option>
                            <option value="time_spent" {{ old('condition_type', $badge->condition_type) == 'time_spent' ? 'selected' : '' }}>Temps passé</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="condition_data" class="block text-sm font-medium text-gray-700">Données de Condition (JSON)</label>
                        <textarea name="condition_data" id="condition_data" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('condition_data', $badge->condition_data) }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Mettre à jour le Badge
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

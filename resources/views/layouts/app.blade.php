<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yunaleska')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="font-bold text-xl text-gray-800">Yunaleska</span>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <div class="flex items-center">
                            @if(Auth::user()->avatar)
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                            @endif
                            <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="ml-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-700 hover:text-gray-900">Déconnexion</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">Connexion</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $company->name }} - {{ config('app.name', 'Laravel') }}</title>
    <meta
        description="Akazi kose company that is located in Kigali Rwanda. It helps in finding jobs,tenders,consultancy,training and internships.">
    <meta
        keywords="Home,Rwanda,Kigali,akazi kose,jobs,job,online job,online jobs,jobs online,consultancy,training,training online,internships">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-menu-component />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($adverts as $advert)
                    <div class="mt-4 sm:px-4">
                        <a href="{{ route('adverts.show', $advert->slug) }}" target="__blank"
                           class="flex items-center bg-white p-4 rounded-lg shadow-none border border-blue-500">
                            <div class="mr-4">

                                <img src="{{ $advert->company->getFirstMediaUrl('logo') }}"
                                     alt="{{ $advert->company->name }}" class="w-full h-20 object-cover">

                            </div>

                            <div>
                                <h4 class="py-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $advert->title ?? '-' }}</h4>
                                <h5 class="text-blue-700 text-md font-bold tracking-tight py-2">
                                    {{ $advert->company->name ?? '-' }}
                                </h5>
                                <blockquote class="text-md sm:text-sm text-gray-900 hidden md:block">
                                    Location: {{ $advert->location ?? '-' }}|
                                    Published on: {{ $advert->formattedPublish() ?? '-' }}| Deadline:
                                    {{ $advert->formattedDeadline() ?? '-' }}| Experience:
                                    {{ $advert->desired_experience ?? 'Not specified' }}
                                </blockquote>
                                <div class="mt-2 text-gray-600">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded">{{ $advert->category->name ?? '-' }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <x-footer-component />
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Url Shortner">
        <meta name="author" content="Tom Shafer">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
        {!! Charts::styles() !!}
        <title>Code Deploy Short Code Generater</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div class="main text-white pt-10 relative" style="background: repeating-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('{{ $image }}') center center / cover no-repeat;">
            <div class="container mx-auto">
                <div class="mx-auto">
                    <h1 class="text-center subpixel-antialiased">Code Deploy URL Shortener Stats</h1>
                    @isset($url)
                    <div class="flex ml-auto mr-auto w-full pt-8">
                        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md w-full">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p>Url: <a href="{{ $url->url }}" class="text-black">{{ $url->url }}</a></p>
                                    <p>Shortcode: <a href="{{ $url->realUrl }}" class="text-black">{{ $url->realUrl }}</a> </p>
                                    <p>Created at: {{ $url->created_at }} </p>
                                    <p>Clicks: {{ $stats->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="flex ml-auto mr-auto pt-1 w-full">
                    <div class="w-1/3 pr-1">
                        {!! $browsers->html() !!}
                    </div>
                    <div class="w-1/3">
                        {!! $visiters->html() !!}
                    </div>
                    <div class="w-1/3 pl-1">
                        {!! $platform->html() !!}
                    </div>
                </div>
                <div class="flex ml-auto mr-auto pt-1 w-full">
                    <div class="w-full">
                        {!! $geo->html() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute pin-b text-center w-full pb-4 text-center subpixel-antialiased text-white text-sm">Icons made by <a href="https://www.flaticon.com/authors/swifticons" title="Swifticons" class="text-white no-underline">Swifticons</a> from <a href="https://www.flaticon.com/" title="Flaticon" class="text-white no-underline">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank" class="text-white no-underline">CC 3.0 BY</a></div>
    </div>
    {!! Charts::scripts() !!}
    {!! $browsers->script() !!}
    {!! $visiters->script() !!}
    {!! $platform->script() !!}
    {!! $geo->script() !!}
</body>
</html>

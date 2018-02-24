<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Url Shortner">
		<meta name="author" content="Tom Shafer">
		<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
		<title>Code Deploy Short Code Generater</title>
		<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	</head>
	<body>
		<div class="main text-white pt-30 relative" style="background: repeating-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('{{ $image }}') center center / cover no-repeat;">
			<div class="container mx-auto">
				<div class="mx-auto">
					<h1 class="text-center subpixel-antialiased">Code Deploy URL Shortener</h1>
					<form method="post" action="/">
						@csrf
						<div class="flex ml-auto mr-auto pt-8 w-3/4">
							<div class="w-3/4">
								<input type="text" name="url" class="shadow appearance-none rounded-tl py-2 px-3 h-12 text-grey-darker w-full" placeholder="Enter url...">
							</div>
							<div class="w-1/4">
								<button type="submit" class="shadow bg-teal hover:bg-teal-dark text-white font-bold py-2 px-4 h-12 rounded-tr font-sans tracking-wide uppercase w-full">Generate!</button>
							</div>
						</div>
						@isset($url)
						<div class="flex ml-auto mr-auto w-3/4">
							<div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md w-full">
								<div class="flex">
									<div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
									<div>
										<p class="font-bold mb-3"><a href="{{ $url }}" class="text-black">{{ $url }}</a></p>
										<p class="text-sm">Stats: <a href="{{ $url }}/stats" class="text-black">{{ $url }}/stats</a></p>
									</div>
								</div>
							</div>
						</div>
						@endif
						@if ($errors->any())
						<div class="flex ml-auto mr-auto w-3/4">
							<div class="bg-red border-t-4 border-orange rounded-b text-white px-4 py-3 shadow-md w-full">
								<div class="flex">
									<div class="py-1"><svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg></div>
									<div class="pt-2 w-full block">
										@foreach ($errors->all() as $error)
										<p class="font-bold">{{ $error }}</p>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						@endif
					</form>
				</div>
			</div>
			<div class="absolute pin-b text-center w-full pb-4 text-center subpixel-antialiased text-white text-sm">Icons made by <a href="https://www.flaticon.com/authors/swifticons" title="Swifticons" class="text-white no-underline">Swifticons</a> from <a href="https://www.flaticon.com/" title="Flaticon" class="text-white no-underline">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank" class="text-white no-underline">CC 3.0 BY</a></div>
		</div>

	</body>
</html>

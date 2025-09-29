<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0b0b] text-gray-300 antialiased">
    <main class="max-w-6xl mx-auto px-6 py-12 md:flex md:items-center md:gap-12" role="main" aria-label="Intro">
        <section class="md:flex-1">
            <div class="text-red-500 font-semibold uppercase tracking-wider text-sm mb-4">Hello, My Name Is</div>

            <h1 class="text-white font-extrabold text-5xl md:text-6xl leading-tight tracking-widest mb-6 uppercase">DEPENDE SA TRIP AH</h1>

            <p class="text-gray-400 max-w-2xl mb-6">
                A passionate and dedicated junior web developer, driven by the ever-evolving world of technology and its limitless possibilities.
            </p>

            <a href="#contact" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md px-5 py-3 shadow-lg transition-transform transform hover:-translate-y-1">
                Contact me
            </a>
        </section>

             <aside class="mt-10 md:mt-6 md:w-80 flex justify-center transform md:translate-y-6" aria-hidden="false">
            <div class="w-72 md:w-80 h-80 md:h-96 rounded-lg p-3 bg-gradient-to-b from-red-700 to-red-900 shadow-2xl flex items-center justify-center">
                <div class="w-full h-full bg-black rounded-sm overflow-hidden">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile portrait" class="w-full h-full object-cover block">
                </div>
            </div>
        </aside>
    </main>
</body>
</html>
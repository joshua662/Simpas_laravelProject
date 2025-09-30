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
    <main class="max-w-6xl mx-auto px-6 py-12 md:flex md:items-center md:gap-12 min-h-screen" role="main" aria-label="Intro">
        <section class="md:flex-1">
            <div class="text-red-500 font-semibold uppercase tracking-wider text-sm mb-4">Hello, My Name Is</div>

            <h1 class="text-white font-extrabold text-5xl md:text-6xl leading-tight tracking-widest mb-6 uppercase">Josh Simpas</h1>

            <p class="text-gray-400 max-w-2xl mb-6">
                A passionate and dedicated junior web developer, driven by the ever-evolving world of technology and its limitless possibilities.
            </p>

            <a href="#contact" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md px-5 py-3 shadow-lg transition-transform transform hover:-translate-y-1">
                Contact me
            </a>
        </section>

       <aside class="flex items-center justify-center" aria-hidden="false">
            <div class="w-64 md:w-80 lg:w-96 xl:w-[34rem] p-3 rounded-lg flex items-center justify-center">
                <div class="w-full h-[360px] md:h-[380px] lg:h-[520px] rounded-sm overflow-hidden">
                    <img src="{{ asset('images/Profile.jpg') }}" alt="Profile portrait" class="w-full h-full object-cover block">
                </div>
            </div>
        </aside>
    </main>
</body>
</html>
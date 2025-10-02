<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0b0b] min-h-screen flex items-center justify-center p-6">
  <main class="w-full max-w-2xl bg-black rounded-2xl shadow-lg p-8 border-2 border-red-700">
    <h1 class="text-3xl font-extrabold text-white">Let’s Connect!</h1>

    <p class="mt-2 text-white">
      I’m a developer student passionate about building clean, functional, and creative solutions.
      Whether you’d like to collaborate on a project, share opportunities, or just talk tech, I’d love to hear from you.
      Send me a message and let’s start a conversation.
    </p>

    <p class="mt-3 text-white">
      📬 Drop me a line below or email me directly at
      <a class="text-indigo-600 hover:underline" href="mailto:your-email@example.com">your-email@example.com</a>.
    </p>

    <p class="mt-2 italic text-sm text-white">“Learning, building, growing—let’s talk.”</p>

    {{-- <form class="mt-6 space-y-4" method="POST" action="{{ route('contact.send') }}">
      @csrf --}}

      <div>
        <label for="name" class="block text-sm font-medium text-white">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required
               class="mt-1 block w-full rounded-md border border-indigo-200 bg-white px-3 py-2 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">
        @error('name') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-white">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required
               class="mt-1 block w-full rounded-md border border-indigo-200 bg-white px-3 py-2 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">
        @error('email') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
      </div>

      <div>
        <label for="message" class="block text-sm font-medium text-white">Message</label>
        <textarea id="message" name="message" rows="6" required
                  class="mt-1 block w-full rounded-md border border-indigo-200 bg-white px-3 py-2 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">{{ old('message') }}</textarea>
        @error('message') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
      </div>

      <div class="pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          Send Message
        </button>
      </div>
    </form>
  </main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pixel Positions</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400..600;1,400..600&display=swap" rel="stylesheet">

  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-black text-white font-hanken-grotesk pb-8">
  <div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
      <div>
        <a href="#">
          <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="pixel_positions_logo" />
        </a>
      </div>

      <div class="space-x-5 font-semibold">
        <a href="/">Jobs</a>
        <a href="#">Careers</a>
        <a href="#">Salaries</a>
        <a href="#">Companies</a>
      </div>

      @auth
        <div class="flex items-center justify-center">
          <a href="/jobs/create" class="mr-5">Post a Job</a>
          
          <form method="POST" action="/logout" class="py-2 px-4 bg-red-600/80 rounded-lg text-center">
            @csrf
            @method("DELETE")
            <button>Logout</button>
          </form>
        </div>

      @endauth

      @guest
        <div class="space-x-5 font-semibold">
        <a href="/register">Sign up</a>
        <a href="/login">Sign in</a>
      </div>
      @endguest
    </nav>

    <main class="mt-10 max-w-[986px] mx-auto">
      {{ $slot }}
    </main>
  </div>
</body>
</html>
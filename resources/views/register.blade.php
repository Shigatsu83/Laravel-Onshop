<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="w-screen h-screen bg-slate-100 flex">
          <div class="px-4 py-8 m-auto w-80  h-96 bg-slate-300 rounded">
            <div class="flex justify-center mb-12">
                <span class="text-2xl font-semibold">Daftar Sekarang</span>
            </div>

            <div>
              <form action="">
                <label for="telp">Nomor HP atau Email</label>
                <input class="w-full rounded-md" type="text" name="telp">
              </form>
            </div>

            <div class="text-center my-8">
                <span>atau daftar dengan</span>
            </div>

            <div class="flex items-center text-center content-center h-10 borlder-solid border-2 rounded-md">
              <img class="w-7 h-7 pl-2" src="{{ asset('gambar/googlelogo.svg') }}" alt="">
              <a href="{{Route('google.login')}}" class="inline-block w-full"><span>Google</a>
            </div>
          </div>
    </div>
</body>
</html>
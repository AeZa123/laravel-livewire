<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravle-livewire</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous">

    @livewireStyles

</head>
<body>


    {{-- <livewire:counter /> --}}
    <div class="w-7/12 mt-10 mx-auto rounded p-2">
        <livewire:comments />
        <livewire:counter />
        
        
    </div>
    



    @livewireScripts
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        
        <script src="{{ asset('resources/js/script.js') }}" ></script>

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
        
    </head>
    <body>
    <div class="place-content-center ">
            <div class="container">
                <div class="row">
                    <table class="shadow-md min-w-full text-center font-light">
                                <thead class="border-2 bg-slate-300  font-light dark:bord text-xl er-neutral-500">
                                <tr>
                                    <th scope="col">Exam ID</th>
                                    <th scope="col">Pet ID</th>
                                    <th scope="col">Pet Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Veterinary ID</th>

                                </tr>
                                </thead>
                                <tbody>
                                  @php($i =1)
                                    @foreach ( $MediExam as $row )  
                                    <tr>
                                        <th>{{$i++}}</th>
                                        <td>{{$row->exam_id}}</td>
                                        <td>{{$row->pet_id}}</td>
                                        <td>{{$row->temp}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </body>


</html>



    


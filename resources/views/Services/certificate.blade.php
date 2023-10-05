
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Certificate</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">




        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>


        <script>
            function goto(uri) {
                window.location.href = uri;
            }

        </script>



    </head>
    <body class="font-sans">

            <div class="pt-10">

        <a href="/main" class="flex justify-center ">
                <x-application-logo fill="none" width="150" height="150" class="stroke-slate-200" stroke-width="1" stroke-linejoin="round"/>
            </a>
        </div>
        <!-- <div class="name" style="font-size: 50px; display: flex; align-items: flex-start;">Certificate</div> -->
    <div id="tableData" class=" place-content-center pt-10 px-56">
      <div id="tableData" class="border rounded-lg shadow-md overflow-hidden container mx-auto">
                    <table id="tableData" class="w-full text-center font-light">
                                <thead class="font-normal  bg-gray-50  dark:bord text-lg er-neutral-500">

                                <tr id="tableData" class="">
                                    <th scope="col" class="py-2">Exam No.</th>
                                    <th scope="col" class="py-2">Pet Name</th>
                                    <th scope="col" class="py-2">Date</th>
                                    <th scope="col" class="py-2">Veterinary's Name</th>
                                </tr>


                                </thead>
                                <tbody class="text-sm ">

                                  @php($i =1)
                                    @foreach ( $certificates as $row )
                                    <tr id="tableData" class="hover:bg-sky-50 hover:cursor-pointer" onclick="goto('{{route('generate-pdf', $row['exam_id'])}}')">
                                        <td class="py-2">{{$i++}}</th>
                                        <td class="py-2">{{$row->pet['pet_name']}}</td>
                                        <td class="py-2">{{$row['date']}}</td>
                                        <td class="py-2">{{$row['veterinary_id']}} {{$row['last_name']}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
    </body>


</html>






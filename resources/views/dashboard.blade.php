<?php
    use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <button id="theme-toggle" class="bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg">
                Toggle Dark Mode</button>
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="container">
                <div class="row">
                    <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" >
                                        No.
                                        <span>
                                            <i class="fa fa-arrow-up"></i>
                                            <i class="fa fa-arrow-down text-muted"></i>
                                        </span>
                                    </th>
                                    <th scope="col" >petname</th>
                                    <th scope="col" >species</th>
                                    <th scope="col" >breed</th>
                                    <th scope="col" >microchip</th>
                                    <th scope="col" >age</th>
                                    <th scope="col" >gender</th>
                                    <th scope="col" >DOB</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @php($i =1)
                                    @foreach ($pets as $row )
                                    <tr>
                                        <th>{{$i++}}</th>
                                        <td>{{$row->pet_name}}</td>
                                        <td>{{$row->species}}</td>
                                        <td>{{$row->breed}}</td>
                                        <td>{{$row->microchip}}</td>
                                        <td>{{$row->age}}</td>
                                        <td>{{$row->gender}}</td>
                                        <td>{{$row->date_of_birth}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</x-app-layout>


<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>

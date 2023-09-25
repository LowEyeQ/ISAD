<?php
    use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>
    <x-slot name="header">
        <button id="theme-toggle" class="bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg">
            Toggle Dark Mode
        </button>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h4 style="background-color:powderblue;">Hello, {{Auth::user()->name}}</h4>
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="container">
                <div class="row">
                    <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">อีเมล</th>
                                    <th scope="col">เข้าสู่ระบบ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($i =1)
                                    @foreach ( $users as $row )
                                    <tr>
                                        <th>{{$i++}}</th>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</x-app-layout>

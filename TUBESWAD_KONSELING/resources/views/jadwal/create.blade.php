
@extends('layouts.app')

@section('content')
<div class = "container mx-auto p-6">
    <h1 class="text - 3x1 font-semibold text-gray-800 mb-6"> Buat Jadwal Baru </h1>

    <form method="POST" action="{{ route ('jadwal.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf 
        <div class="mb-4">
            <label for="title" class="block text-gray-700-text-sm font-medium mb-2"> 

</div>

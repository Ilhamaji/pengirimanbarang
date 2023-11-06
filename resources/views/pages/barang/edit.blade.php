@extends('layouts.index')
@section('title', 'Edit Barang')

@section('content')
    <form action="{{url('barang/edit/'.$barang[0]->idBarang)}}" method="POST" class="block">
        @csrf
        <div class="font-semibold text-lg">Nama : </div>
        <input type="text" name="nama" value="{{$barang[0]->nama}}" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
        <div class="font-semibold text-lg">Berat Barang (Kg) : </div>
        <input type="number" name="beratBarang" value="{{$barang[0]->beratBarang}}" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
        <button type="submit" class="block bg-black px-5 py-2 rounded-md focus:ring focus:outline-none hover:bg-neutral-700 text-white my-2">Submit</button>
    </form>
@endsection
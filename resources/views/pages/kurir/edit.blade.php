@extends('layouts.index')
@section('title', 'Edit Kurir')

@section('content')
    <form action="{{url('kurir/edit/'.$kurir[0]->idKurir)}}" method="POST" class="block">
        @csrf
        <input type="text" name="nama" value="{{$kurir[0]->namaKurir}}" placeholder="Nama" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
            <input type="text" name="jenKel" value="{{$kurir[0]->jenKel}}" placeholder="Jenis Kelamin" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
            <input type="text" name="wilayah" value="{{$kurir[0]->wilayah}}" placeholder="Wilayah" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
            <input type="text" name="noHp" value="{{$kurir[0]->noHp}}" placeholder="Nomor Handphone" class="block py-2 rounded-md border focus:outline-none focus:ring my-2">
            <input type="text" name="alamat" value="{{$kurir[0]->alamat}}" placeholder="Alamat" class="inline py-2 rounded-md border focus:outline-none focus:ring my-2">
            <button type="submit" class="block bg-black px-5 py-2 rounded-md focus:ring focus:outline-none hover:bg-neutral-700 text-white my-2">Submit</button>
    </form>
@endsection
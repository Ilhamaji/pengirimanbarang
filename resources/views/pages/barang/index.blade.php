@extends('layouts.index')
@section('title', 'Barang')

@section('content')

    <div class="text-4xl black pt-5 font-bold">Barang</div>
    <div class="text-lg text-neutral-400">tabel barang</div>

    <div class="flex">
        <div class="flex my-5 w-96 h-60 rounded-2xl border bg-gradient-to-r from-emerald-100 to-teal-300">
            <div class="m-auto text-4xl font-semibold">Jumlah<br>Barang</div>
            <div class="m-auto text-9xl font-semibold text-teal-500">0{{$jmlBarangs}}</div>
        </div>
        <div class="flex mx-10 my-5 w-96 h-60 rounded-2xl border bg-gradient-to-r from-yellow-100 to-orange-300">
            <div class="m-auto text-4xl font-semibold">Avg.<br>Rating</div>
            <div class="m-auto text-9xl font-semibold text-orange-500 z-10">4.5</div>
        </div>
        <div class="flex my-5 w-96 h-60 rounded-2xl border bg-gradient-to-r from-sky-100 to-blue-300">
            <div class="m-auto text-4xl font-semibold">Edit<br>Data</div>
            <div class="m-auto text-9xl font-semibold text-blue-500">⮕</div>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="flex font-bold text-white bg-black rounded-md px-5 text-xl"><div class="m-auto">Tambah Barang</div></div>
        <form action="/barang" method="post" class="inline ml-auto mr-0" onsubmit="return funcAdd('add')">
            @csrf
            <input type="text" name="nama" placeholder="Nama" onchange="getName(this.value)" class="inline py-2 rounded-md border focus:outline-none focus:ring">
            <input type="number" name="beratBarang" min="0" placeholder="Berat Barang (Kg)" onchange="getBerat(this.value)" class="inline py-2 rounded-md mx-2 border focus:outline-none focus:ring">
            <button type="submit" class="bg-black px-5 py-2 rounded-md focus:ring focus:outline-none hover:bg-neutral-700 text-white">Submit</button>
        </form>
    </div>
    
    <script>
        let name, weight;
        let check = false;

        function getName(nama){
            name = nama;
            check = true;
        }

        function getBerat(berat){
            weight = berat;
            check = true;
        }

        function funcAdd(x) {
            if (check) {
                return confirm(`Are you sure to ${x} ${name} dengan berat ${weight} ?`);
            }else{
                alert('Please fill the fields !')
            }
        }

        check = false;
    </script>
    
    @foreach ($barangs as $key => $barang)
        <div class="hidden none">{{$key+1}}</div>
        <div class="py-2 flex {{!$key == 1 ? "" : "border-t"}}">
            <ul class="inline">
                <li><div class="font-semibold">{{$barang->nama}}</div></li>
            </ul>
            <ul class="inline ml-auto mr-0">
                <li><div class="text-right">{{$barang->beratBarang}} Kg</div></li>
                <li><div class="text-sm text-neutral-400">{{$barang->updated_at}}</div></li>
            </ul>
            <a href="{{url('barang/edit/'.$barang->idBarang)}}" class="flex hover:bg-neutral-100 focus:ring active:bg-neutral-100 focus:outline-none focus:ring-sky-200 px-5 rounded-md ml-2 bg-white border"><div class="m-auto">📝</div></a>
            
            <form action="{{url('barang/delete/'.$barang->idBarang) }}" method="get" onsubmit="return funcDelete('delete')" class="flex">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 rounded-md ml-2 bg-black text-white border focus:outline-none focus:ring focus:ring-sky-200 hover:bg-neutral-700 active:bg-neutral-700"><div class="m-auto">X</div></button>
            </form>
        </div>

        <script>
            function funcDelete(x) {
                return confirm(`Are you sure to ${x} {{$barang->nama}} ?`);
            }
        </script>
    @endforeach

@endsection
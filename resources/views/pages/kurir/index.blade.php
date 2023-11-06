@section('content')
@extends('layouts.index')
@section('title', 'Kurir')

@section('content')
    <div class="text-4xl black pt-5 font-bold">Kurir</div>
    <div class="text-lg text-neutral-400">tabel kurir</div>

    <div class="flex">
        <div class="flex my-5 w-96 h-60 rounded-2xl border bg-gradient-to-r from-emerald-100 to-teal-300">
            <div class="m-auto text-4xl font-semibold">Jumlah<br>Kurir</div>
            <div class="m-auto text-9xl font-semibold text-teal-500">0{{$jmlKurirs}}</div>
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
        <div class="flex font-bold text-white bg-black rounded-md px-5 text-xl"><div class="m-auto">Tambah Kurir</div></div>
        <form action="/kurir" method="post" class="inline ml-auto mr-0" onsubmit="return funcAdd('add')">
            @csrf
            <input type="text" name="nama" onchange="getName(this.value)" placeholder="Nama" class="inline py-2 rounded-md border focus:outline-none focus:ring">
            <input type="text" name="jenKel" onchange="getGender(this.value)" placeholder="Jenis Kelamin" class="inline py-2 rounded-md mx-2 border focus:outline-none focus:ring">
            <input type="text" name="noHp" onchange="getPhoneNo(this.value)" placeholder="Nomor Handphone" class="inline py-2 rounded-md mx-2 border focus:outline-none focus:ring">
            <input type="text" name="alamat" onchange="getAddress(this.value)" placeholder="Alamat" class="inline py-2 mx-2 rounded-md border focus:outline-none focus:ring">
            <button type="submit" class="bg-black px-5 py-2 rounded-md focus:ring focus:outline-none hover:bg-neutral-700 text-white">Submit</button>
        </form>
    </div>
    
    <script>
        let name, gender, phoneNo, address;
        let check = false;
        let check1 = false;
        let check2 = false;
        let check3 = false;

        function getName(nama){
            name = nama;
            check = true;
        }

        function getGender(jenKel){
            gender = jenKel;
            check1 = true;
        }

        function getPhoneNo(noHp){
            phoneNo = noHp;
            check2 = true;
        }

        function getAddress(alamat){
            address = alamat;
            check3 = true;
        }

        function funcAdd(x) {
            if (check && check1 && check2 && check3) {
                return confirm(`Are you sure to ${x} ${name} ?`);
            }else{
                alert('Please fill the fields !')
            }
        }
        
        check = false;
        check1 = false;
        check2 = false;
        check3 = false;
    </script>

    @foreach ($kurirs as $key => $kurir)
        <div class="hidden none">{{$key+1}}</div>
        <div class="py-2 flex {{!$key == 1 ? "" : "border-t"}}">
            <ul class="inline">
                <li><div class="font-semibold">{{$kurir->nama}}</div></li>
                <li><div class="text-sm text-neutral-400">{{$kurir->noHp}}</div></li>
            </ul>
            <ul class="inline ml-auto mr-0">
                <li class="text-right">{{$kurir->alamat}}</li>
                <li><div class="text-sm text-neutral-400">{{$kurir->updated_at}}</div></li>
            </ul>
            <a href="{{url('kurir/edit/'.$kurir->idKurir)}}" class="flex hover:bg-neutral-100 focus:ring active:bg-neutral-100 focus:outline-none focus:ring-sky-200 px-5 rounded-md ml-2 bg-white border"><div class="m-auto">📝</div></a>
            <form action="{{url('kurir/delete/'.$kurir->idKurir) }}" method="get" onsubmit="return funcDelete('delete')" class="flex">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 hover:bg-neutral-700 rounded-md ml-2 bg-black text-white border focus:outline-none focus:ring focus:ring-sky-200 active:bg-neutral-700"><div class="m-auto">X</div></button>
            </form>
        </div>

        <script>
            function funcDelete(x) {
                return confirm(`Are you sure to ${x} {{$kurir->nama}} ?`);
            }
        </script>
    @endforeach

@endsection
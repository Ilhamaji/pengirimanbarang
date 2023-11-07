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

    <button class="flex font-bold text-white bg-black w-48 py-2 rounded-md px-5 text-xl" onClick="myFunction()"><div class="m-auto">Tambah Kurir</div></button>
    <div class="form-card z-10 flex">
        <form action="/kurir" method="post" class="flex w-full rounded-lg h-20 my-2 border m-auto invisible hidden animate-[bounce_0.25s]" id="myPopup" onsubmit="return funcAdd('add')">
            @csrf
            <div class="m-auto">
            <input type="text" name="namaKurir" onchange="getName(this.value)" placeholder="Nama" class="inline px-2 mx-2 py-2 rounded-md border focus:outline-none focus:ring">
            <input type="text" name="noHp" onchange="getPhoneNo(this.value)" placeholder="Nomor Handphone" class="inline px-2 mx-2 py-2 rounded-md border focus:outline-none focus:ring">
            <select id="wilayah" name="wilayah" class="border py-2 rounded-md px-2 focus:outline-none focus:ring" onchange="getWilayah(this.value)">
                <option selected>Wilayah</option>
                <option value="Banjarsari">Banjarsari</option>
                <option value="Laweyan">Laweyan</option>
            </select>
            <input type="text" name="alamat" onchange="getAddress(this.value)" placeholder="Alamat" class="inline px-2 mx-2 py-2 rounded-md border focus:outline-none focus:ring">
            <select id="jenKel" name="jenKel" class="border py-2 rounded-md px-2 focus:outline-none focus:ring" onchange="getGender(this.value)">
                <option selected>Jenis Kelamin</option>
                <option value="l">Laki-laki</option>
                <option value="p">Perempuan</option>
            </select>
            <button type="submit" class="bg-black mx-2 px-5 py-2 rounded-md focus:ring focus:outline-none hover:bg-neutral-700 text-white">Submit</button>
            </div>
        </form>
    </div>
    
    <script>
        let status;
        function myFunction() {
            status = !status;
            let popup = document.getElementById("myPopup");

            if (status) {
                popup.classList.remove("invisible", "hidden");
                popup.classList.toggle("visible");
            }else {
                popup.classList.remove("visible");
                popup.classList.toggle("invisible", "hidden");
            }
        }

        let name, gender, phoneNo, address, region;
        let check = false;
        let check1 = false;
        let check2 = false;
        let check3 = false;
        let check4 = false;

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

        function getWilayah(wilayah){
            region = wilayah;
            check4 = true;
        }

        function funcAdd(x) {
            if (check && check1 && check2 && check3) {
                return confirm(`Are you sure to ${x} ${name} ?`);
            }else{
                console.log(check, check1, check2, check3, check4);
                alert('Please fill the fields !')
            }
        }
        
        check = false;
        check1 = false;
        check2 = false;
        check3 = false;
        check4 = false;
    </script>

    @foreach ($kurirs as $key => $kurir)
        <div class="hidden none">{{$key+1}}</div>
        <div class="py-2 flex {{!$key == 1 ? "" : "border-t"}}">
            <ul class="inline">
                <li><div class="font-semibold">{{$kurir->namaKurir}}</div></li>
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
                return confirm(`Are you sure to ${x} {{$kurir->namaKurir}} ?`);
            }
        </script>
    @endforeach

@endsection
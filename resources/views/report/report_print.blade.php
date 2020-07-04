@include('snippets.header')

<html>
    <head>
        <title>Slip Penggajian Karyawan</title>
    </head>
    <body>
    <h3 class="text-sm-center">SLIP GAJI KARYAWAN</h3>
        <p class="text-sm-left">NIK : {{$salary['data']['nik']}}</p>
        <p class="text-sm-left">Nama Karyawan : {{$salary['data']['employee_name']}}</p>
        <p class="text-sm-left">Divisi : {{$salary['data']['division_name']}}</p>
        <p class="text-sm-left">Jabatan : {{$salary['data']['position_name']}}</p>
        <p class="text-sm-left">Total Gaji : {{$salary['data']['salary']}}</p>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">NIK</th>
        <th scope="col">Nama Karyawan</th>
        <th scope="col">Divisi</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Total Gaji</th>
        </tr>
        @php
            $no = 1;
        @endphp
        
    </thead>
    <tbody>
        @foreach($salary['data']['salary'] as $item)
        <tr>
        <td>{{ $no++ }}</td>
        <td>{{$item['nik']}}</td>
        <td>{{$item['employee_name']}}</td>
        <td>{{$item['division_name']}}</td>
        <td>{{$item['position_name']}}</td>
        <td>{{$item['salary']}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </body>
</html>
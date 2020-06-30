@include('snippets.header')
<br>
<br>
<br>
<br>
<br>
<div class="container">
  @include('snippets.menu')
  <p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Tambah Absensi
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
 
      <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/absensi/create" method="POST">
          {{csrf_field ()}}
                
          {{-- <div class="form-group">
              <label for="exampleInputPassword1">NIK</label>
                  <input type="text" name="nik" class="form-control" id="exampleInputPassword1">
          </div> --}}
  
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">Jam Masuk</th>
      <th scope="col">Jam Keluar</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($absensi as $item)
    <tr>
      <td></td>
      <td>{{$item->nik}}</td>
      <td>{{$item->jam_masuk}}</td>
      <td>{{$item->jam_keluar}}</td>
      <td>{{$item->tanggal}}</td>
      <td>
      <a href="/absensi/delete/{{$item->absensi_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/absensi/edit/{{$item->absensi_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')
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
    Tambah Karyawan
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
 
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/employee/create" method="POST">
          {{csrf_field ()}}

          <div class="form-group">
              <label for="exampleInputPassword1">Nama Karyawan</label>
                  <input type="text" name="position_name" class="form-control" id="exampleInputPassword1">
          </div>
  
          <div class="form-group">
              <label for="exampleInputPassword1">Kode Jabatan</label>
                  <select name="position_code" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($position as $item)
                        <option value="{{$item->position_code}}">{{$item->position_code}}</option>
                          @endforeach
                  </select>
            </div>      
            
            <div class="form-group">
              <label for="exampleInputPassword1">Kode Divisi</label>
                  <select name="division_code" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($division as $item)
                        <option value="{{$item->division_code}}">{{$item->division_code}}</option>
                          @endforeach
                  </select>
            </div>     

    

              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Code Jabatan</th>
      <th scope="col">Nama Jabatan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($position as $item)
    <tr>
      <td></td>
      <td>{{$item->position_code}}</td>
      <td>{{$item->position_name}}</td>
      <td>
      <a href="/position/delete/{{$item->position_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/position/edit/{{$item->position_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')

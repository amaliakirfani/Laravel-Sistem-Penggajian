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

          {{-- <div class="form-group">
              <label for="exampleInputPassword1">NIK</label>
                  <input type="text" name="nik" class="form-control" id="exampleInputPassword1">
          </div> --}}

          <div class="form-group">
              <label for="exampleInputPassword1">Nama Karyawan</label>
                  <input type="text" name="employee_name" class="form-control" id="exampleInputPassword1">
          </div>
  
          <div class="form-group">
              <label for="exampleInputPassword1">Kode Jabatan</label>
                  <select name="position_name" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($position as $item)
                        <option value="{{$item->position_name}}">{{$item->position_name}}</option>
                          @endforeach
                  </select>
            </div>      
            
            <div class="form-group">
              <label for="exampleInputPassword1">Kode Divisi</label>
                  <select name="division_name" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($division as $item)
                        <option value="{{$item->division_name}}">{{$item->division_name}}</option>
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
      <th scope="col">NIK</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Kode Jabatan</th>
      <th scope="col">Kode Divisi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employee as $item)
    <tr>
      <td></td>
      <td>{{$item->nik}}</td>
      <td>{{$item->employee_name}}</td>
      <td>{{$item->position_code}}</td>
      <td>{{$item->division_code}}</td>
      <td>
      <a href="/employee/delete/{{$item->employee_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/employee/edit/{{$item->employee_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')

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
    Tambah Gaji
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
 
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/salary/create" method="POST">
          {{csrf_field ()}}

          <div class="form-group">
              <label for="exampleInputPassword1">Divisi</label>
                  <select name="division_name" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($division as $item)
                        <option value="{{$item->division_code}}">{{$item->division_name}}</option>
                          @endforeach
                  </select>
            </div> 

            <div class="form-group">
              <label for="exampleInputPassword1">Jabatan</label>
                  <select name="position_name" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($position as $item)
                        <option value="{{$item->position_code}}">{{$item->position_name}}</option>
                          @endforeach
                  </select>
            </div> 

            <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Gaji</label>
                  <input type="text" name="salary" class="form-control" id="exampleInputPassword1">
            </div> 
  
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Gaji</th>
      <th scope="col">Kode Divisi</th>
      <th scope="col">Kode Jabatan</th>
      <th scope="col">Gaji</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($salary as $item)
    <tr>
      <td></td>
      <td>{{$item->salary_code}}</td>
      <td>{{$item->division_code}}</td>
      <td>{{$item->position_code}}</td>
      <td>{{$item->salary}}</td>
      <td>
      <a href="/salary/delete/{{$item->salary_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/salary/edit/{{$item->salary_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')

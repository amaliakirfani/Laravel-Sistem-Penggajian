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
    Tambah Divisi
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
 
      <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/division/create" method="POST">
          {{csrf_field ()}}
                
          <div class="form-group">
              <label for="exampleInputPassword1">Nama Divisi</label>
                  <input type="text" name="division_name" class="form-control" id="exampleInputPassword1">
          </div>
  
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Code Divisi</th>
      <th scope="col">Nama Divisi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($division as $item)
    <tr>
      <td></td>
      <td>{{$item->division_code}}</td>
      <td>{{$item->division_name}}</td>
      <td>
      <a href="/division/delete/{{$item->division_id}}">
        <button class="btn btn-danger">Hapus</button></a>

        <a href="/division/edit/{{$item->division_id}}">
        <button class="btn btn-warning">Edit</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@include('snippets.footer')
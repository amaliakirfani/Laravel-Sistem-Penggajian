@include('snippets.header')
<div class="container">
    <form action="/position/update" method="POST">
    {{csrf_field ()}}
    
    <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input value={{$position->position_id}} type="hidden" name="id" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Jabatan</label>
        <input value={{$position->position_name}} type="text" name="nama" class="form-control" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('snippets.footer')
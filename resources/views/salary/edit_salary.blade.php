@include('snippets.header')
<div class="container">
    <form action="/salary/update" method="POST">
    {{csrf_field ()}}
    
    <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input value={{$salary->salary_id}} type="hidden" name="id" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jumlah Gaji</label>
        <input value={{$salary->salary}} type="text" name="salary" class="form-control" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('snippets.footer')
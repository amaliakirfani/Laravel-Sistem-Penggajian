@include('snippets.header')
<br>
<br>
<br>
<br>
<br>

<div class="container">
  @include('snippets.menu')
<hr>
<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Print Slip Gaji
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

 
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/report/print" method="POST">
          {{csrf_field ()}}

  
          <div class="form-group">
              <label for="exampleInputPassword1">NIK</label>
                  <select name="nik" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($employee as $item)
                        <option value="{{$item->nik}}">{{$item->nik}}</option>
                          @endforeach
                  </select>
            </div>      
            
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal</label>
                  <select name="date" class="form-control">
                      <option>--pilih--</option>
                          @foreach ($report_salary as $item)
                        <option value="{{$item->date}}">{{$item->date}}</option>
                          @endforeach
                  </select>
            </div>     

              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<hr>
<br>
<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Print Rekap Gaji
    </a>
  </p>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="/report/rekap_gaji" method="POST">
          {{csrf_field ()}}    
            
            <div class="form-group">
              <label for="exampleInputPassword1">Bulan</label>
                <select name=”bulan”>
                  <option value=’Januari’> Januari </option>
                  <option value=’Februari’> Februari </option>
                  <option value=’Maret’> Maret </option>
                  <option value=’April’> April </option>
                  <option value=’Mei’> Mei </option>
                  <option value=’Mei’> Juni </option>
                  <option value=’Mei’> Juli </option>
                  <option value=’Mei’> Agustus </option>
                  <option value=’Mei’> September </option>
                  <option value=’Mei’> Oktober </option>
                  <option value=’Mei’> November </option>
                  <option value=’Mei’> Desember </option>
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
      <th scope="col">Kode Gaji</th>
      <th scope="col">Kode Divisi</th>
      <th scope="col">Kode Jabatan</th>
      <th scope="col">Gaji</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
@include('snippets.footer')

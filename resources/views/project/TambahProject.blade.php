@extends('master.admin')
@section('title', 'Tambah project')
@section('content-title', 'Tambah project - '.$siswa->nama)
@section('content')

@if(count($errors) > 0 )
            <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
            </div>
@endif

<form method="post" enctype="multipart/form-data" action="{{ route('masterproject.store')}}" >
@csrf
    <div class="form-group">
            <input type="hidden" name="id_siswa" value="{{$siswa->id}}">
            <label for="nama">NAMA PROJECT</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project">
        </div>
       <div class="form-group">
          <label for="nama">TANGGAL PROJECT</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal">
       </div>
      <div class="form-group">
          <label for="nama">DESKRIPSI PROJECT</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
      </div>
      <div class="form-group">
          <a class=""></a>
       </div>
       <div class="form-group">
           <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
           <input type="submit" class="btn btn-success" value="Simpan"></input>
      </div>
</form>

@endsection
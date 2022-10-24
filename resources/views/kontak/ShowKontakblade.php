
@if($kontak->isEmpty())
    <h6>Siswa Belum Memiliki Kontak</h6>
@else
    @foreach($kontak as $item)
    <div class="card">
        <div class="card-header">
            <strong> {{ $item->jenis_kontak }}</strong>
        </div>
        <div class="card-body">
            <strong>Nama Kontak</strong>
            <p>{{ $item->tanggal }}</p>
            <strong>Deskripsi Project</strong>
            <p>{{ $item->deskripsi }}</p>
        </div>
        <div class="card-footer">
        <a href="{{ route('masterproject.edit', $item -> id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
        <a href="{{ route('masterproject.hapus', $item -> id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
        </div>
    </div>
    @endforeach
    @endif
@extends('master.admin')
@section('title', 'master project')
@section('content-title', 'Master project')
@section('content')
	<div class="row">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
		        <div style="font-weight: 500;" class="card-header bg-gradient-dark text-white">
			        <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
			        Data Siswa
			    </div>
			    <div class="card-body">
					<table class="table table-bordered display nowrap" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					            <th>Nisn</th>
					            <th>nama</th>
                                <th>Action</th>
					        </tr>
					    </thead>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item-> nisn }}</td>
                            <td>{{ $item-> nama }}</td>
                            <td>
                                <a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                                <a class="btn btn-info" href="{{ route('masterproject.tambah', $item -> id)}}" ><i class="fas fa-plus"></i></a>
                            </td>
                        </tr>
                        @endforeach
					</table>
                    <div class="card-footer">
                        {{ $data->links() }}
                    </div>
			    </div>
		    </div>
	</div>

		<div class="col-lg-8">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-dark text-white">
			        <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
			        Project Siswa
			    </div>
			    <div id="project" class="card-body">
					<section class="text-center">
					    <h3>Pilih Siswa terlebih dahulu</h3>
					</section>
			    </div>
		    </div>
		</div>

	</div>
	
	<script>
		function show (id) {
			$.get('masterproject/'+id, function(data){
				$('#project').html(data);
			})
		}
	</script>

@endsection
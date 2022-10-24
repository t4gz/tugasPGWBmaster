<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\models\siswa;
use App\models\project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Siswa::paginate(5);
        return view('master.masterproject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function tambah($id)
    {
        $siswa=siswa::find($id);
        return view ('project.TambahProject', compact('siswa'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Siswa::find($id)->project()->get();
        return view('project.ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        $siswa = siswa::find($id);
        return view('project.EditProject', compact('project', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required'=>':attribute harus di isi YGY',
            'min'=>':attribute minimal :min karakter ya coy',
            'max'=>':attribute maksimal :max karakter ya coy',
            'numeric'=>':attribut harus di isi angka cak!!',
            'mimes'=>':gambar harus berupa jpg atau png' 
        ];

        $this->validate($request,[
            'nama_project'=> 'required|min:3',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:10'
           
        ], $message);

            $project = project::find($id);
            $project-> nama_project = $request->nama_project;
            $project-> deskripsi = $request->deskripsi;
            $project-> tanggal = $request->tanggal;

            $project->save();
            Session::flash('success',"project berhasil diUpdate !");
            return redirect('/masterproject')
        ;
    }

    public function store(Request $request)
    {
        $validasi = $request -> validate([
            'id_siswa'=> 'required',
            'nama_project'=> 'required|min:3',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:10'
           
        ]);

        project::create($validasi);
        Session::flash('success',"Project berhasil ditambahkan!");
        return redirect('/masterproject');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
    $project=project::find($id)->delete();
    Session::flash('success',"Data berhasil dihapus!");
    return redirect ('/masterproject');
    }

}

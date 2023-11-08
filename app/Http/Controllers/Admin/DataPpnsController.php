<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPpns;
use App\Models\MasterInstansi;
use App\Models\MasterJabatan;
use App\Models\MasterPangkat;
use App\Models\MasterWilayah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataPpnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = DataPpns::all();
        $master['pangkat'] = MasterPangkat::all();
        $master['instansi'] = MasterInstansi::all();
        $master['wilayah'] = MasterWilayah::all();
        $master['jabatan'] = MasterJabatan::all();
        return view('admin/list_ppns', compact('post', 'master'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $master['pangkat'] = MasterPangkat::all();
        $master['instansi'] = MasterInstansi::all();
        $master['wilayah'] = MasterWilayah::all();
        $master['jabatan'] = MasterJabatan::all();
        return view('admin/register', compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ppns' => 'required|max:20|unique:data_ppns',
            'nip' => 'required|unique:data_ppns',
            'nama' => 'required',
            'no_surat' => 'required',
            'status_lantik' => 'required',
            'no_skep_ppns' => 'required',
            'pas_foto' => 'required|mimes:jpg,bmp,png,jpeg',
            'foto_nik' => 'required|mimes:jpg,bmp,png,jpeg',
            'foto_kta' => 'required|mimes:jpg,bmp,png,jpeg',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|unique:users|digits_between:10,13'
        ]);

        // Upload File
        $pas_foto = $request->file('pas_foto');
        $foto_nik = $request->file('foto_nik');
        $foto_kta = $request->file('foto_kta');
        $filename_pas = 'pas_foto' . time() . '.' . $pas_foto->getClientOriginalExtension();
        $filename_nik = 'foto_nik' . time() . '.' . $foto_nik->getClientOriginalExtension();
        $filename_kta = 'foto_kta' . time() . '.' . $foto_kta->getClientOriginalExtension();
        $path_pas = 'file_user/pas_foto';
        $path_nik = 'file_user/foto_nik';
        $path_kta = 'file_user/foto_kta';
        $pas_foto->move($path_pas, $filename_pas);
        $foto_nik->move($path_nik, $filename_nik);
        $foto_kta->move($path_kta, $filename_kta);

        // Insert DB
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->password = bcrypt('user123');
        $user->save();
        $id_user = $user->id;

        $input_ppns = $request->all();
        $input_ppns = $request->except(['email', 'no_hp', 'pas_foto', 'foto_nik', 'foto_kta']);
        DataPpns::create($input_ppns + ['user_id' => $id_user, 'pas_foto' => $filename_pas, 'foto_nik' => $filename_nik, 'foto_kta' => $filename_kta]);
        return redirect()
            ->back()
            ->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = DataPpns::find($id);
        return response()->json([
            'success' => true,
            'data'    => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $input = $request->except(['_token', '_method']);
        DataPpns::where('id', $id)->update($input);
        Session::flash('message', __('Data Berhasil Dirubah'));
        return response()->json([
            'success' => true,
        ]);
        // return redirect('data_ppns')->with(['success' => 'Data Berhasil Dirubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataPpns::where('id', $id)->delete();
        return redirect('data_ppns')->with(['message' => 'Data Berhasil Dihapus!']);
    }

    public function perWilayah(string $id)
    {
        $post = DataPpns::where('wilayah_id', $id)
            ->with('pangkat')->with('wilayah')->with('instansi')->with('jabatan')
            ->get();
        return response()->json([
            'success' => true,
            'data'    => $post
        ]);
    }
}

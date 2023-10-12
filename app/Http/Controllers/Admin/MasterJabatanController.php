<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = MasterJabatan::all();
        return view('admin/master/jabatan', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MasterJabatan::create($request->all());
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
        $post = MasterJabatan::find($id);
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
        MasterJabatan::where('id', $id)->update($input);
        Session::flash('message', __('Data Berhasil Dirubah'));
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MasterJabatan::where('id', $id)->delete();
        return redirect('master_jabatan')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = MasterPangkat::all();
        return view('admin/master/pangkat', compact('post'));
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
        MasterPangkat::create($request->all());
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
        $post = MasterPangkat::find($id);
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
        MasterPangkat::where('id', $id)->update($input);
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
        MasterPangkat::where('id', $id)->delete();
        return redirect('master_pangkat')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}

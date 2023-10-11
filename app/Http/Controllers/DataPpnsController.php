<?php

namespace App\Http\Controllers;

use App\Models\DataPpns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataPpnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = DataPpns::all();
        return view('admin/list_ppns', compact('post'));
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
        DataPpns::create($request->all());
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
}

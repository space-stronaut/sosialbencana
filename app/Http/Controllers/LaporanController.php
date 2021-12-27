<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\DetailKorban;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::all();

        return view('laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bencanas = Bencana::all();

        return view('laporan.create', compact('bencanas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('photo', 'public');
        }

        Laporan::create($data);

        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);
        $details = DetailKorban::where('laporan_id', $id)->get();

        return view('laporan.show', compact('laporan', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bencanas = Bencana::all();
        $laporan = Laporan::find($id);

        return view('laporan.edit', compact('bencanas', 'laporan'));
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
        $data = $request->all();

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('photo', 'public');
        }

        Laporan::find($id)->update($data);

        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::find($id)->delete();

        return redirect()->back();
    }

    public function validasi(Request $request, $id)
    {
        Laporan::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function addKorban(Request $request)
    {
        DetailKorban::create($request->all());

        return redirect()->back();
    }

    public function deleteKorban($id)
    {
        DetailKorban::find($id)->delete();

        return redirect()->back();
    }
}

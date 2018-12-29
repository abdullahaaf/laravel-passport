<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bunch_of_mahasiswa     = Mahasiswa::all();
        return view('home', compact(['bunch_of_mahasiswa']));
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'nama'              => 'required|string',
            'jurusan'           => 'required|string',
            'alamat'            => 'required|string',
            'nomor_telepon'     => 'required',
        ]);
        $validator->validate();
        Mahasiswa::create($request->all());
        return redirect()->back()->with('report','Success input mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswa  = Mahasiswa::findOrFail($id);
        return view('mahasiswa/edit', compact(['mahasiswa']));
    }

    public function update(Request $request, $id)
    {
        $validator  = Validator::make($request->all(), [
            'nama'              => 'required|string',
            'jurusan'           => 'required|string',
            'alamat'            => 'required|string',
            'nomor_telepon'     => 'required',
        ]);
        $validator->validate();

        Mahasiswa::findOrFail($id)->update($request->all());
        return redirect()->route('home.index')->with('report','Success update mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('home.index')->with('report','Success delete mahasiswa');
    }
}

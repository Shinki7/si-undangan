<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index (){
        $guest = Guest::paginate(10);
        return view('guest.index', compact('guest'));
    }

    public function create (){
        $guest = Guest::paginate(10);

        return view('guest.create', compact('guest'));
    }

    public function store (Request $request){
        $validateData = $request->validate( [
            'name' => 'required'
        ]);

            $guest = Guest::create([
                'name' => $request->name,
                'slug' => $request->name,
            ]);
            return redirect(route('guest.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }

    public function edit($id){
        $guest = Guest::find($id);
        return view('guest.edit', compact('guest'));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate( [
            'name' => 'required'
        ]);

        $guest = Guest::find($id);
        $guest -> update([
            'name' => $request->name
        ]);
        return redirect()->route('guest.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id){
        $guest = Guest::find($id);
        $guest -> delete();
        return redirect(route('guest.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}

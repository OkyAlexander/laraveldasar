<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MahasiswaController extends Controller
{
   public function index() : View
   {
    $mahasiswa = mahasiswa::latest()->paginate(10);

    return view('mahasiswa.index',compact('mahasiswa'));
   }
   public function create(): View
   {
       return view('mahasiswa.create');
   }

   /**
    * store
    *
    * @param  mixed $request
    * @return RedirectResponse
    */
   public function store(Request $request): RedirectResponse
   {
       //validate form
       $request->validate([
           'npm'         => 'required',
           'nama'         => 'required|min:5',
           'jenkel'   => 'required',
           'kelas'         => 'required',
           'alamat'         => 'required'
       ]);

       mahasiswa::create([
           'npm'         => $request->npm,
           'nama'         => $request->nama,
           'jenkel'   => $request->jenkel,
           'kelas'         => $request->kelas,
           'alamat'         => $request->alamat
       ]);

       //redirect to index
       return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
   }
   public function edit(string $id): View
   {
       $mahasiswa = mahasiswa::findOrFail($id);
       return view('mahasiswa.edit', compact('mahasiswa'));
   }
   public function update(Request $request, $id): RedirectResponse
   {
       //validate form
       $request->validate([
          'npm'         => 'required',
           'nama'         => 'required|min:5',
           'jenkel'   => 'required',
           'kelas'         => 'required',
           'alamat'         => 'required'
       ]);

      
       $mahasiswa = mahasiswa::findOrFail($id);

         
           $mahasiswa->update([
               'npm'         => $request->npm,
               'nama'         => $request->nama,
               'jenkel'   => $request->jenkel,
               'kelas'         => $request->kelas,
               'alamat'         => $request->alamat
           ]);

       return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diubah!']);
   }
   public function destroy($id): RedirectResponse
    {
        //get product by ID
        $mahasiswa = mahasiswa::findOrFail($id);


        //delete product
        $mahasiswa->delete();

        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{  
    public function index()
    {
        $data = Buku::orderBy('judul', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200); //404

    }

    public function store(Request $request)
    {
        $dataBuku = new Buku;
        $rules = [
            'judul' => 'required',
            'pengarang' => 'required'
        ];

        //$validator = Validator::make($request->all(), $rules);
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }
        $dataBuku->judul = $request->judul;
        $dataBuku->pengarang = $request->pengarang;
        $dataBuku->penerbit = $request->penerbit;
        $post = $dataBuku->save();    
        
        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data'
        ]);
            
    }

    public function show(string $id)
    {
        $data = Buku::find($id);
        if ($data){
            return response()->json([
                'status' =>true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' =>false,
                'message' => 'Data tidak ditemukan'
            ], 200);
        }
    }
    public function update(Request $request, string $id)
    {
        $dataBuku = Buku::find($id);
        if(empty($dataBuku)){
            return response()->json([
                'status' =>false,
                'message' => 'Data tidak ditemukan'
            ], 404); //404 code status
        }
        $rules = [
            'judul' => 'required',
            'pengarang' => 'required'
        ];

        //$validator = Validator::make($request->all(), $rules);
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal Update data',
                'data' => $validator->errors()
            ]);
        }
        $dataBuku->judul = $request->judul;
        $dataBuku->pengarang = $request->pengarang;
        $dataBuku->penerbit = $request->penerbit;
        $post = $dataBuku->save();    
        
        return response()->json([
            'status' => true,
            'message' => 'Sukses Update data'
        ]);
    }

    public function destroy(string $id)
    {
        $dataBuku = Buku::find($id);
        if(empty($dataBuku)){
            return response()->json([
                'status' =>false,
                'message' => 'Data tidak ditemukan'
            ], 404); //404 code status
        }

        $post = $dataBuku->delete();    
        
        return response()->json([
            'status' => true,
            'message' => 'Sukses Hapus data'
        ]);
    }
}

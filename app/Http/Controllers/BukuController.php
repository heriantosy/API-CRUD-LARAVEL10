<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

//Halaman Front End
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $client = new Client();
       $url ="http://localhost:8000/api/buku";
       $response = $client->request('GET', $url);
       //Cek Berhasilkah?
       //dd($response);       
       //echo $response->getStatusCode();
       //echo $response->getBody()->getContents();

       $content = $response->getBody()->getContents();
       //ubah ke array bro
       $contentArray = json_decode($content, true);
       //print_r($contentArray);
       $data = $contentArray['data'];
       return view('buku.index', ['data' => $data]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $judul      = $request->judul;
        $pengarang  = $request->pengarang;
        $penerbit   = $request->penerbit;

        $parameter = [
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
        ];

        $client = new Client();
        $url ="http://localhost:8000/api/buku";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body'    => json_encode($parameter)
        ]);
 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        //$data = $contentArray['status']; //cek dulu work? 
        //$data = $contentArray['data'];
        //print_r($data);
        if ($contentArray['status'] !=true){
            //echo"Gagal";
            $error = $contentArray['data'];
            return redirect()->to('buku')->withErrors($error)->withInput();
            //print $error;
        }else{
            // echo"Sukses";
            return redirect()->to('buku')->with('success', 'Berhasil')->withInput();
        }
        //return view('buku.index', ['data' => $data]);


    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

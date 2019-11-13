<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ProdukController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/secret/tokotani-f616f-b9b5e7917895.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $namaTable = $firebase->getDatabase()->getReference('produk');
        $isi = $namaTable->getSnapshot()->getValue();

        return view('produk')->with(compact('isi'));
    }

    public function toTambahProduk()
    {
        return view('tambah_produk');
    }

    public function tambahProduk(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "namaProduk" => "required",
            "hargaProduk" => "required",
            "kategoriProduk" => "required",
            "deskripsiProduk" => "required",
            "gambarProduk" => "required|file:1|max:2000"
        ])->validate();

        $namaStorage = "";
        if ($request->file('gambarProduk')) {
            $filenama = $request->file('gambarProduk')->store('image','public');
            $namaStorage = basename($filenama);

        }
        //Mulai ke firebase
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/secret/tokotani-f616f-b9b5e7917895.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $storage = $firebase->getStorage();

        $imageFile = file_get_contents(__DIR__ . '/../../../public/storage/image/'."$namaStorage");
        $storage->getBucket()->upload($imageFile, ['name' => 'produk/' . "$namaStorage"]);

        $uri = $storage->getBucket()->object('produk/'."$namaStorage");
        $uri->update(['acl' => []], ['predefinedAcl' => 'PUBLICREAD']);


        $database = $firebase->getDatabase();

        $table = $database->getReference('produk');
        $produkId = $table->push()->getKey();
        $table->getChild($produkId)->set([
            'nama_produk' => $request->get('namaProduk'),
            'harga_produk' => $request->get('hargaProduk'),
            'kategori_produk' => $request->get('kategoriProduk'),
            'deskripsi' => $request->get('deskripsiProduk'),
            'url_gambar' => 'https://storage.googleapis.com/tokotani-f616f.appspot.com/produk/'."$namaStorage"
        ]);

        return redirect()->route('produk');
    }
}

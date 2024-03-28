<?php

namespace App\Http\Controllers;

use App\Models\insertModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }
    protected $insertModel;
    public function masterdata()
    {
        $insertModel = new insertModel();
        $data = $insertModel->calldata();
        //dd($data);
        return view('master_data', compact('data'));
    }
    public function __construct()
    {
        $this->insertModel = new insertModel;
    }

    public function tambah()
    {
        return view('tambahuser');
    }

    public function add(Request $request)
    {
        //Validasi data yang diinputkan oleh user
        $this->validate($request,[
            'Nama_barang'=>'required|min:3|max:50',
            'Harga_barang'=> 'required',
            'foto'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],[
            'Nama_barang.required'=>"harus diisi dulu bor",
            'Nama_barang.min'=> "minimal 3 char",
            'Nama_barang.max'=> "maximal 50 char",

            'foto.image'=> "tipenya harus gambar!",
            'foto.mimes'=> "foto dalam format jpg, png, jpeg, gif, svg",
            'foto.max'=> "Max size 2MB",
        ]);

        if ($request->file('foto')) {
            $imgname = $request->Nama_barang.'.'.$request->foto->extension();
            $request->foto->move(public_path('gambar/'), $imgname);
        } else {
            $imgname = 'default.png';
        }

        $user = new insertModel();
        $data = [
            'Nama_barang' => $request->Nama_barang,
            'Harga_barang' => $request->Harga_barang,
            'foto'=> $imgname,
        ];

        $user->addData($data);
        // dd($user);
        return redirect('/master_data')->with('status', 'Tambah data success');
    }
    public function detail($id_pelanggan)
    {
       
        $insertModel = new insertModel ();
        $user = $insertModel->find($id_pelanggan);
        return view( 'detailUser',compact('user'));
    }

    public function detailedit($id_pelanggan)
    {
       
        $insertModel = new insertModel ();
        $user = $insertModel->find($id_pelanggan);
        return view( 'editUser',compact('user'));
    }

    public function edit(Request $request, $id_pelanggan)
    {
        if($request->foto <> "")
        {
            $imgname = $request->Nama_barang. '.'.$request->foto->extension();
            $request->foto->move(public_path('gambar'),$imgname);
            $data = [
                'Nama_barang'=> $request->Nama_barang,
                'Harga_barang'=> $request->Harga_barang,
                'foto'=> $imgname,
            ];
            $this->insertModel->editData($data,$id_pelanggan);
        }else{
            $data = [
                'Nama_barang'=> $request->Nama_barang,
                'Harga_barang'=> $request->Harga_barang,
            ];
            $this->insertModel->editData($data,$id_pelanggan);
        }
        return redirect('/master_data')->with('status','Edit Data Berhasil');
    }

    public function delete($id_pelanggan)
    {
        // $this->insertModel->DB::table("pelanggan")
        DB::table("pelanggan")
            ->where('id_pelanggan', $id_pelanggan)
            ->delete();
        // deleteData($id_pelanggan);
        return redirect('/master_data')->with('status', 'delete pelanggan berhasil');
    }
}
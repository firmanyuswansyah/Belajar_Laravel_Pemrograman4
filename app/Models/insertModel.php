<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class insertModel extends Model
{
    public function calldata()
    {
        return DB::table('pelanggan')->get();
        
    }

    public function addData($data)
    {
        return DB::table('pelanggan')->insert($data);
    }

    public function find($id)
    {
        return DB::table('pelanggan')->where('id_pelanggan',$id)->first();
    }

    public function editData($data, $id)
    {
        return DB::table('pelanggan')
                ->where('id_pelanggan', $id)
                ->update($data);
    }
    
    // public function deleteData($id_pelanggan)
    // {
    // return DB::table("pelanggan")
    //             ->where('id_pelanggan', $id_pelanggan)
    //             ->delete();
    // }
}

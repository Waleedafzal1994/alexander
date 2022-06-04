<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenericModel extends Model
{
    use HasFactory;

    public function insert($table,$data)
    {
        return DB::table($table)->insert($data);
    }

    public function insertGetId($table,$data)
    {
        return DB::table($table)->insertGetId($data);
    }

    public function getSpecificRecord($table,$where) {
        $query = DB::table($table)->where($where)->first();
        if (!empty($query))
        {
            return (array)$query;
        }
        else
        {
            return FALSE;
        }
    }

    public function getAllRecords($table,$where,$by,$order) {
        $query = DB::table($table)->where($where)->orderBy($by,$order)->get();
        if ($query->isNotEmpty())
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function updateRecord($table,$set, $where) 
    {
        return DB::table($table)->where($where)->update($set);
    }
}

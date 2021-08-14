<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuItem extends Model
{
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
    
    /**
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function retrieveAll()
    {
        return $this->with(["children"])->get();
    }
}

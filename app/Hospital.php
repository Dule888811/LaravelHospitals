<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'active', 'deleted_at', 'serial_number','image'
    ];
    public function Users()
    {
        return $this->hasMany('App\User');
    }

}
<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
class Specialty  extends Model
{
    protected $fillable = [
        'name', 'deleted_at', 'active'
    ];
    public function Users()
    {
        return $this->hasMany('App\User');
    }

}

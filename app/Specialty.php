<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
class Specialty  extends Model
{
    protected $fillable = [
        'name', 'deleted_at', 'active'
    ];
    public function User()
    {
        return $this->belongsTo('App\User');
    }

}

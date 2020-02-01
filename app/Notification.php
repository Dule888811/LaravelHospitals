<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'seen', 'active', 'deleted_at', 'notification_content','target_specialties',
    ];
    public function User()
    {
        return $this->belongsTo('App\User','target_specialties');
    }

}
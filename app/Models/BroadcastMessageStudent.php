<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastMessageStudent extends Model
{
    use HasFactory;
    protected $table = 'broadcast_messages_student'; // mendevinisikan nama table
    protected $primaryKey = 'id'; // mendevinisikan primary key
    public $incrementing = true; // auto pada primaryKey incremment true
    public $timestamps = true; // create_at dan update_at false

    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}

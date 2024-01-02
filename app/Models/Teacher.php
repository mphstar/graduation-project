<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher'; // mendevinisikan nama table
    protected $primaryKey = 'id'; // mendevinisikan primary key
    public $incrementing = true; // auto pada primaryKey incremment true
    public $timestamps = true; // create_at dan update_at false

    // fillable mendevinisikan field mana saja yang dapat kita isikan
    protected $guarded = [];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'teacher_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

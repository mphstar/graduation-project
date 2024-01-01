<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'major'; // mendevinisikan nama table
    protected $primaryKey = 'id'; // mendevinisikan primary key
    public $incrementing = true; // auto pada primaryKey incremment true
    public $timestamps = true; // create_at dan update_at false

    // fillable mendevinisikan field mana saja yang dapat kita isikan
    protected $guarded = [];

    public static function getDropdownList($selectedMajorId = null)
    {
        $majors = static::pluck('name', 'id')->toArray();

        // Jika selectedMajorId tidak null, tambahkan major yang dipilih ke opsi dropdown
        if ($selectedMajorId !== null) {
            $selectedMajor = static::find($selectedMajorId);

            if ($selectedMajor) {
                $majors[$selectedMajorId] = $selectedMajor->nama_kolom_nama_major;
            }
        }

        return $majors;
    }
}

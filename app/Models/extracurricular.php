<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extracurricular extends Model
{
    use HasFactory;

    protected $fillable = ['image','nama','pembina','deskripsi'];


    private static $extracurricular = [
        [
            'id' => 1,
            'nama' => 'Pramuka',
            'pembina' => 'Pak Budi',
            'deskripsi' => 'Kegiatan ekstrakurikuler yang bertujuan untuk membentuk karakter siswa yang disiplin, mandiri, dan peduli lingkungan.',
        ],
        [
            'id' => 2,
            'nama' => 'Palang Merah Remaja (PMR)',
            'pembina' => 'Bu Dewi',
            'deskripsi' => 'Kegiatan ekstrakurikuler yang bertujuan untuk meningkatkan pengetahuan dan keterampilan siswa dalam bidang kesehatan dan pertolongan pertama.',
        ],
        [
            'id' => 3,
            'nama' => 'Olahraga',
            'pembina' => 'Pak Ali',
            'deskripsi' => 'Kegiatan ekstrakurikuler yang bertujuan untuk meningkatkan prestasi siswa di bidang olahraga.',
        ],
        [
            'id' => 4,
            'nama' => 'Seni',
            'pembina' => 'Bu Ani',
            'deskripsi' => 'Kegiatan ekstrakurikuler yang bertujuan untuk mengembangkan bakat dan minat siswa di bidang seni.',
        ],
        [
            'id' => 5,
            'nama' => 'Kerohanian',
            'pembina' => 'Pak Umar',
            'deskripsi' => 'Kegiatan ekstrakurikuler yang bertujuan untuk meningkatkan keimanan dan ketaqwaan siswa.',
        ],
    ];

    public static function all1()
    {
        return self::$extracurricular;
    }
}

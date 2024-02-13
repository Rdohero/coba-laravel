<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['image','nis','nama','kelas_id','alamat'];
    protected $with = ['kelas'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query,$search){
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['kelas'] ?? false, function ($query,$kelas){
            return $query->whereHas('kelas', function ($query) use ($kelas){
                $query->where('kelas', $kelas);
            });
        });

    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}

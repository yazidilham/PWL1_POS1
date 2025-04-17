<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    public $timestamps = false; // Optional, jika tidak pakai kolom created_at & updated_at

    // ✅ Untuk mass-assignment
    protected $fillable = ['level_kode', 'level_nama'];

    // ✅ Relasi ke User (pastikan import User-nya benar)
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class, 'level_id');
        // 'level_id' adalah foreign key di tabel user
    }
}

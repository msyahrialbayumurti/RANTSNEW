<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nohp',
        'email',
        'password',
        'image', // Tambahkan kolom image agar bisa diisi saat update
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator: Hash password secara otomatis.
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Accessor: Menghasilkan URL gambar profil lengkap.
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return url('storage/images/' . $this->image);
        }

        return url('storage/images/default.png'); // Default image
    }
    public function layanan()
{
    $events = Event::all(); // Atau query untuk mendapatkan data event
    return view('pages.user.layanan', compact('events'));
}

}
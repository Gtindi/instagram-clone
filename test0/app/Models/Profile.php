<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/yiToCfpA6vTeULeHLDZAe6YDqV42Z7yYDunWiPJ7.webp';
        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);

    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}

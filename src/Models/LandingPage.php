<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'status', 'meta_title', 'meta_description', 'meta_image', 'show_header', 'show_footer', 'layout', 'tracking_scripts', 'custom_css', 'custom_js', 'settings', 'language', 'template'];

    public function sections()
    {
        return $this->hasMany(LandingSection::class)->orderBy('order');
    }
}

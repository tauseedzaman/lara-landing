<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    use HasFactory;

    protected $fillable = ['landing_page_id', 'type', 'content', 'order', 'is_visible', 'background_color', 'custom_class', 'custom_id', 'settings'];

    protected $casts = [
        'content' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(LandingPage::class);
    }
}

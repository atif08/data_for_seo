<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SearchKeyword extends Model
{
    use HasFactory;
    protected $fillable =['location_code','keyword','device','language_code','user_id'];

    public function keywords():HasMany
    {
        return $this->hasMany(Keyword::class);
    }
}

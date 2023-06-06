<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $primaryKey = "id";

    protected $fillable = ["name"];

    protected $guarded = ["image", "description"];

    public function categories(){
        return $this->hasMany(BookCategories::class);
    }
}

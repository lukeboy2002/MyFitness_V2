<?php

namespace App\Models;

use Database\Factories\CarouselFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['image_path', 'author', 'link'])]

class Carousel extends Model
{
    /** @use HasFactory<CarouselFactory> */
    use HasFactory;
}

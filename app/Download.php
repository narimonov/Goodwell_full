<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    public $table= 'downloads';

    protected $fillable = [
        'user_id',
        'document_id',
        'download_count'
    ];
}

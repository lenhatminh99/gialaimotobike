<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment_id' , 'product_id' , 'comment' , 'comment_name' , 'comment_date',
    ];

    protected $primaryKey = 'comment_id';
    protected $table = 'tbl_comments';

}

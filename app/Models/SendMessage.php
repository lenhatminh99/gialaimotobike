<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'message_id' , 'message_content'
];

    protected $primaryKey = 'message_id';
    protected $table = 'tbl_sendmessage';
}

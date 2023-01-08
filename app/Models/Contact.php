<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $fillable = [
         'message_id' , 'customer_id' , 'email_contact', 'username_contact', 'address_contact', 'content_contact'
];

    protected $primaryKey = 'message_id';
    protected $table = 'tbl_contact';
}

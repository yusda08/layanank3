<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefAccount extends Model
{
    use HasFactory;

    protected $table = 'ref_accounts';
    protected $primaryKey = 'account_id';
    protected $guarded = ['account_id'];
}

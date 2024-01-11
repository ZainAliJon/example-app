<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function classifier()
    {
        return $this->belongsTo(User::class, 'classifier_id');
    }

     public function rejection()
    {
        return $this->hasMany(RejectionNote::class);
    }
     public function inboxes()
    {
        return $this->hasMany(Inbox::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    /**table associated with the model. * 
     * @var string 
     */
    protected $table = 'service';
    /** 
     * The attributes that aren't mass assignable. 
     * 
     * @var array 
     */
    protected $guarded = [];
    /** 
     * Indicates if the model should be timestamped. 
     * 
     * @var bool

     */
    public $timestamps = false;
}

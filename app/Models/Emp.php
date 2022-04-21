<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Emp extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "emp";
    protected $primarykey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'dob',
    ];

    /** The set ttribute is an Mutator 
     * it follow camel case
     * Transforms an eloquent attribute value when it is set
    */
    public function setNameAttribute($value)
    {
        /** turn the name first latter in upper case by ucwords */
        $this->attributes['name'] = ucwords($value);
    }

    /** The get Attribute is an Accessor
     * it follow camel case
     * Transforms an eloquent attribute value when it is get
     */
    public function getDobAttribute($value)
    {
       return date("d-m-y", strtotime($value));
    }

    public function getAddressAttribute($value)
    {
        return ucwords($value);
    }
}

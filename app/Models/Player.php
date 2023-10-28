<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property varchar $mobile mobile
@property text $address address
@property varchar $picture picture
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Player extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'players';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name',
'mobile',
'address',
'picture'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}
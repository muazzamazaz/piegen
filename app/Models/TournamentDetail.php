<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property int $season season
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class TournamentDetail extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tournament_detail';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tournament_time','venue','tournament_id'];

 public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
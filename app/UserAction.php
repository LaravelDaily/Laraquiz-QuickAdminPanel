<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAction
 *
 * @package App
 * @property string $user
 * @property string $action
 * @property string $action_model
 * @property integer $action_id
*/
class UserAction extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    
}

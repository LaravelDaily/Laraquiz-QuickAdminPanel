<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsOption
 *
 * @package App
 * @property string $question
 * @property string $option
 * @property tinyInteger $correct
*/
class QuestionsOption extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['option', 'correct', 'question_id'];
    
    public static function boot()
    {
        parent::boot();

        QuestionsOption::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id')->withTrashed();
    }
    
}

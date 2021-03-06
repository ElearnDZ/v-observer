<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analysis extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'analyses';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['video_id', 'questionnaire_id', 'creator_id', 'completed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the questionnaire of the analysis
     */
    public function questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'questionnaire_id');
    }

    /**
     * Get the video of the analysis
     */
    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }

    /**
     * Get the creator of the analysis
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id');
    }
}

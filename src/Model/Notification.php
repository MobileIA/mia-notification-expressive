<?php namespace Mobileia\Expressive\Notification\Model;

/**
 * Description of CacheInter
 *
 * @author matiascamiletti
 */
class Notification extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'notification';
    
    protected $casts = ['data' => 'array'];
}
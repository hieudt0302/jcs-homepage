<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TranslationScope;

class MailTemplateTranslation extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TranslationScope);
    }
    
     /**
     * Get the product that owns the slider translation.
     */
    public function mailTemplate()
    {
        return $this->belongsTo('App\Models\MailTemplate');
    }
}

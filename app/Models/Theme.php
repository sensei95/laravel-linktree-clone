<?php

namespace App\Models;

use App\Enums\Theme\Button\ButtonType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @mixin IdeHelperTheme
 */
class Theme extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buttonTypeClass(): Attribute
    {
        return Attribute::make(
            get: function () {
                switch ($this->button_type){
                    case ButtonType::SHADOWED->value :
                        return 'theme__links-button--shadowed';
                    case ButtonType::OUTLINED->value :
                        return 'theme__links-button--outline';
                    case ButtonType::FILLED->value :
                        return 'theme__links-button--filled';
                }
            }
        );
    }

    public function buttonBgClass(): Attribute
    {
        return Attribute::make(
            get: function () {
                return match ($this->button_type) {
                    ButtonType::OUTLINED->value => "",
                    default => "bg-[#{$this->bg_color}]",
                };
            }
        );
    }

    public function themeClass(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Str::snake(Str::lower($this->name));
            }
        );
    }
}

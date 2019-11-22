<?php

declare(strict_types=1);

namespace Marussia\Fields\Resources;

class Field
{
    public $css = '';
    
    public $js = '';
    
    public $html = '';
    
    public $errors = [];
    
    public function isValid() : bool
    {
        return count($this->errors) === 0;
    }
}

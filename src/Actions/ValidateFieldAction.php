<?php

declare(strict_types=1);

namespace Marussia\ContentField\Actions;

use Marussia\ContentField\FieldValue;
use Marussia\ContentField\FieldHandlerCollector;

class ValidateFieldAction
{
    private $handlerCollector;
    
    public function __construct(FieldHandlerCollector $handlerCollector)
    {
        $this->handlerCollector = $handlerCollector;
    }

    public function execute() : FieldValue
    {
        
    }

    public function data(array $data) : self
    {
        $this->data = $data;
        return $this;
    }
}

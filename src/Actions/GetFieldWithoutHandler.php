<?php

declare(strict_types=1);

namespace Marussia\ContentField\Actions;

use Marussia\ContentField\FieldFactory;
use Marussia\ContentField\Field;

class GetFieldWithoutHandler

{
    pruvate $value = '';

    public function __construct(FieldFactory $factory)
    {
        $this->factory = $factory;
    }

    public function execute() : Field
    {
        return $this->factory->create(['value' => $this->value]);
    }

    public function value(string $value) : void
    {
        $this->value = $value;
        return $this;
    }
}

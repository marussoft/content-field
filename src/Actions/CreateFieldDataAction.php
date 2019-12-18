<?php

declare(strict_types=1);

namespace Marussia\ContentField\Actions;

use Marussia\ContentField\FieldDataFactory;
use Marussia\ContentField\FieldData;

class CreateFieldDataAction
{
    protected $factory;

    protected $data = [];

    public function __construct(FieldDataFactory $factory)
    {
        $this->factory = $factory;
    }

    public function execute() : FieldData
    {
        if (count($this->data) === 0) {
            throw new DataForFieldDataNotReceivedException;
        }

        return $this->factory->create($this->data);
    }

    public function data(array $data)
    {
        $this->data = $data;
    }
}

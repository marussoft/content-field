<?php

declare(strict_types=1);

namespace Marussia\ContentField\Test;

use PHPUnit\Framework\TestCase;
use Marussia\ContentField\FieldHandlerCollector;
use Marussia\ContentField\Contracts\FieldHandlerInterface;
use Marussia\ContentField\Field;
use Marussia\ContentField\FieldData;
use Marussia\ContentField\Actions\GetInputWithValueAction;

class GetInputWithValueActionTest extends TestCase
{
    public function testExecute()
    {
        $fieldCollector = $this->fieldCollector();
        $getInputWithValueAction = $this->getInputWithValueAction($fieldCollector);
        $fieldData = \Mockery::mock(FieldData::class);
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $getInputWithValueAction->execute($fieldData));
    }

    private function getInputWithValueAction(FieldHandlerCollector $fieldCollector) : GetInputWithValueAction
    {
        return new GetInputWithValueAction($fieldCollector);
    }

    private function fieldCollector() : FieldHandlerCollector
    {
        $field = \Mockery::mock(Field::class);

        $fieldHandler = \Mockery::mock(FieldHandlerInterface::class);
        $fieldHandler->shouldReceive(['getInputWithValue' => $field]);

        $fieldCollector = \Mockery::mock(FieldHandlerCollector::class);
        $fieldCollector->shouldReceive([
            'exists' => true,
            'get' => $fieldHandler
        ]);

        return $fieldCollector;
    }
}

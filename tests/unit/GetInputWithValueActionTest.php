<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\GetInputWithValueAction;

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

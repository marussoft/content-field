<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\GetInputAction;

class GetInputActionTest extends TestCase
{
    public function testExecute()
    {
        $fieldCollector = $this->fieldCollector();
        $editFilledAction = $this->getInputAction($fieldCollector);
        $fieldData = \Mockery::mock(FieldData::class);
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function getInputAction(FieldHandlerCollector $fieldCollector) : GetInputAction
    {
        return new GetInputAction($fieldCollector);
    }
    
    private function fieldCollector() : FieldHandlerCollector
    {
        $field = \Mockery::mock(Field::class);
        
        $fieldHandler = \Mockery::mock(FieldHandlerInterface::class);
        $fieldHandler->shouldReceive(['getInput' => $field]);
        
        $fieldCollector = \Mockery::mock(FieldHandlerCollector::class);
        $fieldCollector->shouldReceive([
            'exists' => true,
            'get' => $fieldHandler
        ]);
    
        return $fieldCollector;
    }
}

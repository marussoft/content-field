<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\FillAction;

class FillActionTest extends TestCase
{
    public function testExecute()
    {
        $fieldCollector = $this->fieldCollector();
        
        $editFilledAction = $this->fillAction($fieldCollector);
        $fieldData = \Mockery::mock(FieldData::class);
        $fieldData->type = 'test';
        
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function fillAction(FieldHandlerCollector $fieldCollector) : FillAction
    {
        return new FillAction($fieldCollector);
    }
    
    private function fieldCollector() : FieldHandlerCollector
    {
        $field = \Mockery::mock(Field::class);
        
        $fieldHandler = \Mockery::mock(FieldHandlerInterface::class);
        $fieldHandler->shouldReceive(['fill' => $field]);
        
        $fieldCollector = \Mockery::mock(FieldHandlerCollector::class);
        $fieldCollector->shouldReceive([
            'exists' => true,
            'get' => $fieldHandler
        ]);
    
        return $fieldCollector;
    }
}

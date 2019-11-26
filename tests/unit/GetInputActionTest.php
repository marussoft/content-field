<?php

declare(strict_types=1);

namespace Marussia\ContentField\Test;

use PHPUnit\Framework\TestCase;
use Marussia\ContentField\FieldHandlerCollector;
use Marussia\ContentField\Contracts\FieldHandlerInterface;
use Marussia\ContentField\Field;
use Marussia\ContentField\FieldData;
use Marussia\ContentField\Actions\GetInputAction;

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

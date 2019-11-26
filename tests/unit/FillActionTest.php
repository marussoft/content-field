<?php

declare(strict_types=1);

namespace Marussia\ContentField\Test;

use PHPUnit\Framework\TestCase;
use Marussia\ContentField\FieldHandlerCollector;
use Marussia\ContentField\Contracts\FieldHandlerInterface;
use Marussia\ContentField\Field;
use Marussia\ContentField\FieldData;
use Marussia\ContentField\Actions\FillAction;

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

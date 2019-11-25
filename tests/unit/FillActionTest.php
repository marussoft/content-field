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
        $editFilledAction = $this->fillAction();
        $fieldData = \Mockery::mock(FieldData::class);
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function fillAction()
    {
        return new FillAction($this->fieldCollector());
    }

    private function fieldCollector()
    {
        return new FieldHandlerCollector(['test' => TestFillField::class]);
    }
}

class TestFillField implements FieldHandlerInterface
{
    public function getStorageValueType() : string
    {

    }

    public function getStorageValueSize() : int
    {

    }

    public function fill(FieldData $fieldData) : Field
    {
        return \Mockery::mock(Field::class);
    }

    public function getInput(FieldData $fieldData) : Field
    {

    }

    public function getInputWithValue(FieldData $fieldData) : Field
    {

    }
}

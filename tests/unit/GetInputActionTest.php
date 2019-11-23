<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldsCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Entities\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\GetInputAction;

class GetInputActionTest extends TestCase
{
    public function testExecute()
    {
        $editFilledAction = $this->getInputAction();
        $fieldData = $this->fieldData();
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function getInputAction()
    {
        return new GetInputAction($this->fieldsCollector());
    }

    private function fieldData()
    {
        return new FieldData;
    }

    private function fieldsCollector()
    {
        return new FieldsCollector(['test' => TestInputField::class]);
    }
}

class TestInputField implements FieldHandlerInterface
{
    public function getStorageValueType() : string
    {

    }

    public function getStorageValueSize() : int
    {

    }

    public function fill(FieldData $fieldData) : Field
    {

    }

    public function getInput(FieldData $fieldData) : Field
    {
        return new Field;
    }

    public function editFilled(FieldData $fieldData) : Field
    {

    }
}

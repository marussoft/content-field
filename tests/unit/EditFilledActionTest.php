<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldsCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Entities\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\EditFilledAction;

class EditFilledActionTest extends TestCase
{
    public function testExecute()
    {
        $editFilledAction = $this->editFilledAction();
        $fieldData = $this->fieldData();
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function editFilledAction()
    {
        return new EditFilledAction($this->fieldsCollector());
    }

    private function fieldData()
    {
        return new FieldData;
    }

    private function fieldsCollector()
    {
        return new FieldsCollector(['test' => TestEditField::class]);
    }
}

class TestEditField implements FieldHandlerInterface
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

    }

    public function editFilled(FieldData $fieldData) : Field
    {
        return new Field;
    }
}

<?php

namespace Nemundo\Workflow\App\Workflow\Com\ListBox;

use Nemundo\Core\Base\AbstractDataType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\AllListBoxItem;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\ClosedListBoxItem;
use Nemundo\Workflow\App\Workflow\Com\ListBox\Item\OpenListBoxItem;

class OpenClosedWorkflowListBox extends BootstrapListBox
{

    /**
     * @var int
     */
    public $defaultValue;

    protected function loadCom()
    {
        parent::loadCom();
        //$this->name = 'status';
        $this->defaultValue = (new OpenListBoxItem())->id;
    }


    public function getHtml()
    {

        //$this->name = 'status';
        $this->label = 'Status';

        $this->submitOnChange = true;
        $this->emptyValueAsDefault = false;

        $this->addListBoxItem(new AllListBoxItem());
        $this->addListBoxItem(new OpenListBoxItem());
        $this->addListBoxItem(new ClosedListBoxItem());

        if ($this->getValue() == '') {
            $this->value = $this->defaultValue;
        } else {
            $this->value = $this->getValue();
        }

        return parent::getHtml();

    }


    public function getValue()
    {
        $value = parent::getValue();

        if ($value == '') {
            $value = $this->defaultValue;
        }

        return $value;

    }


    public function isAll()
    {

        $value = $this->compareValue(new AllListBoxItem());
        return $value;

    }


    public function isOpen()
    {
        $value = $this->compareValue(new OpenListBoxItem());
        return $value;

    }


    public function isCloesed()
    {
        $value = $this->compareValue(new ClosedListBoxItem());
        return $value;
    }


    private function compareValue(AbstractDataType $dataType)
    {

        $value = false;
        if ($this->getValue() == $dataType->id) {
            $value = true;
        }
        return $value;

    }


    private function addListBoxItem(AbstractDataType $listBoxItem)
    {
        $this->addItem($listBoxItem->id, $listBoxItem->name);
    }


}
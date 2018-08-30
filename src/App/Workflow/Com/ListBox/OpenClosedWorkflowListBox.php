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
    public $defaultValue = 1;  // (new OpenListBoxItem())->id;  // 1;


    protected function loadCom()
    {
        parent::loadCom();
        $this->name = 'status';




    }


    public function getHtml()
    {

        $this->label = 'Status';

        $this->submitOnChange = true;
        $this->emptyValueAsDefault = false;

        //$this->addItem(0, 'Alle');
        //$this->addItem(1, 'Offene');
        //$this->addItem(2, 'Abgeschlossene');

        $this->addListBoxItem(new AllListBoxItem());
        $this->addListBoxItem(new OpenListBoxItem());
        $this->addListBoxItem(new ClosedListBoxItem());

        if ($this->getValue() == '') {
            $this->value = $this->defaultValue;  // 0;
        } else {
            $this->value = $this->getValue();
        }

        return parent::getHtml();

    }


    private function addListBoxItem(AbstractDataType $listBoxItem) {
        $this->addItem($listBoxItem->id,$listBoxItem->name);
    }


}
<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Design\Bootstrap\FormElement\BootstrapListBox;

class OpenClosedWorkflowListBox extends BootstrapListBox
{


    public function getHtml()
    {


        $this->label = 'Status';
        $this->submitOnChange = true;
        $this->emptyValueAsDefault = false;

        $this->addItem(0, 'Alle');
        $this->addItem(1, 'Offene');
        $this->addItem(2, 'Abgeschlossene');
        if ($this->getValue() == '') {
            $this->value = 1;
        } else {
            $this->value = $this->getValue();
        }


        return parent::getHtml();

    }





}
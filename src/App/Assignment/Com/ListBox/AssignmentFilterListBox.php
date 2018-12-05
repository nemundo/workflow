<?php

namespace Nemundo\Workflow\App\Assignment\Com\ListBox;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\App\Assignment\Data\AssignmentFilter\AssignmentFilterReader;

class AssignmentFilterListBox extends BootstrapListBox
{

    public function getHtml()
    {

        $this->label = 'Quelle';

        $reader = new AssignmentFilterReader();
        $reader->addOrder($reader->model->filterLabel);
        foreach ($reader->getData() as $filterRow) {
            $this->addItem($filterRow->contentTypeId, $filterRow->filterLabel);
        }

        return parent::getHtml();

    }

}
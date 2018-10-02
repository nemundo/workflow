<?php

namespace Nemundo\Workflow\App\Notification\Com\ListBox;


use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilterReader;

class NotificationFilterListBox extends BootstrapListBox
{

    public function getHtml()
    {

        $contentType = new ContentTypeParameter();

        $this->name =$contentType->getParameterName();
        $this->label = 'Quelle';
        $this->value = $this->getValue();

        $reader = new NotificationFilterReader();
        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $filterRow) {
            $this->addItem($filterRow->contentTypeId, $filterRow->contentType->contentType);
        }

        return parent::getHtml();

    }

}
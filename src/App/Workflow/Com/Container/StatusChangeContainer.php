<?php

namespace Nemundo\Workflow\App\Workflow\Com\Container;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Core\Event\EventTrait;

class StatusChangeContainer extends AbstractHtmlContainerList
{

    use EventTrait;

    public function loadCom()
    {
        parent::loadCom();

        $this->loadEventCollection();

    }


    public function getHtml()
    {

        $this->afterSubmitEvent->run(null);
        $this->checkRedirect();

        return parent::getHtml();
    }


}
<?php

namespace Nemundo\Workflow\Item;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Web\Site\AbstractSite;


// AbstractProcessView
class AbstractProcessItem extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractSite
     */
    public $statusChangeRedirectSite;


}
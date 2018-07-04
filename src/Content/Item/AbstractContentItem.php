<?php

namespace Nemundo\Workflow\Content\Item;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Workflow\Content\Type\AbstractContentType;

class AbstractContentItem extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var AbstractContentType
     */
    public $contentType;


}
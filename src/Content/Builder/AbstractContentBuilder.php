<?php

namespace Nemundo\Workflow\Content\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Content\Type\AbstractContentType;

abstract class AbstractContentBuilder extends AbstractBase
{

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var AbstractContentType
     */
    public $contentType;


    abstract public function createItem();


    protected function check()
    {

        if (!$this->checkProperty('dataId')) {
            exit;
        }

        if (!$this->checkObject('contentType', $this->contentType, AbstractContentType::class)) {
            exit;
        }


    }


}
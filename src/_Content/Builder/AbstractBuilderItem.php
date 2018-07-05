<?php

namespace Nemundo\App\Content\Builder;


class AbstractBuilderItem
{

    /**
     * @var string
     */
    private $dataId;

    public function __construct($dataId)
    {
        $this->dataId = $dataId;
    }


}
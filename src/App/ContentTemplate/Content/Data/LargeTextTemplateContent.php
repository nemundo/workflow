<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Data;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\LargeTextTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeText;

class LargeTextTemplateContent extends LargeText
{

    /**
     * @var string
     */
    public $parentId;

    public function save()
    {


        $dataId = parent::save();

        (new LargeTextTemplateContentType())->onCreate($dataId, $this->parentId);

        return $dataId;

    }

}
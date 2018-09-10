<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Data;


use Nemundo\Workflow\App\ContentTemplate\Content\Type\ImageTemplateContentType;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImage;

class TemplateImageContent extends ContentTemplateImage
{

    /**
     * @var string
     */
    public $parentId;

    public function save()
    {
        $dataId = parent::save();

        $contentType = new ImageTemplateContentType();
        $contentType->onCreate($dataId, $this->parentId);

        return $dataId;

    }

}
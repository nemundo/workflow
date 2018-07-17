<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\ImageContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\TemplateImageItem;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageModel;

class ImageTemplateContentType extends AbstractContentType
{

    //use UserAccessTrait;

    protected function loadData()
    {
        $this->name = 'Image (Template)';
        $this->id = '265611fc-189f-4d8d-85cf-0b96edad40ef';
        $this->modelClass = ContentTemplateImageModel::class;
        $this->itemClass = TemplateImageItem::class;
        $this->formClass = ImageContentTemplateForm::class;
    }

}
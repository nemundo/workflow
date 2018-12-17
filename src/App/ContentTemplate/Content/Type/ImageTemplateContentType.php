<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Model\Data\Property\File\ImageDataProperty;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\ImageContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\TemplateImageView;

class ImageTemplateContentType extends AbstractTreeContentType
{

    /**
     * @var ImageDataProperty
     */
    public $image;


    protected function loadType()
    {
        $this->contentLabel = 'Bild';
        $this->contentId = '265611fc-189f-4d8d-85cf-0b96edad40ef';
        //$this->modelClass = ContentTemplateImageModel::class;
        $this->viewClass = TemplateImageView::class;
        $this->formClass = ImageContentTemplateForm::class;

    }


    public function saveType()
    {

        /*
        $content = new ContentTemplateImage();  // TemplateImageContent();
        //$content->parentId = $this->parentId;
        $content->image->fromFileRequest($this->image->getFileRequest());
        $dataId = $content->save();

        $this->saveContentLog();*/

    }


    public function deleteType()
    {
        // TODO: Implement deleteItem() method.
    }

}
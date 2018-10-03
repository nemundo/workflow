<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractModelDataTreeContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Model\Data\Property\File\ImageDataProperty;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\ImageContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\TemplateImageView;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImage;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageModel;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;

class ImageTemplateContentType extends AbstractTreeContentType   // AbstractDataWorkflowStatus   // AbstractDataContentType  // AbstractContentType
{

    //use WorkflowIdTrait;

    /**
     * @var ImageDataProperty
     */
    public $image;


    protected function loadData()
    {
        $this->contentName = 'Bild';
        $this->contentId = '265611fc-189f-4d8d-85cf-0b96edad40ef';
        //$this->modelClass = ContentTemplateImageModel::class;
        $this->viewClass = TemplateImageView::class;
        $this->formClass = ImageContentTemplateForm::class;

        //$this->changeWorkflowStatus= false;
        //$this->statusText = 'Bild wurde hochgeladen';

        //$this->image = new ImageDataProperty();


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
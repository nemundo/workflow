<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Com\Html\Form\AcceptFileType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\TemplateImageContent;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImage;

class ImageContentTemplateForm extends BootstrapForm  // ContentTreeForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $image;

    public function getHtml()
    {

        $this->image = new BootstrapFileUpload($this);
        $this->image->label = 'Image';
        $this->image->acceptFileType = AcceptFileType::IMAGE;

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $content = new ContentTemplateImage();  // TemplateImageContent();
        //$content->parentId = $this->parentId;
        $content->image->fromFileRequest($this->image->getFileRequest());
        $dataId = $content->save();

        $this->afterSubmitEvent->run($dataId);  // runAfterSubmitEvent-> ($dataId);

        //return parent::onSubmit();

    }


}
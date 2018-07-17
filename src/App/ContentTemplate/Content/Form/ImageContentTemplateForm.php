<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\ContentTreeForm;
use Nemundo\Com\Html\Form\AcceptFileType;
use Nemundo\Design\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Workflow\App\ContentTemplate\Content\Data\TemplateImageContent;

class ImageContentTemplateForm extends ContentTreeForm
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

        $content = new TemplateImageContent();
        $content->parentId = $this->parentId;
        $content->image->fromFileRequest($this->image->getFileRequest());
        $dataId = $content->save();

        $this->runAfterSubmitEvent($dataId);

    }


}
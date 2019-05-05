<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Workflow\App\ContentTemplate\Content\Type\TemplateFileType;

class TemplateFileTypeForm extends AbstractContentTreeForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'Datei';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $type = new TemplateFileType();
        $type->parentContentType = $this->parentContentType;
        //$type->fromFileRequest($this->file->getFileRequest());

    }

}
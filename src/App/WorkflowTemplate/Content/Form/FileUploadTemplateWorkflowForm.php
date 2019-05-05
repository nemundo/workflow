<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Form;


use Nemundo\App\Content\Form\AbstractContentTreeForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\FileTemplateStatus;


class FileUploadTemplateWorkflowForm extends AbstractContentTreeForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'Datei';
        $this->file->multiUpload = true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        foreach ($this->file->getMultiFileRequest() as $fileRequest) {
            $type = new FileTemplateStatus();
            $type->parentContentType = $this->parentContentType;
            $type->fileRequest = $fileRequest;
            $type->saveType();
        }

    }

}
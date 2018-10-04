<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\App\Content\Type\Workflow\AbstractWorkflowStatus;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Web\Http\FileRequest\FileRequest;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\FileUploadTemplateWorkflowForm;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\File;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileReader;

// FileTemplateWorkflowStatus
class FileUploadTemplateWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var FileRequest
     */
    public $fileRequest;


    protected function loadData()
    {
        $this->contentName = 'Dokument';
        $this->contentId = '8d49707a-9763-4b0d-b169-b50a939ddb1d';
        $this->changeStatus = false;
        $this->formClass = FileUploadTemplateWorkflowForm::class;
        //$this->viewClass = FileUploadContentView::class;

    }


    public function saveType()
    {

        $data = new File();
        $data->file->fromFileRequest($this->fileRequest);
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function getSubject()
    {

        $row = (new FileReader())->getRowById($this->dataId);

        $hyperlink = new Hyperlink();
        $hyperlink->content = $row->file->getFilename();
        $hyperlink->url = $row->file->getUrl();

        $subject = 'Upload ' . $hyperlink->getHtmlString();

        return $subject;

    }

}
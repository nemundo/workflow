<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
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


    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $filenameOrginal;


    protected function loadType()
    {
        $this->contentLabel = 'Dokument';
        $this->contentId = '8d49707a-9763-4b0d-b169-b50a939ddb1d';
        $this->changeStatus = false;
        $this->formClass = FileUploadTemplateWorkflowForm::class;
        //$this->viewClass = FileUploadContentView::class;

        // wieder aktivieren
        $this->showStatus = false;

    }


    public function saveType()
    {

        $data = new File();

        if ($this->fileRequest !== null) {
            $data->file->fromFileRequest($this->fileRequest);
        }

        if ($this->filename !== null) {
            $data->file->fromFilename($this->filename, $this->filenameOrginal);
        }

        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function getFile()
    {

        $row = (new FileReader())->getRowById($this->dataId);
        return $row->file;

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
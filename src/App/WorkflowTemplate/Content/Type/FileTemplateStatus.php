<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Core\File\Base64File;
use Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Web\Http\FileRequest\FileRequest;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\FileUploadTemplateWorkflowForm;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\File;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileReader;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileRow;

class FileTemplateStatus extends AbstractWorkflowStatus
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

    /**
     * @var FileRow
     */
    private $row;

    protected function loadType()
    {
        $this->contentLabel = 'Dokument';
        $this->contentName = 'document';
        $this->contentId = '8d49707a-9763-4b0d-b169-b50a939ddb1d';
        $this->changeStatus = false;
        $this->formClass = FileUploadTemplateWorkflowForm::class;
        //$this->viewClass = FileUploadContentView::class;

        // wieder aktivieren
        $this->showMenu = false;

    }


    protected function loadData()
    {

        $this->row = (new FileReader())->getRowById($this->dataId);

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

        $hyperlink = new Hyperlink();
        $hyperlink->content = $this->row->file->getFilename();
        $hyperlink->url = $this->row->file->getUrl();

        $subject = 'Upload ' . $hyperlink->getHtmlString();

        return $subject;

    }


    public function getJson()
    {

        $data = parent::getJson();

        $base64 = (new Base64File($this->row->file->getFullFilename()))->getBase64();

        $data['filename'] = $this->row->file->getFilename();
        $data['base64'] = $base64;

        return $data;

    }

}
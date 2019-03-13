<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Com;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Content\Data\ContentLog\ContentLogModel;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Html\Formatting\Strike;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\User\Data\User\UserModel;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\FileTemplateStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileReader;
use Nemundo\Workflow\App\WorkflowTemplate\Parameter\FileParameter;
use Nemundo\Workflow\App\WorkflowTemplate\Site\Delete\FileDeleteSite;

class FileTable extends AdminTable
{

    /**
     * @var string
     */
    public $dataId;

    public function getHtml()
    {

        $header = new TableHeader($this);
        $header->addText('Dokument');
        $header->addText('Ersteller');
        $header->addEmpty();

        $fileReader = new FileReader();

        $contentLogModel = new ContentLogModel();
        $fileReader->addFieldByModel($contentLogModel);

        $userModel = new UserModel();
        $fileReader->addFieldByModel($userModel);

        $join = new ModelJoin($fileReader);
        $join->externalModel = $contentLogModel;
        $join->type = $fileReader->model->id;
        $join->externalType = $contentLogModel->dataId;

        $join = new ModelJoin($fileReader);
        $join->externalModel = $userModel;
        $join->type = $contentLogModel->userCreatedId;;
        $join->externalType = $userModel->id;

        $fileReader->filter->andEqual($contentLogModel->parentId, $this->dataId);
        $fileReader->filter->andEqual($contentLogModel->contentTypeId, (new FileTemplateStatus())->contentId);
        foreach ($fileReader->getData() as $fileRow) {

            $row = new TableRow($this);

            if (!$fileRow->delete) {
                $link = new WorkflowFancyboxHyperlink($row);
                $link->filename = $fileRow->file->getFilename();
                $link->url = $fileRow->file->getUrl();
            } else {
                $stroke = new Strike($row);
                $stroke->content = $fileRow->file->getFilename();
            }

            $userDisplay = $fileRow->getModelValue($userModel->displayName);
            $dateTimeCreated = new DateTime($fileRow->getModelValue($contentLogModel->dateTimeCreated));

            $row->addText($userDisplay . ' ' . $dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            if (!$fileRow->delete) {
                $site = clone(FileDeleteSite::$site);
                $site->addParameter(new FileParameter($fileRow->id));
                $site->addParameter(new DataIdParameter($this->dataId));
                $row->addIconSite($site);
            } else {
                $row->addEmpty();
            }

        }

        return parent::getHtml();

    }

}
<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Com;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Content\Data\ContentLog\ContentLogModel;
use Nemundo\App\Content\Data\ContentLog\ContentLogReader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\User\Data\User\UserModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileReader;

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


        $reader = new FileReader();

        $contentLogModel = new ContentLogModel();
        $reader->addFieldByModel($contentLogModel);

        $userModel = new UserModel();
        $reader->addFieldByModel($userModel);

        $join = new ModelJoin($reader);
        $join->externalModel = $contentLogModel;
        $join->type = $reader->model->id;
        $join->externalType = $contentLogModel->dataId;

        $join = new ModelJoin($reader);
        $join->externalModel = $userModel;
        $join->type = $contentLogModel->userCreatedId;;
        $join->externalType = $userModel->id;

        $reader->filter->andEqual($contentLogModel->parentId, $this->dataId);


        foreach ($reader->getData() as $dateiRow) {

            $row = new TableRow($this);

            $row->addHyperlink($dateiRow->file->getUrl(), $dateiRow->file->getFilename());

            // show image bzw. detail ansicht

            $userDisplay = $dateiRow->getModelValue($userModel->displayName);
            $dateTimeCreated = new DateTime($dateiRow->getModelValue($contentLogModel->dateTimeCreated));

            $row->addText($userDisplay.' '.$dateTimeCreated->getShortDateTimeLeadingZeroFormat());

        }

        return parent::getHtml();

    }

}
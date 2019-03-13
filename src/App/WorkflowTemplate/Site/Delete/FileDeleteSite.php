<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Site\Delete;


use Nemundo\App\Content\Data\ContentLog\ContentLogReader;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Url\UrlReferer;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Type\File\FileDeleteTemplateStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileUpdate;
use Nemundo\Workflow\App\WorkflowTemplate\Parameter\FileParameter;

class FileDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var FileDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'delete-file';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        FileDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $fileId = (new FileParameter())->getValue();
        $dataId = (new DataIdParameter())->getValue();

        $update = new FileUpdate();
        $update->delete = true;
        $update->updateById($fileId);

        $reader = new ContentLogReader();
        $reader->filter->andEqual($reader->model->dataId, $dataId);
        $row = $reader->getRow();

        $contentType = $row->contentType->getContentTypeClassObject();
        $contentType->dataId = $dataId;

        $status = new FileDeleteTemplateStatus();
        $status->dataId = $fileId;
        $status->parentContentType = $contentType;
        $status->saveType();

        (new UrlReferer())->redirect();

    }

}
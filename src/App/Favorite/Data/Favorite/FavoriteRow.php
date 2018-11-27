<?php

namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var FavoriteModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
     */
    public $contentType;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var \Nemundo\User\Data\User\UserRow
     */
    public $user;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->contentTypeId = $this->getModelValue($model->contentTypeId);
        if ($model->contentType !== null) {
            $this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
        }
        $this->dataId = $this->getModelValue($model->dataId);
        $this->userId = $this->getModelValue($model->userId);
        if ($model->user !== null) {
            $this->loadNemundoUserDataUserUseruserRow($model->user);
        }
    }

    private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model)
    {
        $this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
    }

    private function loadNemundoUserDataUserUseruserRow($model)
    {
        $this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
    }
}
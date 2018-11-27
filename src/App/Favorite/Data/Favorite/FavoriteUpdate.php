<?php

namespace Nemundo\Workflow\App\Favorite\Data\Favorite;

use Nemundo\Model\Data\AbstractModelUpdate;

class FavoriteUpdate extends AbstractModelUpdate
{
    /**
     * @var FavoriteModel
     */
    public $model;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    public $userId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new FavoriteModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        $this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
        $this->typeValueList->setModelValue($this->model->userId, $this->userId);
        parent::update();
    }
}
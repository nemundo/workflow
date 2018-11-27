<?php

namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;

use Nemundo\Model\Data\AbstractModelUpdate;

class WikiContentUpdate extends AbstractModelUpdate
{
    /**
     * @var WikiContentModel
     */
    public $model;

    /**
     * @var string
     */
    public $pageId;

    /**
     * @var string
     */
    public $contentTypeId;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var bool
     */
    public $delete;

    /**
     * @var bool
     */
    public $itemOrder;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WikiContentModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
        $this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
        $this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
        $this->typeValueList->setModelValue($this->model->delete, $this->delete);
        $this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
        parent::update();
    }
}
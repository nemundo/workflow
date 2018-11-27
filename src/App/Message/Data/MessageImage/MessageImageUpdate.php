<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;

use Nemundo\Model\Data\AbstractModelUpdate;

class MessageImageUpdate extends AbstractModelUpdate
{
    /**
     * @var MessageImageModel
     */
    public $model;

    /**
     * @var \Nemundo\Model\Data\Property\File\ImageDataProperty
     */
    public $image;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageImageModel();
        $this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
    }

    public function update()
    {
        parent::update();
    }
}
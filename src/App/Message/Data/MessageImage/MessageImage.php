<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImage extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageImageModel
*/
protected $model;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

public function __construct() {
parent::__construct();
$this->model = new MessageImageModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function save() {
$id = parent::save();
return $id;
}
}
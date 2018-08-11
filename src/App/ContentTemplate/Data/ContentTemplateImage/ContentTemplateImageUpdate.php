<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentTemplateImageUpdate extends AbstractModelUpdate {
/**
* @var ContentTemplateImageModel
*/
public $model;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function update() {
parent::update();
}
}
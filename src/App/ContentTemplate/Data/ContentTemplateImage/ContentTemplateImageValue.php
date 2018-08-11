<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentTemplateImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
}
}
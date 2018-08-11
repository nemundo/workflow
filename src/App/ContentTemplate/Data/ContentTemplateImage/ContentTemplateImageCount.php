<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentTemplateImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
}
}
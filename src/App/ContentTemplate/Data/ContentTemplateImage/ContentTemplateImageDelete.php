<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentTemplateImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
}
}
<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentTemplateImageId extends AbstractModelIdValue {
/**
* @var ContentTemplateImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
}
}
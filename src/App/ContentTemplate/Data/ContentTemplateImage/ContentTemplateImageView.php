<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\View\ModelView;
class ContentTemplateImageView extends ModelView {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTemplateImageModel();
}
}
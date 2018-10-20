<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Model\View\ModelView;
class ImageContentTemplateView extends ModelView {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ImageContentTemplateModel();
}
}
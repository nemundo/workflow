<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\View\ModelView;
class LargeTextContentTemplateView extends ModelView {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextContentTemplateModel();
}
}
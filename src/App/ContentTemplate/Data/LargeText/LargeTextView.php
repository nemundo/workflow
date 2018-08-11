<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Model\View\ModelView;
class LargeTextView extends ModelView {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextModel();
}
}
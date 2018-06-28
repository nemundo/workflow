<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
use Nemundo\Model\View\ModelView;
class StreamView extends ModelView {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamModel();
}
}
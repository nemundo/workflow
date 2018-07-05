<?php
namespace Nemundo\App\Content\Data\ContentType;
use Nemundo\Model\View\ModelView;
class ContentTypeView extends ModelView {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTypeModel();
}
}
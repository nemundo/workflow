<?php
namespace Nemundo\Workflow\App\News\Data\News;
use Nemundo\Model\Form\ModelFormUpdate;
class NewsFormUpdate extends ModelFormUpdate {
/**
* @var NewsModel
*/
public $model;

protected function loadCom() {
$this->model = new NewsModel();
}
}
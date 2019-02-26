<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var NewsModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new NewsModel();
}
}
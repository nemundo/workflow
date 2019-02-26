<?php
namespace Nemundo\Workflow\App\News\Data\News;
use Nemundo\Model\View\ModelView;
class NewsView extends ModelView {
/**
* @var NewsModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new NewsModel();
}
}
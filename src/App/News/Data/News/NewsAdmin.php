<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var NewsModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  NewsModel();
}
}
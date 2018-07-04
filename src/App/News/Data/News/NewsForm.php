<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var NewsModel
*/
public $model;

protected function loadCom() {
$this->model = new NewsModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}
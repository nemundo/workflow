<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
class WordForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var WordModel
*/
public $model;

protected function loadCom() {
$this->model = new WordModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}
<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
use Nemundo\Model\Form\ModelFormUpdate;
class WordFormUpdate extends ModelFormUpdate {
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
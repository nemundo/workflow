<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
$this->model = new FavoriteModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}
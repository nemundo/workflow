<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FavoriteModel();
$this->label = $this->model->label;
}
}
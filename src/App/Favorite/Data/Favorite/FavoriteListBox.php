<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var FavoriteModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new FavoriteModel();
$this->label = $this->model->label;
}
}
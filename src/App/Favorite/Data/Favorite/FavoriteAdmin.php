<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var FavoriteModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  FavoriteModel();
}
}
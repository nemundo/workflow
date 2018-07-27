<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
use Nemundo\Model\Form\ModelFormUpdate;
class FavoriteFormUpdate extends ModelFormUpdate {
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
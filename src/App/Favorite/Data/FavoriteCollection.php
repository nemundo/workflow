<?php
namespace Nemundo\Workflow\App\Favorite\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FavoriteCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Favorite\Data\Favorite\FavoriteModel());
}
}
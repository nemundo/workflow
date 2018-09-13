<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentTemplateCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\Comment\CommentModel());
$this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageModel());
$this->addModel(new \Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextModel());
}
}
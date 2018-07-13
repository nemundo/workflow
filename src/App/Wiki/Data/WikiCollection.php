<?php
namespace Nemundo\Workflow\App\Wiki\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WikiCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Wiki\Data\Hyperlink\HyperlinkModel());
$this->addModel(new \Nemundo\Workflow\App\Wiki\Data\Mail\MailModel());
$this->addModel(new \Nemundo\Workflow\App\Wiki\Data\Wiki\WikiModel());
$this->addModel(new \Nemundo\Workflow\App\Wiki\Data\WikiContentType\WikiContentTypeModel());
$this->addModel(new \Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel());
}
}
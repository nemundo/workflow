<?php

namespace Nemundo\Workflow\App\Message\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Message\Data\Message\MessageReader;
use Nemundo\Workflow\App\Message\Parameter\MessageParameter;
use Nemundo\Workflow\App\Message\Usergroup\MessageUsergroup;

class MessageSite extends AbstractSite
{

    /**
     * @var MessageSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Message';
        $this->url = 'message';

        $this->restricted = true;
        $this->addRestrictedUsergroup(new MessageUsergroup());

        new MessageNewSite($this);
        new MessageItemSite($this);

    }


    protected function registerSite()
    {
        MessageSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $btn = new AdminButton($page);
        $btn->content = 'Neu';
        $btn->site = MessageNewSite::$site;


        $table = new AdminClickableTable($page);


        $reader = new MessageReader();

        foreach ($reader->getData() as $messageRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($messageRow->subject . ' (' . $messageRow->count . ')');

            $site = clone(MessageItemSite::$site);
            $site->addParameter(new MessageParameter($messageRow->id));
            $row->addClickableSite($site);


        }


        $page->render();


    }
}
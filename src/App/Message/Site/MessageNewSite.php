<?php

namespace Nemundo\Workflow\App\Message\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Message\ContentType\MessageContentType;
use Nemundo\Workflow\App\Message\Form\MessageContentForm;

class MessageNewSite extends AbstractSite
{

    /**
     * @var MessageNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'MessageNew';
        $this->url = 'message-new';

    }


    protected function registerSite()
    {
        MessageNewSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //$form = new MessageContentForm($page);

        $form = (new MessageContentType())->getForm($page);
        $form->redirectSite = MessageSite::$site;


        $page->render();


    }

}
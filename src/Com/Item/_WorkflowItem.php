<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Com\Container\AbstractContainer;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Workflow\Com\WorkflowIdTrait;

// WorkflowItemView
class WorkflowItem extends Div
{

    use WorkflowIdTrait;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $user;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $workflowItemId;

    /**
     * @var bool
     */
    public $draft = false;

    /**
     * @var Div
     */
    private $headerDiv;

    /**
     * @var Div
     */
    private $contentDiv;


    protected function loadCom()
    {
        parent::loadCom();

        $this->addCssClass('card');
        $this->addCssClass('mb-3');

        $this->headerDiv = new Div();
        $this->headerDiv->addCssClass('card-header');

        $this->contentDiv = new Div();
        $this->contentDiv->addCssClass('card-body');

    }


    public function addCom(AbstractContainer $com)
    {
        $this->contentDiv->addCom($com);
    }


    public function getHtml()
    {


        $draftText = '';
        if ($this->draft) {
            $draftText = ' (Entwurf)';
        }


        $this->headerDiv->content = $this->title .$draftText. ': ' . $this->user . ' ' . $this->dateTime->getShortDateTimeLeadingZeroFormat();

        parent::addCom($this->headerDiv);
        parent::addCom($this->contentDiv);


        return parent::getHtml();
    }

}
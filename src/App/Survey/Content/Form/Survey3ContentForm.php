<?php

namespace Nemundo\Workflow\App\Survey\Content\Form;


use Nemundo\App\Content\Form\AbstractContentHtmlContainerList;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Event\EventTrait;
use Nemundo\Core\Random\RandomUniqueId;
use Nemundo\Web\Site\Site;
use Nemundo\Workflow\App\Survey\Content\Type\Survey3ContentType;
use Nemundo\Workflow\App\Survey\Data\Survey3\Survey3Form;
use Nemundo\Workflow\App\Survey\Data\Survey3\Survey3Table;

class Survey3ContentForm extends AbstractContentHtmlContainerList
{


   /* use EventTrait;

    protected function loadCom()
    {
        parent::loadCom();
        $this->loadEventCollection();
    }

    protected function getDataId()
    {

        $dataIdParameter = new DataIdParameter();
        //$dataId = $dataIdParameter->createUniqueId();

        $dataId = $dataIdParameter->getValue();

        if (!$dataIdParameter->exists()) {

            $dataId = (new RandomUniqueId())->getUniqueId();
            $dataIdParameter->setValue($dataId);

            $this->afterSubmitEvent->run($dataId);

            $site = new Site();
            $site->addParameter($dataIdParameter);
            $site->redirect();

        }

        return $dataId;

    }*/


    public function getHtml()
    {


        //$dataIdParameter->setValue($dataId);

        // $this->value = $dataId;

        $dataId = $this->getDataId();

        $form = new Survey3Form($this);
        $form->model->dataId->defaultValue = $dataId;

        $table = new Survey3Table($this);
        $table->filter->andEqual($table->model->dataId, $dataId);


        //$p = new Paragraph($this);
        //$p->content = 'Merci.';


        return parent::getHtml();
    }

}
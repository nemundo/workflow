<?php

namespace Nemundo\Workflow\App\Favorite\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Favorite\Data\FavoriteCollection;

class FavoriteInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new FavoriteCollection());


    }
}
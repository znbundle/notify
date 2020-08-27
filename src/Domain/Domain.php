<?php

namespace PhpBundle\Notify\Domain;

use PhpLab\Core\Domain\Interfaces\DomainInterface;

class Domain implements DomainInterface
{

    public function getName()
    {
        return 'notify';
    }

}
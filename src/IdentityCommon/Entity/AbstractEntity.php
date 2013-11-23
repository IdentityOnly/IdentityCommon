<?php
namespace IdentityCommon\Entity;

abstract class AbstractEntity
{
    protected $hydrator;
    
    public function getHydrator() {
        if(!$this->hydrator) {
            $hydrator = new ClassMethods;
            $hydrator->setUnderscoreSeparatedKeys(false);
            $hydrator->addFilter('getHydrator', new Filter\MethodMatchFilter('getHydrator'), Filter\FilterComposite::CONDITION_AND);

            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
        return $this;
    }
}

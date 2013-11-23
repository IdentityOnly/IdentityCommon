<?php
namespace IdentityCommon\Service;

use IdentityCommon\Entity;

class Message extends AbstractService
{
    public function saveReceivedMessage(Entity\ReceivedMessage $message) {
        $entityManager = $this->getEntityManager();
        
        $entityManager->persist($message);
        $entityManager->flush();
        
        return $message;
    }
}

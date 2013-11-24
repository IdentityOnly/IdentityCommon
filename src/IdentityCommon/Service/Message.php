<?php
namespace IdentityCommon\Service;

use IdentityCommon\Entity;

class Message extends AbstractService
{
    public function findUnprocessedReceivedMessages() {
        $entityManager = $this->getEntityManager();
        
        return $entityManager->getRepository('IdentityCommon\Entity\ReceivedMessage')
            ->findBy(array(
                'processed' => false
            ));
    }

    public function saveReceivedMessage(Entity\ReceivedMessage $message) {
        $entityManager = $this->getEntityManager();
        
        $entityManager->persist($message);
        $entityManager->flush();
        
        return $message;
    }
}

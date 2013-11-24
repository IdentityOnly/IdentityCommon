<?php
namespace IdentityCommon\Service;

use IdentityCommon\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use Zend\Mail\Message as MailMessage;

class User extends AbstractService
{
    public function findById($id) {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository('IdentityCommon\Entity\User')->find($id);
    }
    
    public function findByEmail($email) {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository('IdentityCommon\Entity\User')->findOneBy(array(
            'email' => $email
        ));
    }
    
    public function findForMailMessage(MailMessage $message) {
        $addresses = $message->getHeaders()->get('To')->getAddressList();
        $emailAddresses = array();
        foreach($addresses as $address) {
            $emailAddresses[] = $address->getEmail();
        }
        
        return $this->findByEmail($emailAddresses);
    }
}

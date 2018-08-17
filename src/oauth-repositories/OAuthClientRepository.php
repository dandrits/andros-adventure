<?php

use Doctrine\ORM\EntityRepository;
use OAuth2\Storage\ClientCredentialsInterface;

class OAuthClientRepository extends EntityRepository implements ClientCredentialsInterface
{
    public function getClientDetails($clientName)
    {
        
        global $entityManager;
        
        $client = $entityManager->getRepository('OAuthClient')->findOneBy(['client_name' => $clientName]);
        if ($client) {
            $client = $client->toArray();
        }
        return $client;
    }

    public function getClientDetailsById($clientId)
    {
        
        global $entityManager;
        
        $client = $entityManager->getRepository('OAuthClient')->findOneBy(['id' => $clientId]);
        if ($client) {
            $client = $client->toArray();
        }
        return $client;
    }
    
    public function checkClientCredentials($clientName, $clientSecret = NULL)
    {
        global $entityManager;
        
        $client = $entityManager->getRepository('OAuthClient')->findOneBy(['client_name' => $clientName]);
        if ($client) {
            return $client->verifyClientSecret($clientSecret);
        }
        return false;
    }

    public function checkRestrictedGrantType($clientId, $grantType)
    {
        // we do not support different grant types per client in this example
        return true;
    }

    public function isPublicClient($clientId)
    {
        return false;
    }

    public function getClientScope($clientId)
    {
        return null;
    }
}

?>
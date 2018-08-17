<?php

use Doctrine\ORM\EntityRepository;
use OAuth2\Storage\AccessTokenInterface;

class OAuthAccessTokenRepository extends EntityRepository implements AccessTokenInterface
{
    public function getAccessToken($oauthToken)
    {
        
        global $entityManager;
        
        $token = $entityManager->getRepository('OAuthAccessToken')->findOneBy(['token' => $oauthToken]);
        if ($token) {
            $token = $token->toArray();
            $token['expires'] = $token['expires']->getTimestamp();
        }
        return $token;
    }

    public function setAccessToken($oauthToken, $clientName, $userEmail, $expires, $scope = null)
    {

        $client = $this->_em->getRepository('OAuthClient')
                            ->findOneBy(['client_name' => $clientName]);
        $user = $this->_em->getRepository('OAuthUser')
                            ->findOneBy(['id' => $userEmail]);
        $token = OAuthAccessToken::fromArray([
            'token'     => $oauthToken,
            'client'    => $client,
            'user'      => $user,
            'expires'   => (new \DateTime())->setTimestamp($expires),
            'scope'     => $scope,
        ]);
        $this->_em->persist($token);
        $this->_em->flush();
    }
}
?>
<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TblOauthAccessTokens
 *
 * @ORM\Table(name="tbl_oauth_access_tokens", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CA42527C5F37A13B", columns={"token"})}, indexes={@ORM\Index(name="IDX_CA42527C19EB6921", columns={"client_id"}), @ORM\Index(name="IDX_CA42527CA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class TblOauthAccessTokens
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=40, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires", type="datetime", nullable=false)
     */
    private $expires;

    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", length=50, nullable=true)
     */
    private $scope;

    /**
     * @var \TblOauthClients
     *
     * @ORM\ManyToOne(targetEntity="TblOauthClients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \TblOauthUsers
     *
     * @ORM\ManyToOne(targetEntity="TblOauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return TblOauthAccessTokens
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     *
     * @return TblOauthAccessTokens
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope
     *
     * @param string $scope
     *
     * @return TblOauthAccessTokens
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set client
     *
     * @param \TblOauthClients $client
     *
     * @return TblOauthAccessTokens
     */
    public function setClient(\TblOauthClients $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \TblOauthClients
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param \TblOauthUsers $user
     *
     * @return TblOauthAccessTokens
     */
    public function setUser(\TblOauthUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TblOauthUsers
     */
    public function getUser()
    {
        return $this->user;
    }
}

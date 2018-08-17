<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TblOauthClients
 *
 * @ORM\Table(name="tbl_oauth_clients", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_13CE8101E77ABE2B", columns={"client_name"})}, indexes={@ORM\Index(name="handler_id", columns={"handler_id"})})
 * @ORM\Entity
 */
class TblOauthClients
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
     * @ORM\Column(name="client_name", type="string", length=50, nullable=false)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_secret", type="string", length=128, nullable=false)
     */
    private $clientSecret;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_uri", type="string", length=255, nullable=false)
     */
    private $redirectUri;

    /**
     * @var boolean
     *
     * @ORM\Column(name="blocked", type="boolean", nullable=false)
     */
    private $blocked = '0';

    /**
     * @var \TblUsers
     *
     * @ORM\ManyToOne(targetEntity="TblUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="handler_id", referencedColumnName="id")
     * })
     */
    private $handler;



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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return TblOauthClients
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientSecret
     *
     * @param string $clientSecret
     *
     * @return TblOauthClients
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get clientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set redirectUri
     *
     * @param string $redirectUri
     *
     * @return TblOauthClients
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set blocked
     *
     * @param boolean $blocked
     *
     * @return TblOauthClients
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return boolean
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * Set handler
     *
     * @param \TblUsers $handler
     *
     * @return TblOauthClients
     */
    public function setHandler(\TblUsers $handler = null)
    {
        $this->handler = $handler;

        return $this;
    }

    /**
     * Get handler
     *
     * @return \TblUsers
     */
    public function getHandler()
    {
        return $this->handler;
    }
}

<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"}), @ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="status", columns={"status"}), @ORM\Index(name="superuser", columns={"superuser"})})
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="username", type="string", length=20, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="activkey", type="string", length=128, nullable=false)
     */
    private $activkey = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastvisit_at", type="datetime", nullable=false)
     */
    private $lastvisitAt = '1990-01-01 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="superuser", type="integer", nullable=false)
     */
    private $superuser = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';



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
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set activkey
     *
     * @param string $activkey
     *
     * @return Users
     */
    public function setActivkey($activkey)
    {
        $this->activkey = $activkey;

        return $this;
    }

    /**
     * Get activkey
     *
     * @return string
     */
    public function getActivkey()
    {
        return $this->activkey;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return Users
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set lastvisitAt
     *
     * @param \DateTime $lastvisitAt
     *
     * @return Users
     */
    public function setLastvisitAt($lastvisitAt)
    {
        $this->lastvisitAt = $lastvisitAt;

        return $this;
    }

    /**
     * Get lastvisitAt
     *
     * @return \DateTime
     */
    public function getLastvisitAt()
    {
        return $this->lastvisitAt;
    }

    /**
     * Set superuser
     *
     * @param integer $superuser
     *
     * @return Users
     */
    public function setSuperuser($superuser)
    {
        $this->superuser = $superuser;

        return $this;
    }

    /**
     * Get superuser
     *
     * @return integer
     */
    public function getSuperuser()
    {
        return $this->superuser;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Users
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
}

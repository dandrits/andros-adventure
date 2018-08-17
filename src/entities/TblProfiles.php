<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TblProfiles
 *
 * @ORM\Table(name="tbl_profiles")
 * @ORM\Entity
 */
class TblProfiles
{
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname = '';

    /**
     * @var \TblUsers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TblUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return TblProfiles
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return TblProfiles
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set user
     *
     * @param \TblUsers $user
     *
     * @return TblProfiles
     */
    public function setUser(\TblUsers $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TblUsers
     */
    public function getUser()
    {
        return $this->user;
    }
}

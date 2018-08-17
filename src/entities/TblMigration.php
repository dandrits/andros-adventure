<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TblMigration
 *
 * @ORM\Table(name="tbl_migration")
 * @ORM\Entity
 */
class TblMigration
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=180, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $version;

    /**
     * @var integer
     *
     * @ORM\Column(name="apply_time", type="integer", nullable=true)
     */
    private $applyTime;



    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set applyTime
     *
     * @param integer $applyTime
     *
     * @return TblMigration
     */
    public function setApplyTime($applyTime)
    {
        $this->applyTime = $applyTime;

        return $this;
    }

    /**
     * Get applyTime
     *
     * @return integer
     */
    public function getApplyTime()
    {
        return $this->applyTime;
    }
}

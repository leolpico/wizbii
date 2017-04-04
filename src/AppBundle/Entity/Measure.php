<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints\LessThanParameter as LessThanParameter;

/**
 * Measure
 *
 * @ORM\Table(name="measure")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeasureRepository")
 */
class Measure
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=1)
     *
     * @Assert\EqualTo("1")
     * @Assert\NotNull()
     */
    private $v;

    /**
     * @var string
     *
     * @ORM\Column(name="hitType", type="string", length=255)
     *
     * @Assert\Choice({"pageview", "screenview", "event"})
     * @Assert\NotNull()
     */
    private $t;

    /**
     * @var string
     *
     * @ORM\Column(name="documentLocation", type="string", length=255, nullable=true)
     */
    private $dl;

    /**
     * @var string
     *
     * @ORM\Column(name="DocumentReferer", type="string", length=255, nullable=true)
     */
    private $dr;

    /**
     * @var string
     *
     * @ORM\Column(name="wizbiiCreatorType", type="string", length=255, nullable=true)
     *
     * @Assert\Choice({"profile", "recruiter", "visitor", "wizbii_employee"})
     */
    private $wct;

    /**
     * @var string
     *
     * @ORM\Column(name="wizbiiUserId", type="string", length=255, nullable=true)
     */
    private $wui;

    /**
     * @var string
     *
     * @ORM\Column(name="wizbiiUniqUserId", type="string", length=255, nullable=true)
     *
     * @Assert\Uuid
     */
    private $wuui;

    /**
     * @var string
     *
     * @ORM\Column(name="eventCategory", type="string", length=255, nullable=true)
     */
    private $ec;

    /**
     * @var string
     *
     * @ORM\Column(name="eventAction", type="string", length=255, nullable=true)
     */
    private $ea;

    /**
     * @var string
     *
     * @ORM\Column(name="eventLabel", type="string", length=255, nullable=true)
     */
    private $el;

    /**
     * @var int
     *
     * @ORM\Column(name="eventValue", type="integer", nullable=true)
     *
     * @Assert\GreaterThan(0)
     */
    private $ev;

    /**
     * @var string
     *
     * @ORM\Column(name="trackingId", type="string", length=255)
     * @Assert\NotNull()
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="dataSource", type="string", length=255)
     * @Assert\NotNull()
     */
    private $ds;

    /**
     * @var string
     *
     * @ORM\Column(name="campaignName", type="string", length=255, nullable=true)
     */
    private $cn;

    /**
     * @var string
     *
     * @ORM\Column(name="campaignSource", type="string", length=255, nullable=true)
     */
    private $cs;

    /**
     * @var string
     *
     * @ORM\Column(name="campaignMedium", type="string", length=255, nullable=true)
     */
    private $cm;

    /**
     * @var string
     *
     * @ORM\Column(name="campaignKeyword", type="string", length=255, nullable=true)
     */
    private $ck;

    /**
     * @var string
     *
     * @ORM\Column(name="campaignContent", type="string", length=255, nullable=true)
     */
    private $cc;

    /**
     * @var string
     *
     * @ORM\Column(name="screenName", type="string", length=255, nullable=true)
     */
    private $sn;

    /**
     * @var string
     *
     * @ORM\Column(name="applicationName", type="string", length=255, nullable=true)
     */
    private $an;

    /**
     * @var string
     *
     * @ORM\Column(name="applicationVersion", type="string", length=255, nullable=true)
     */
    private $av;

    /**
     * @var int
     *
     * @ORM\Column(name="queueTime", type="integer", nullable=true)
     *
     * @Assert\GreaterThanOrEqual(0)
     * @LessThanParameter()
     */
    private $qt;

    /**
     * @var int
     *
     * @ORM\Column(name="cacheBurster", type="integer", nullable=true)
     */
    private $z;

    /**
     * Measure constructor.
     */
    public function __construct(Request $request)
    {
        $this->setV($request->query->get('v'));
        $this->setT($request->query->get('t')) ;
        $this->setDl($request->query->get('dl'));
        $this->setDr($request->query->get('dr'));
        $this->setWct($request->query->get('wct'));
        $this->setWui($request->query->get('wui'));
        $this->setWuui($request->query->get('wuui'));
        $this->setEc($request->query->get('ec'));
        $this->setEa($request->query->get('ea')) ;
        $this->setEl($request->query->get('el'));
        $this->setEv($request->query->get('ev'));
        $this->setTid($request->query->get('tid'));
        $this->setDs($request->query->get('ds'));
        $this->setCn($request->query->get('cn'));
        $this->setCs($request->query->get('cs'));
        $this->setCm($request->query->get('cm'));
        $this->setCk($request->query->get('ck'));
        $this->setCc($request->query->get('cc'));
        $this->setSn($request->query->get('sn'));
        $this->setAn($request->query->get('an'));
        $this->setAv($request->query->get('av'));
        $this->setQt($request->query->get('qt'));
        $this->setZ($request->query->get('z'));
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set v
     *
     * @param string $v
     *
     * @return Measure
     */
    public function setV($v)
    {
        $this->v = $v;

        return $this;
    }

    /**
     * Get v
     *
     * @return string
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * Set t
     *
     * @param string $t
     *
     * @return Measure
     */
    public function setT($t)
    {
        $this->t = $t;

        return $this;
    }

    /**
     * Get t
     *
     * @return string
     */
    public function getT()
    {
        return $this->t;
    }

    /**
     * Set dl
     *
     * @param string $dl
     *
     * @return Measure
     */
    public function setDl($dl)
    {
        $this->dl = $dl;

        return $this;
    }

    /**
     * Get dl
     *
     * @return string
     */
    public function getDl()
    {
        return $this->dl;
    }

    /**
     * Set dr
     *
     * @param string $dr
     *
     * @return Measure
     */
    public function setDr($dr)
    {
        $this->dr = $dr;

        return $this;
    }

    /**
     * Get dr
     *
     * @return string
     */
    public function getDr()
    {
        return $this->dr;
    }

    /**
     * Set wct
     *
     * @param string $wct
     *
     * @return Measure
     */
    public function setWct($wct)
    {
        $this->wct = $wct;

        return $this;
    }

    /**
     * Get wct
     *
     * @return string
     */
    public function getWct()
    {
        return $this->wct;
    }

    /**
     * Set wui
     *
     * @param string $wui
     *
     * @return Measure
     */
    public function setWui($wui)
    {
        $this->wui = $wui;

        return $this;
    }

    /**
     * Get wui
     *
     * @return string
     */
    public function getWui()
    {
        return $this->wui;
    }

    /**
     * Set wuui
     *
     * @param string $wuui
     *
     * @return Measure
     */
    public function setWuui($wuui)
    {
        $this->wuui = $wuui;

        return $this;
    }

    /**
     * Get wuui
     *
     * @return string
     */
    public function getWuui()
    {
        return $this->wuui;
    }

    /**
     * Set ec
     *
     * @param string $ec
     *
     * @return Measure
     */
    public function setEc($ec)
    {
        $this->ec = $ec;

        return $this;
    }

    /**
     * Get ec
     *
     * @return string
     */
    public function getEc()
    {
        return $this->ec;
    }

    /**
     * Set ea
     *
     * @param string $ea
     *
     * @return Measure
     */
    public function setEa($ea)
    {
        $this->ea = $ea;

        return $this;
    }

    /**
     * Get ea
     *
     * @return string
     */
    public function getEa()
    {
        return $this->ea;
    }

    /**
     * Set el
     *
     * @param string $el
     *
     * @return Measure
     */
    public function setEl($el)
    {
        $this->el = $el;

        return $this;
    }

    /**
     * Get el
     *
     * @return string
     */
    public function getEl()
    {
        return $this->el;
    }

    /**
     * Set ev
     *
     * @param integer $ev
     *
     * @return Measure
     */
    public function setEv($ev)
    {
        $this->ev = $ev;

        return $this;
    }

    /**
     * Get ev
     *
     * @return integer
     */
    public function getEv()
    {
        return $this->ev;
    }

    /**
     * Set tid
     *
     * @param string $tid
     *
     * @return Measure
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set ds
     *
     * @param string $ds
     *
     * @return Measure
     */
    public function setDs($ds)
    {
        $this->ds = $ds;

        return $this;
    }

    /**
     * Get ds
     *
     * @return string
     */
    public function getDs()
    {
        return $this->ds;
    }

    /**
     * Set cn
     *
     * @param string $cn
     *
     * @return Measure
     */
    public function setCn($cn)
    {
        $this->cn = $cn;

        return $this;
    }

    /**
     * Get cn
     *
     * @return string
     */
    public function getCn()
    {
        return $this->cn;
    }

    /**
     * Set cs
     *
     * @param string $cs
     *
     * @return Measure
     */
    public function setCs($cs)
    {
        $this->cs = $cs;

        return $this;
    }

    /**
     * Get cs
     *
     * @return string
     */
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * Set cm
     *
     * @param string $cm
     *
     * @return Measure
     */
    public function setCm($cm)
    {
        $this->cm = $cm;

        return $this;
    }

    /**
     * Get cm
     *
     * @return string
     */
    public function getCm()
    {
        return $this->cm;
    }

    /**
     * Set ck
     *
     * @param string $ck
     *
     * @return Measure
     */
    public function setCk($ck)
    {
        $this->ck = $ck;

        return $this;
    }

    /**
     * Get ck
     *
     * @return string
     */
    public function getCk()
    {
        return $this->ck;
    }

    /**
     * Set cc
     *
     * @param string $cc
     *
     * @return Measure
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set sn
     *
     * @param string $sn
     *
     * @return Measure
     */
    public function setSn($sn)
    {
        $this->sn = $sn;

        return $this;
    }

    /**
     * Get sn
     *
     * @return string
     */
    public function getSn()
    {
        return $this->sn;
    }

    /**
     * Set an
     *
     * @param string $an
     *
     * @return Measure
     */
    public function setAn($an)
    {
        $this->an = $an;

        return $this;
    }

    /**
     * Get an
     *
     * @return string
     */
    public function getAn()
    {
        return $this->an;
    }

    /**
     * Set av
     *
     * @param string $av
     *
     * @return Measure
     */
    public function setAv($av)
    {
        $this->av = $av;

        return $this;
    }

    /**
     * Get av
     *
     * @return string
     */
    public function getAv()
    {
        return $this->av;
    }

    /**
     * Set qt
     *
     * @param integer $qt
     *
     * @return Measure
     */
    public function setQt($qt)
    {
        $this->qt = $qt;

        return $this;
    }

    /**
     * Get qt
     *
     * @return integer
     */
    public function getQt()
    {
        return $this->qt;
    }

    /**
     * Set z
     *
     * @param integer $z
     *
     * @return Measure
     */
    public function setZ($z)
    {
        $this->z = $z;

        return $this;
    }

    /**
     * Get z
     *
     * @return integer
     */
    public function getZ()
    {
        return $this->z;
    }
}

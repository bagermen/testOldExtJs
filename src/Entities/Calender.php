<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calender
 *
 * @ORM\Table(
 *  name="calender"
 * )
 * @ORM\Entity(repositoryClass="App\Repositories\CalenderRepository")
 */
class Calender
{
    /**
     * @var int
     *
     * @ORM\Column(
     *  name="cid",
     *  type="integer"
     * )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $cid;

    /**
     * @var int
     *
     * @ORM\Column(
     *  name="year",
     *  type="integer",
     *  options={"default": 0}
     * )
     */
    private $year = 0;

    /**
     * @var string
     *
     * @ORM\Column(
     *  name="name",
     *  type="string",
     *  length=100,
     *  options={"default": ""}
     * )
     */
    private $name = '';

    /**
     * @var string
     * @ORM\Column(
     *  name="city",
     *  type="string",
     *  length=40,
     *  options={"default": ""}
     * )
     */
    private $city = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="country",
     *  type="string",
     *  length=255,
     *  options={"default": ""}
     * )
     */
    private $country = '';
    /**
     * @var \DateTime
     * @ORM\Column(
     *  name="begin",
     *  type="date",
     *  options={"default": "0000-00-00"}
     * )
     */
    private $begin;
    /**
     * @var \DateTime
     * @ORM\Column(
     *  name="tot",
     *  type="date",
     *  options={"default": "0000-00-00"}
     * )
     */
    private $tot;
    /**
     * @var string
     * @ORM\Column(
     *  name="holder",
     *  type="string",
     *  length=40,
     *  options={"default": ""}
     * )
     */
    private $holder = '';
    /**
     * @var bool
     * @ORM\Column(
     *  name="status",
     *  type="boolean",
     *  options={"default": 0}
     * )
     */
    private $status = false;
    /**
     * @var string
     * @ORM\Column(
     *  name="logo",
     *  type="string",
     *  length=40,
     *  options={"default": ""}
     * )
     */
    private $logo = '';
    /**
     * @var bool
     * @ORM\Column(
     *  name="type",
     *  type="string",
     *  length=1,
     *  options={"default": ""}
     * )
     */
    private $type = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="game",
     *  type="string",
     *  length=3,
     *  options={"default": ""}
     * )
     */
    private $game = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="note",
     *  type="string",
     *  length=16777215,
     *  options={"default" : ""}
     * )
     */
    private $note = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="url",
     *  type="string",
     *  length=255,
     *  options={"default" : ""}
     * )
     */
    private $url = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="contact_name",
     *  type="string",
     *  length=40,
     *  options={"default" : ""}
     * )
     */
    private $contactName = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="contact_email",
     *  type="string",
     *  length=40,
     *  options={"default" : ""}
     * )
     */
    private $contactEmail = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="contact_phone",
     *  type="string",
     *  length=40,
     *  options={"default" : ""}
     * )
     */
    private $contactPhone = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="name_ru",
     *  type="string",
     *  length=40,
     *  options={"default" : ""}
     * )
     */
    private $nameRu = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="ip",
     *  type="string",
     *  length=15,
     *  nullable=true,
     *  options={"default" : ""}
     * )
     */
    private $ip = '';
    /**
     * @var string
     * @ORM\Column(
     *  name="recognition",
     *  type="string",
     *  columnDefinition="enum('0', '1')",
     *  options={"default" : "0"}
     * )
     */
    private $recognition = '0';
    /**
     * @var int
     *
     * @ORM\Column(
     *  name="wcup_stars",
     *  type="bigint",
     *  options={"unsigned": true}
     * )
     */
    private $wcupStars;
    /**
     * @var string
     *
     * @ORM\Column(
     *  name="is_result",
     *  type="string",
     *  columnDefinition="enum('0', '1')",
     *  options={"default" : "0"}
     * )
     */
    private $isResult = '0';
    /**
     * @var string
     *
     * @ORM\Column(
     *  name="live_url",
     *  type="string",
     *  length=255,
     *  nullable=true
     * )
     */
    private $liveUrl;
    /**
     * @var string
     *
     * @ORM\Column(
     *  name="tour_logo",
     *  type="string",
     *  length=255,
     *  nullable=true
     * )
     */
    private $tourLogo;
    /**
     * @var bool
     *
     * @ORM\Column(
     *  name="dates_sure",
     *  type="boolean",
     *  options={"default" : "0"}
     * )
     */
    private $datesSure = false;
    /**
     * @var bool
     *
     * @ORM\Column(
     *  name="place_sure",
     *  type="boolean",
     *  options={"default" : "1"}
     * )
     */
    private $placeSure = true;
    /**
     * @var string
     *
     * @ORM\Column(
     *  name="tempo",
     *  type="string",
     *  columnDefinition="enum('classic','rapid','blitz')",
     *  options={"default" : "classic"}
     * )
     */
    private $tempo = 'classic';
    /**
     * @var bool
     *
     * @ORM\Column(
     *  name="is_open",
     *  type="boolean",
     *  options={"default" : "1"}
     * )
     */
    private $isOpen = true;
    /**
     * @var float
     *
     * @ORM\Column(
     *  name="fee",
     *  type="decimal",
     *  precision=8,
     *  scale=2,
     *  nullable=true
     * )
     */
    private $fee;
    /**
     * @var bool
     *
     * @ORM\Column(
     *  name="is_youth",
     *  type="boolean",
     *  nullable=true
     * )
     */
    private $isYouth;
    /**
     * @var string
     *
     * @ORM\Column(
     *  name="age_categories",
     *  type="text"
     * )
     */
    private $ageСategories;
    /**
     * @var \DateTime
     *
     * @ORM\Column(
     *  name="added_date",
     *  type="datetime",
     *  nullable=true
     * )
     */
    private $addedDate;

    public function __construct()
    {
        $this->addedDate = new \DateTime();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = strval($country);
    }

    /**
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * @param int $cid
     */
    public function setCid($cid)
    {
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = (string) $year;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = (string) $city;
    }

    /**
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * @param \DateTime $begin
     */
    public function setBegin($begin)
    {
        if (is_string($begin)) {
            $date = new \DateTime();
            $date->setTimestamp(strtotime($begin));
            $begin = $date;
        }
        $this->begin = $begin;
    }

    /**
     * @return \DateTime
     */
    public function getTot()
    {
        return $this->tot;
    }

    /**
     * @param \DateTime $tot
     */
    public function setTot($tot)
    {
        if (is_string($tot)) {
            $date = new \DateTime();
            $date->setTimestamp(strtotime($tot));
            $tot = $date;;
        }

        $this->tot = $tot;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     */
    public function setHolder($holder)
    {
        $this->holder = (string) $holder;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = (bool) $status;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = (string) $logo;
    }

    /**
     * @return boolean
     */
    public function isType()
    {
        return $this->type;
    }

    /**
     * @param boolean $type
     */
    public function setType($type)
    {
        $this->type = (bool) $type;
    }

    /**
     * @return string
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param string $game
     */
    public function setGame($game)
    {
        $this->game = (string) $game;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = (string) $note;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = (string) $url;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     */
    public function setContactName($contactName)
    {
        $this->contactName = (string) $contactName;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = (string) $contactEmail;
    }

    /**
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = (string) $contactPhone;
    }

    /**
     * @return string
     */
    public function getNameRu()
    {
        return $this->nameRu;
    }

    /**
     * @param string $nameRu
     */
    public function setNameRu($nameRu)
    {
        $this->nameRu = (string) $nameRu;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = (string) $ip;
    }

    /**
     * @return string
     */
    public function getRecognition()
    {
        return $this->recognition;
    }

    /**
     * @param string $recognition
     */
    public function setRecognition($recognition)
    {
        $this->recognition = (string) $recognition;
    }

    /**
     * @return mixed
     */
    public function getWcupStars()
    {
        return $this->wcupStars;
    }

    /**
     * @param mixed $wcupStars
     */
    public function setWcupStars($wcupStars)
    {
        $this->wcupStars = (integer) $wcupStars;
    }

    /**
     * @return string
     */
    public function getIsResult()
    {
        return $this->isResult;
    }

    /**
     * @param string $isResult
     */
    public function setIsResult($isResult)
    {
        $this->isResult = (string) $isResult;
    }

    /**
     * @return string
     */
    public function getLiveUrl()
    {
        return $this->liveUrl;
    }

    /**
     * @param string $liveUrl
     */
    public function setLiveUrl($liveUrl)
    {
        $this->liveUrl = (string) $liveUrl;
    }

    /**
     * @return string
     */
    public function getTourLogo()
    {
        return $this->tourLogo;
    }

    /**
     * @param string $tourLogo
     */
    public function setTourLogo($tourLogo)
    {
        $this->tourLogo = (string) $tourLogo;
    }

    /**
     * @return boolean
     */
    public function isDatesSure()
    {
        return $this->datesSure;
    }

    /**
     * @param boolean $datesSure
     */
    public function setDatesSure($datesSure)
    {
        $this->datesSure = (bool) $datesSure;
    }

    /**
     * @return boolean
     */
    public function isPlaceSure()
    {
        return $this->placeSure;
    }

    /**
     * @param boolean $placeSure
     */
    public function setPlaceSure($placeSure)
    {
        $this->placeSure = (bool) $placeSure;
    }

    /**
     * @return string
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * @param string $tempo
     */
    public function setTempo($tempo)
    {
        $this->tempo = (string) $tempo;
    }

    /**
     * @return boolean
     */
    public function isIsOpen()
    {
        return $this->isOpen;
    }

    /**
     * @param boolean $isOpen
     */
    public function setIsOpen($isOpen)
    {
        $this->isOpen = (bool) $isOpen;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     */
    public function setFee($fee)
    {
        $this->fee = (float) $fee;
    }

    /**
     * @return boolean
     */
    public function isIsYouth()
    {
        return $this->isYouth;
    }

    /**
     * @param boolean $isYouth
     */
    public function setIsYouth($isYouth)
    {
        $this->isYouth = (bool) $isYouth;
    }

    /**
     * @return string
     */
    public function getAgeСategories()
    {
        return $this->ageСategories;
    }

    /**
     * @param string $ageСategories
     */
    public function setAgeСategories($ageСategories)
    {
        $this->ageСategories = (string) $ageСategories;
    }

    /**
     * @return \DateTime
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * @param \DateTime $addedDate
     */
    public function setAddedDate($addedDate)
    {
    }
}
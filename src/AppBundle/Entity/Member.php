<?php
/*
 * @codingStandardsIgnoreFile
 *
 * Auto generated file ignore for Code Sniffer
 */

namespace AppBundle\Entity;

use AppBundle\Encoder\LegacyPasswordEncoder;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Rox\Core\Exception\RuntimeException;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Member.
 *
 * @ORM\Table(name="members")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberRepository")
 *
 * @SuppressWarnings(PHPMD)
 * Auto generated class do not check mess
 */
class Member implements UserInterface, \Serializable, EncoderAwareInterface
{
    const ACC_YES = 'anytime';
    const ACC_MAYBE = 'dependonrequest';
    const ACC_NO = 'neverask';

    const ACTIVE_ALL = "'Active', 'ActiveHidden', 'ChoiceInactive', 'OutOfRemind', 'Pending'";
    const ACTIVE_SEARCH = "'Active', 'ActiveHidden', 'OutOfRemind', 'Pending'";
    const ACTIVE_WITH_MESSAGES = "'Active', 'OutOfRemind', 'Pending'";
    const MEMBER_COMMENTS = "'Active', 'ActiveHidden', 'AskToLeave', 'ChoiceInactive', 'OutOfRemind', 'Pending'";

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=32, nullable=false)
     */
    protected $username;

    /**
     * @var int
     *
     * @ORM\Column(name="Email", type="integer", nullable=false)
     */
    protected $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastLogin", type="datetime", nullable=false)
     */
    protected $lastlogin = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="PassWord", type="string", length=100, nullable=true)
     */
    protected $password = 'ENCRYPT(\'password\')';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ex_user_id", type="integer", nullable=false)
     */
    private $exUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", nullable=false)
     */
    private $status = 'MailToConfirm';

    /**
     * @var int
     *
     * @ORM\Column(name="ChangedId", type="integer", nullable=false)
     */
    private $changedid = '0';

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="IdCity", referencedColumnName="geonameid")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="Latitude", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="Longitude", type="decimal", precision=10, scale=7, nullable=true)
     */
    private $longitude;

    /**
     * @var int
     *
     * @ORM\Column(name="NbRemindWithoutLogingIn", type="integer", nullable=false)
     */
    private $nbremindwithoutlogingin;

    /**
     * @var int
     *
     * @ORM\Column(name="HomePhoneNumber", type="integer", nullable=false)
     */
    private $homephonenumber;

    /**
     * @var int
     *
     * @ORM\Column(name="CellPhoneNumber", type="integer", nullable=false)
     */
    private $cellphonenumber;

    /**
     * @var int
     *
     * @ORM\Column(name="WorkPhoneNumber", type="integer", nullable=false)
     */
    private $workphonenumber;

    /**
     * @var int
     *
     * @ORM\Column(name="SecEmail", type="integer", nullable=false)
     */
    private $secemail;

    /**
     * @var int
     *
     * @ORM\Column(name="firstname", type="integer", nullable=false)
     */
    private $firstname = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="SecondName", type="integer", nullable=false)
     */
    private $secondname = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="LastName", type="integer", nullable=false)
     */
    private $lastname = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Accomodation", type="string", nullable=false)
     */
    private $accommodation = 'dependonrequest';

    /**
     * @var int
     *
     * @ORM\Column(name="AdditionalAccomodationInfo", type="integer", nullable=false)
     */
    private $additionalAccommodationInfo;

    /**
     * @var int
     *
     * @ORM\Column(name="ILiveWith", type="integer", nullable=false)
     */
    private $ilivewith;

    /**
     * @var bool
     *
     * @ORM\Column(name="IdentityCheckLevel", type="boolean", nullable=false)
     */
    private $identitychecklevel = '000';

    /**
     * @var int
     *
     * @ORM\Column(name="InformationToGuest", type="integer", nullable=false)
     */
    private $informationtoguest;

    /**
     * @var string
     *
     * @ORM\Column(name="TypicOffer", type="string", nullable=false)
     */
    private $typicoffer;

    /**
     * @var int
     *
     * @ORM\Column(name="Offer", type="integer", nullable=false)
     */
    private $offer;

    /**
     * @var int
     *
     * @ORM\Column(name="MaxGuest", type="integer", nullable=false)
     */
    private $maxguest = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="MaxLenghtOfStay", type="integer", nullable=false)
     */
    private $maxlenghtofstay = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="Organizations", type="integer", nullable=false)
     */
    private $organizations;

    /**
     * @var string
     *
     * @ORM\Column(name="Restrictions", type="string", nullable=false)
     */
    private $restrictions;

    /**
     * @var int
     *
     * @ORM\Column(name="OtherRestrictions", type="integer", nullable=false)
     */
    private $otherrestrictions;

    /**
     * @var int
     *
     * @ORM\Column(name="bday", type="integer", nullable=false)
     */
    private $bday;

    /**
     * @var int
     *
     * @ORM\Column(name="bmonth", type="integer", nullable=false)
     */
    private $bmonth;

    /**
     * @var int
     *
     * @ORM\Column(name="byear", type="integer", nullable=false)
     */
    private $byear;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityFlag", type="integer", nullable=false)
     */
    private $securityflag = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Quality", type="string", nullable=false)
     */
    private $quality = 'NeverLog';

    /**
     * @var int
     *
     * @ORM\Column(name="ProfileSummary", type="integer", nullable=false)
     */
    private $profileSummary;

    /**
     * @var int
     *
     * @ORM\Column(name="Occupation", type="integer", nullable=false)
     */
    private $occupation;

    /**
     * @var int
     *
     * @ORM\Column(name="CounterGuests", type="integer", nullable=false)
     */
    private $counterguests = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="CounterHosts", type="integer", nullable=false)
     */
    private $counterhosts = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="CounterTrusts", type="integer", nullable=false)
     */
    private $countertrusts = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Gender", type="string", nullable=false)
     */
    private $gender = 'IDontTell';

    /**
     * @var string
     *
     * @ORM\Column(name="HideGender", type="string", nullable=false)
     */
    private $hidegender = 'No';

    /**
     * @var string
     *
     * @ORM\Column(name="GenderOfGuest", type="string", nullable=false)
     */
    private $genderofguest = 'any';

    /**
     * @var int
     *
     * @ORM\Column(name="MotivationForHospitality", type="integer", nullable=true)
     */
    private $motivationforhospitality;

    /**
     * @var string
     *
     * @ORM\Column(name="HideBirthDate", type="string", nullable=false)
     */
    private $hidebirthdate = 'No';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BirthDate", type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="AdressHidden", type="string", nullable=false)
     */
    private $adresshidden = 'Yes';

    /**
     * @var string
     *
     * @ORM\Column(name="WebSite", type="text", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_SKYPE", type="text", length=255, nullable=true)
     */
    private $chatSkype;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_ICQ", type="text", length=255, nullable=true)
     */
    private $chatIcq;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_AOL", type="text", length=255, nullable=true)
     */
    private $chatAol;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_MSN", type="text", length=255, nullable=true)
     */
    private $chatMsn;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_YAHOO", type="text", length=255, nullable=true)
     */
    private $chatYahoo;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_Others", type="text", length=255, nullable=true)
     */
    private $chatOthers;

    /**
     * @var int
     *
     * @ORM\Column(name="FutureTrips", type="integer", nullable=false)
     */
    private $futuretrips = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="OldTrips", type="integer", nullable=false)
     */
    private $oldtrips = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="LogCount", type="integer", nullable=false)
     */
    private $logcount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="Hobbies", type="integer", nullable=false)
     */
    private $hobbies;

    /**
     * @var int
     *
     * @ORM\Column(name="Books", type="integer", nullable=false)
     */
    private $books;

    /**
     * @var int
     *
     * @ORM\Column(name="Music", type="integer", nullable=false)
     */
    private $music;

    /**
     * @var int
     *
     * @ORM\Column(name="PastTrips", type="integer", nullable=false)
     */
    private $pasttrips;

    /**
     * @var int
     *
     * @ORM\Column(name="PlannedTrips", type="integer", nullable=false)
     */
    private $plannedtrips;

    /**
     * @var int
     *
     * @ORM\Column(name="PleaseBring", type="integer", nullable=false)
     */
    private $pleasebring;

    /**
     * @var int
     *
     * @ORM\Column(name="OfferGuests", type="integer", nullable=false)
     */
    private $offerguests;

    /**
     * @var int
     *
     * @ORM\Column(name="OfferHosts", type="integer", nullable=false)
     */
    private $offerhosts;

    /**
     * @var int
     *
     * @ORM\Column(name="PublicTransport", type="integer", nullable=false)
     */
    private $publictransport;

    /**
     * @var int
     *
     * @ORM\Column(name="Movies", type="integer", nullable=false)
     */
    private $movies;

    /**
     * @var int
     *
     * @ORM\Column(name="chat_GOOGLE", type="integer", nullable=false)
     */
    private $chatGoogle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastSwitchToActive", type="datetime", nullable=true)
     */
    private $lastswitchtoactive;

    /**
     * @var int
     *
     * @ORM\Column(name="bewelcomed", type="integer", nullable=false)
     */
    private $bewelcomed;

    /**
     * @ORM\OneToMany(targetEntity="CryptedField", mappedBy="member", fetch="EAGER")
     */
    private $cryptedFields;

    /**
     * @ORM\OneToMany(targetEntity="RightVolunteer", mappedBy="member", fetch="EAGER")
     */
    private $volunteerRights;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="members")
     * @ORM\JoinTable(name="membersgroups",
     *      joinColumns={@ORM\JoinColumn(name="IdMember", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="IdGroup", referencedColumnName="id")}
     *      )
     */
    private $groups;

    private $languages;

    private $comments;

    private $relationships;

    public function __construct()
    {
        $this->volunteerRights = new ArrayCollection();
        $this->cryptedFields = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->relationships = new ArrayCollection();
    }

    /**
     * Set exUserId.
     *
     * @param int $exUserId
     *
     * @return Member
     */
    public function setExUserId($exUserId)
    {
        $this->exUserId = $exUserId;

        return $this;
    }

    /**
     * Get exUserId.
     *
     * @return int
     */
    public function getExUserId()
    {
        return $this->exUserId;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return Member
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Member
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set changedid.
     *
     * @param int $changedid
     *
     * @return Member
     */
    public function setChangedid($changedid)
    {
        $this->changedid = $changedid;

        return $this;
    }

    /**
     * Get changedid.
     *
     * @return int
     */
    public function getChangedid()
    {
        return $this->changedid;
    }

    /**
     * Set email.
     *
     * @param int $email
     *
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return int
     */
    public function getEmail()
    {
        $email = urldecode($this->getCryptedField('Email'));

        return $email;
    }

    /**
     * Set city.
     *
     * @param Location $city
     *
     * @return Member
     */
    public function setCity(Location $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return Location
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set latitude.
     *
     * @param string $latitude
     *
     * @return Member
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string $longitude
     *
     * @return Member
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set nbremindwithoutlogingin.
     *
     * @param int $nbremindwithoutlogingin
     *
     * @return Member
     */
    public function setNbremindwithoutlogingin($nbremindwithoutlogingin)
    {
        $this->nbremindwithoutlogingin = $nbremindwithoutlogingin;

        return $this;
    }

    /**
     * Get nbremindwithoutlogingin.
     *
     * @return int
     */
    public function getNbremindwithoutlogingin()
    {
        return $this->nbremindwithoutlogingin;
    }

    /**
     * Set homephonenumber.
     *
     * @param int $homephonenumber
     *
     * @return Member
     */
    public function setHomephonenumber($homephonenumber)
    {
        $this->homephonenumber = $homephonenumber;

        return $this;
    }

    /**
     * Get homephonenumber.
     *
     * @return int
     */
    public function getHomephonenumber()
    {
        return $this->homephonenumber;
    }

    /**
     * Set cellphonenumber.
     *
     * @param int $cellphonenumber
     *
     * @return Member
     */
    public function setCellphonenumber($cellphonenumber)
    {
        $this->cellphonenumber = $cellphonenumber;

        return $this;
    }

    /**
     * Get cellphonenumber.
     *
     * @return int
     */
    public function getCellphonenumber()
    {
        return $this->cellphonenumber;
    }

    /**
     * Set workphonenumber.
     *
     * @param int $workphonenumber
     *
     * @return Member
     */
    public function setWorkphonenumber($workphonenumber)
    {
        $this->workphonenumber = $workphonenumber;

        return $this;
    }

    /**
     * Get workphonenumber.
     *
     * @return int
     */
    public function getWorkphonenumber()
    {
        return $this->workphonenumber;
    }

    /**
     * Set secemail.
     *
     * @param int $secemail
     *
     * @return Member
     */
    public function setSecemail($secemail)
    {
        $this->secemail = $secemail;

        return $this;
    }

    /**
     * Get secemail.
     *
     * @return int
     */
    public function getSecemail()
    {
        return $this->secemail;
    }

    /**
     * Set firstname.
     *
     * @param int $firstname
     *
     * @return Member
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return int
     */
    public function getFirstName()
    {
        return $this->getCryptedField('FirstName');
    }

    /**
     * Set secondname.
     *
     * @param int $secondname
     *
     * @return Member
     */
    public function setSecondname($secondname)
    {
        $this->secondname = $secondname;

        return $this;
    }

    /**
     * Get secondname.
     *
     * @return int
     */
    public function getSecondName()
    {
        return $this->getCryptedField('SecondName');
    }

    /**
     * Set lastname.
     *
     * @param int $lastname
     *
     * @return Member
     */
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return int
     */
    public function getLastName()
    {
        return $this->getCryptedField('LastName');
    }

    /**
     * Set accommodation.
     *
     * @param string $accommodation
     *
     * @return Member
     */
    public function setAccommodation($accommodation)
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    /**
     * Get accommodation.
     *
     * @return string
     */
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * Set additionalaccommodationinfo.
     *
     * @param int $additionalAccommodationInfo
     *
     * @return Member
     */
    public function setAdditionalAccommodationinfo($additionalAccommodationInfo)
    {
        $this->additionalAccommodationInfo = $additionalAccommodationInfo;

        return $this;
    }

    /**
     * Get additionalaccomodationinfo.
     *
     * @return int
     */
    public function getAdditionalAccommodationinfo()
    {
        return $this->additionalAccommodationInfo;
    }

    /**
     * Set ilivewith.
     *
     * @param int $ilivewith
     *
     * @return Member
     */
    public function setIlivewith($ilivewith)
    {
        $this->ilivewith = $ilivewith;

        return $this;
    }

    /**
     * Get ilivewith.
     *
     * @return int
     */
    public function getIlivewith()
    {
        return $this->ilivewith;
    }

    /**
     * Set identitychecklevel.
     *
     * @param bool $identitychecklevel
     *
     * @return Member
     */
    public function setIdentitychecklevel($identitychecklevel)
    {
        $this->identitychecklevel = $identitychecklevel;

        return $this;
    }

    /**
     * Get identitychecklevel.
     *
     * @return bool
     */
    public function getIdentitychecklevel()
    {
        return $this->identitychecklevel;
    }

    /**
     * Set informationtoguest.
     *
     * @param int $informationtoguest
     *
     * @return Member
     */
    public function setInformationtoguest($informationtoguest)
    {
        $this->informationtoguest = $informationtoguest;

        return $this;
    }

    /**
     * Get informationtoguest.
     *
     * @return int
     */
    public function getInformationtoguest()
    {
        return $this->informationtoguest;
    }

    /**
     * Set typicoffer.
     *
     * @param string $typicoffer
     *
     * @return Member
     */
    public function setTypicoffer($typicoffer)
    {
        $this->typicoffer = $typicoffer;

        return $this;
    }

    /**
     * Get typicoffer.
     *
     * @return string
     */
    public function getTypicoffer()
    {
        return $this->typicoffer;
    }

    /**
     * Set offer.
     *
     * @param int $offer
     *
     * @return Member
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer.
     *
     * @return int
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set maxguest.
     *
     * @param int $maxguest
     *
     * @return Member
     */
    public function setMaxguest($maxguest)
    {
        $this->maxguest = $maxguest;

        return $this;
    }

    /**
     * Get maxguest.
     *
     * @return int
     */
    public function getMaxguest()
    {
        return $this->maxguest;
    }

    /**
     * Set maxlenghtofstay.
     *
     * @param int $maxlenghtofstay
     *
     * @return Member
     */
    public function setMaxlenghtofstay($maxlenghtofstay)
    {
        $this->maxlenghtofstay = $maxlenghtofstay;

        return $this;
    }

    /**
     * Get maxlenghtofstay.
     *
     * @return int
     */
    public function getMaxlenghtofstay()
    {
        return $this->maxlenghtofstay;
    }

    /**
     * Set organizations.
     *
     * @param int $organizations
     *
     * @return Member
     */
    public function setOrganizations($organizations)
    {
        $this->organizations = $organizations;

        return $this;
    }

    /**
     * Get organizations.
     *
     * @return int
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }

    /**
     * Set restrictions.
     *
     * @param string $restrictions
     *
     * @return Member
     */
    public function setRestrictions($restrictions)
    {
        $this->restrictions = $restrictions;

        return $this;
    }

    /**
     * Get restrictions.
     *
     * @return string
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }

    /**
     * Set otherrestrictions.
     *
     * @param int $otherrestrictions
     *
     * @return Member
     */
    public function setOtherrestrictions($otherrestrictions)
    {
        $this->otherrestrictions = $otherrestrictions;

        return $this;
    }

    /**
     * Get otherrestrictions.
     *
     * @return int
     */
    public function getOtherrestrictions()
    {
        return $this->otherrestrictions;
    }

    /**
     * Set bday.
     *
     * @param int $bday
     *
     * @return Member
     */
    public function setBday($bday)
    {
        $this->bday = $bday;

        return $this;
    }

    /**
     * Get bday.
     *
     * @return int
     */
    public function getBday()
    {
        return $this->bday;
    }

    /**
     * Set bmonth.
     *
     * @param int $bmonth
     *
     * @return Member
     */
    public function setBmonth($bmonth)
    {
        $this->bmonth = $bmonth;

        return $this;
    }

    /**
     * Get bmonth.
     *
     * @return int
     */
    public function getBmonth()
    {
        return $this->bmonth;
    }

    /**
     * Set byear.
     *
     * @param int $byear
     *
     * @return Member
     */
    public function setByear($byear)
    {
        $this->byear = $byear;

        return $this;
    }

    /**
     * Get byear.
     *
     * @return int
     */
    public function getByear()
    {
        return $this->byear;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Member
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Member
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set last login.
     *
     * @param \DateTime $lastLogin
     *
     * @return Member
     */
    public function setLastlogin(\DateTime $lastLogin = null)
    {
        $this->lastlogin = $lastLogin;

        return $this;
    }

    /**
     * Get last login.
     *
     * @return Carbon
     */
    public function getLastlogin()
    {
        return Carbon::instance($this->lastlogin);
    }

    /**
     * Set securityflag.
     *
     * @param int $securityflag
     *
     * @return Member
     */
    public function setSecurityflag($securityflag)
    {
        $this->securityflag = $securityflag;

        return $this;
    }

    /**
     * Get securityflag.
     *
     * @return int
     */
    public function getSecurityflag()
    {
        return $this->securityflag;
    }

    /**
     * Set quality.
     *
     * @param string $quality
     *
     * @return Member
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality.
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set profileSummary.
     *
     * @param int $profileSummary
     *
     * @return Member
     */
    public function setProfileSummary($profileSummary)
    {
        $this->profileSummary = $profileSummary;

        return $this;
    }

    /**
     * Get profileSummary.
     *
     * @return int
     */
    public function getProfileSummary()
    {
        return $this->profileSummary;
    }

    /**
     * Set occupation.
     *
     * @param int $occupation
     *
     * @return Member
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation.
     *
     * @return int
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set counterguests.
     *
     * @param int $counterguests
     *
     * @return Member
     */
    public function setCounterguests($counterguests)
    {
        $this->counterguests = $counterguests;

        return $this;
    }

    /**
     * Get counterguests.
     *
     * @return int
     */
    public function getCounterguests()
    {
        return $this->counterguests;
    }

    /**
     * Set counterhosts.
     *
     * @param int $counterhosts
     *
     * @return Member
     */
    public function setCounterhosts($counterhosts)
    {
        $this->counterhosts = $counterhosts;

        return $this;
    }

    /**
     * Get counterhosts.
     *
     * @return int
     */
    public function getCounterhosts()
    {
        return $this->counterhosts;
    }

    /**
     * Set countertrusts.
     *
     * @param int $countertrusts
     *
     * @return Member
     */
    public function setCountertrusts($countertrusts)
    {
        $this->countertrusts = $countertrusts;

        return $this;
    }

    /**
     * Get countertrusts.
     *
     * @return int
     */
    public function getCountertrusts()
    {
        return $this->countertrusts;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return Member
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set gender.
     *
     * @param string $gender
     *
     * @return Member
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set hidegender.
     *
     * @param string $hidegender
     *
     * @return Member
     */
    public function setHidegender($hidegender)
    {
        $this->hidegender = $hidegender;

        return $this;
    }

    /**
     * Get hidegender.
     *
     * @return string
     */
    public function getHidegender()
    {
        return $this->hidegender;
    }

    /**
     * Set genderofguest.
     *
     * @param string $genderofguest
     *
     * @return Member
     */
    public function setGenderofguest($genderofguest)
    {
        $this->genderofguest = $genderofguest;

        return $this;
    }

    /**
     * Get genderofguest.
     *
     * @return string
     */
    public function getGenderofguest()
    {
        return $this->genderofguest;
    }

    /**
     * Set motivationforhospitality.
     *
     * @param int $motivationforhospitality
     *
     * @return Member
     */
    public function setMotivationforhospitality($motivationforhospitality)
    {
        $this->motivationforhospitality = $motivationforhospitality;

        return $this;
    }

    /**
     * Get motivationforhospitality.
     *
     * @return int
     */
    public function getMotivationforhospitality()
    {
        return $this->motivationforhospitality;
    }

    /**
     * Set hidebirthdate.
     *
     * @param string $hidebirthdate
     *
     * @return Member
     */
    public function setHidebirthdate($hidebirthdate)
    {
        $this->hidebirthdate = $hidebirthdate;

        return $this;
    }

    /**
     * Get hidebirthdate.
     *
     * @return string
     */
    public function getHidebirthdate()
    {
        return $this->hidebirthdate;
    }

    /**
     * Set birthdate.
     *
     * @param \DateTime $birthdate
     *
     * @return Member
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate.
     *
     * @return Carbon
     */
    public function getBirthdate()
    {
        return Carbon::instance($this->birthdate);
    }

    /**
     * Set adresshidden.
     *
     * @param string $adresshidden
     *
     * @return Member
     */
    public function setAdresshidden($adresshidden)
    {
        $this->adresshidden = $adresshidden;

        return $this;
    }

    /**
     * Get adresshidden.
     *
     * @return string
     */
    public function getAdresshidden()
    {
        return $this->adresshidden;
    }

    /**
     * Set website.
     *
     * @param string $website
     *
     * @return Member
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set chatSkype.
     *
     * @param string $chatSkype
     *
     * @return Member
     */
    public function setChatSkype($chatSkype)
    {
        $this->chatSkype = $chatSkype;

        return $this;
    }

    /**
     * Get chatSkype.
     *
     * @return string
     */
    public function getChatSkype()
    {
        return $this->chatSkype;
    }

    /**
     * Set chatIcq.
     *
     * @param string $chatIcq
     *
     * @return Member
     */
    public function setChatIcq($chatIcq)
    {
        $this->chatIcq = $chatIcq;

        return $this;
    }

    /**
     * Get chatIcq.
     *
     * @return string
     */
    public function getChatIcq()
    {
        return $this->chatIcq;
    }

    /**
     * Set chatAol.
     *
     * @param string $chatAol
     *
     * @return Member
     */
    public function setChatAol($chatAol)
    {
        $this->chatAol = $chatAol;

        return $this;
    }

    /**
     * Get chatAol.
     *
     * @return string
     */
    public function getChatAol()
    {
        return $this->chatAol;
    }

    /**
     * Set chatMsn.
     *
     * @param string $chatMsn
     *
     * @return Member
     */
    public function setChatMsn($chatMsn)
    {
        $this->chatMsn = $chatMsn;

        return $this;
    }

    /**
     * Get chatMsn.
     *
     * @return string
     */
    public function getChatMsn()
    {
        return $this->chatMsn;
    }

    /**
     * Set chatYahoo.
     *
     * @param string $chatYahoo
     *
     * @return Member
     */
    public function setChatYahoo($chatYahoo)
    {
        $this->chatYahoo = $chatYahoo;

        return $this;
    }

    /**
     * Get chatYahoo.
     *
     * @return string
     */
    public function getChatYahoo()
    {
        return $this->chatYahoo;
    }

    /**
     * Set chatOthers.
     *
     * @param string $chatOthers
     *
     * @return Member
     */
    public function setChatOthers($chatOthers)
    {
        $this->chatOthers = $chatOthers;

        return $this;
    }

    /**
     * Get chatOthers.
     *
     * @return string
     */
    public function getChatOthers()
    {
        return $this->chatOthers;
    }

    /**
     * Set futuretrips.
     *
     * @param int $futuretrips
     *
     * @return Member
     */
    public function setFuturetrips($futuretrips)
    {
        $this->futuretrips = $futuretrips;

        return $this;
    }

    /**
     * Get futuretrips.
     *
     * @return int
     */
    public function getFuturetrips()
    {
        return $this->futuretrips;
    }

    /**
     * Set oldtrips.
     *
     * @param int $oldtrips
     *
     * @return Member
     */
    public function setOldtrips($oldtrips)
    {
        $this->oldtrips = $oldtrips;

        return $this;
    }

    /**
     * Get oldtrips.
     *
     * @return int
     */
    public function getOldtrips()
    {
        return $this->oldtrips;
    }

    /**
     * Set logcount.
     *
     * @param int $logcount
     *
     * @return Member
     */
    public function setLogcount($logcount)
    {
        $this->logcount = $logcount;

        return $this;
    }

    /**
     * Get logcount.
     *
     * @return int
     */
    public function getLogcount()
    {
        return $this->logcount;
    }

    /**
     * Set hobbies.
     *
     * @param int $hobbies
     *
     * @return Member
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * Get hobbies.
     *
     * @return int
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set books.
     *
     * @param int $books
     *
     * @return Member
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Get books.
     *
     * @return int
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set music.
     *
     * @param int $music
     *
     * @return Member
     */
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get music.
     *
     * @return int
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set pasttrips.
     *
     * @param int $pasttrips
     *
     * @return Member
     */
    public function setPasttrips($pasttrips)
    {
        $this->pasttrips = $pasttrips;

        return $this;
    }

    /**
     * Get pasttrips.
     *
     * @return int
     */
    public function getPasttrips()
    {
        return $this->pasttrips;
    }

    /**
     * Set plannedtrips.
     *
     * @param int $plannedtrips
     *
     * @return Member
     */
    public function setPlannedtrips($plannedtrips)
    {
        $this->plannedtrips = $plannedtrips;

        return $this;
    }

    /**
     * Get plannedtrips.
     *
     * @return int
     */
    public function getPlannedtrips()
    {
        return $this->plannedtrips;
    }

    /**
     * Set pleasebring.
     *
     * @param int $pleasebring
     *
     * @return Member
     */
    public function setPleasebring($pleasebring)
    {
        $this->pleasebring = $pleasebring;

        return $this;
    }

    /**
     * Get pleasebring.
     *
     * @return int
     */
    public function getPleasebring()
    {
        return $this->pleasebring;
    }

    /**
     * Set offerguests.
     *
     * @param int $offerguests
     *
     * @return Member
     */
    public function setOfferguests($offerguests)
    {
        $this->offerguests = $offerguests;

        return $this;
    }

    /**
     * Get offerguests.
     *
     * @return int
     */
    public function getOfferguests()
    {
        return $this->offerguests;
    }

    /**
     * Set offerhosts.
     *
     * @param int $offerhosts
     *
     * @return Member
     */
    public function setOfferhosts($offerhosts)
    {
        $this->offerhosts = $offerhosts;

        return $this;
    }

    /**
     * Get offerhosts.
     *
     * @return int
     */
    public function getOfferhosts()
    {
        return $this->offerhosts;
    }

    /**
     * Set publictransport.
     *
     * @param int $publictransport
     *
     * @return Member
     */
    public function setPublictransport($publictransport)
    {
        $this->publictransport = $publictransport;

        return $this;
    }

    /**
     * Get publictransport.
     *
     * @return int
     */
    public function getPublictransport()
    {
        return $this->publictransport;
    }

    /**
     * Set movies.
     *
     * @param int $movies
     *
     * @return Member
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }

    /**
     * Get movies.
     *
     * @return int
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Set chatGoogle.
     *
     * @param int $chatGoogle
     *
     * @return Member
     */
    public function setChatGoogle($chatGoogle)
    {
        $this->chatGoogle = $chatGoogle;

        return $this;
    }

    /**
     * Get chatGoogle.
     *
     * @return int
     */
    public function getChatGoogle()
    {
        return $this->chatGoogle;
    }

    /**
     * Set lastswitchtoactive.
     *
     * @param \DateTime $lastswitchtoactive
     *
     * @return Member
     */
    public function setLastswitchtoactive($lastswitchtoactive)
    {
        $this->lastswitchtoactive = $lastswitchtoactive;

        return $this;
    }

    /**
     * Get lastswitchtoactive.
     *
     * @return \DateTime
     */
    public function getLastswitchtoactive()
    {
        return $this->lastswitchtoactive;
    }

    /**
     * Set bewelcomed.
     *
     * @param int $bewelcomed
     *
     * @return Member
     */
    public function setBewelcomed($bewelcomed)
    {
        $this->bewelcomed = $bewelcomed;

        return $this;
    }

    /**
     * Get bewelcomed.
     *
     * @return int
     */
    public function getBewelcomed()
    {
        return $this->bewelcomed;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * String representation of object.
     *
     * @see http://php.net/manual/en/serializable.serialize.php
     *
     * @return string the string representation of the object or null
     *
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ]);
    }

    /**
     * Constructs the object.
     *
     * @see http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // Grant user role to everyone
        $roles = [
            'ROLE_USER',
        ];

        $volunteerRights = $this->getVolunteerRights();
        if (null !== $volunteerRights) {
            foreach ($volunteerRights->getIterator() as $volunteerRight) {
                if (0 !== $volunteerRight->getLevel()) {
                    $roles[] = 'ROLE_ADMIN_'.strtoupper($volunteerRight->getRight()->getName());
                }
            }

            // If additional roles are found add ROLE_ADMIN as well to get past the /admin firewall
            if (count($roles) > 1) {
                $roles[] = 'ROLE_ADMIN';
            }
        }

        return $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * Return null as we use BCrypt for password hashing
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Gets the name of the encoder used to encode the password.
     *
     * @throws RuntimeException password not supported
     *
     * @return string
     */
    public function getEncoderName()
    {
        if (preg_match('/^\*[0-9A-F]{40}$/', $this->getPassWord())) {
            return LegacyPasswordEncoder::class;
        }

        if (!preg_match('/^\$2y\$[0-9]{2}\$.{53}$/', $this->getPassWord())) {
            throw new RuntimeException('Password is neither bcrypt or legacy sha1.');
        }

        if ($this->isPrivileged()) {
            return 'harsh';
        }

        return 'default';
    }

    public function isPrivileged()
    {
        foreach ($this->getRoles() as $role) {
            if (preg_match('/ROLE_ADMIN.*/', $role)) {
                return true;
            }
        }

        return false;
    }

    public function getLocale()
    {
        return 'en';
    }

    public function isBrowseable()
    {
        if (in_array(
            $this->status,
            [
                'TakenOut',
                'SuspendedBeta',
                'AskToLeave',
                'Buggy',
                'Banned',
                'Rejected',
                'DuplicateSigned', ],
            true
        )) {
            return false;
        }

        return true;
    }

    public function getVolunteerRights()
    {
        return $this->volunteerRights;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function getLanguages()
    {
        return $this->languages;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getRelationships()
    {
        return $this->comments;
    }

    /**
     * Add cryptedField.
     *
     * @param CryptedField $cryptedField
     *
     * @return Member
     */
    public function addCryptedField(CryptedField $cryptedField)
    {
        $this->cryptedFields[] = $cryptedField;

        return $this;
    }

    /**
     * Remove cryptedField.
     *
     * @param CryptedField $cryptedField
     */
    public function removeCryptedField(CryptedField $cryptedField)
    {
        $this->cryptedFields->removeElement($cryptedField);
    }

    /**
     * Get cryptedFields.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCryptedFields()
    {
        return $this->cryptedFields;
    }

    /**
     * Add volunteerRight.
     *
     * @param RightVolunteer $volunteerRight
     *
     * @return Member
     */
    public function addVolunteerRight(RightVolunteer $volunteerRight)
    {
        $this->volunteerRights[] = $volunteerRight;

        return $this;
    }

    /**
     * Remove volunteerRight.
     *
     * @param RightVolunteer $volunteerRight
     */
    public function removeVolunteerRight(RightVolunteer $volunteerRight)
    {
        $this->volunteerRights->removeElement($volunteerRight);
    }

    /**
     * Add group.
     *
     * @param Group $group
     *
     * @return Member
     */
    public function addGroup(Group $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group.
     *
     * @param \AppBundle\Entity\Group $group
     */
    public function removeGroup(Group $group)
    {
        $this->groups->removeElement($group);
    }

    public function getCryptedField($fieldName)
    {
        $stripped = '';
        $criteria = Criteria::create()
            ->where(Criteria::expr()->eq('tablecolumn', 'members.'.$fieldName));
        $cryptedField = $this->cryptedFields->matching($criteria)->first();
        if (false !== $cryptedField) {
            $value = $cryptedField->getMemberCryptedValue();
            $stripped = strip_tags($value);
        }

        return $stripped;
    }
}

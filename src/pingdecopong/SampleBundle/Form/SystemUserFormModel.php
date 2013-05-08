<?php

namespace pingdecopong\SampleBundle\Form;

use Symfony\Component\Validator\Constraints as Assert;

class SystemUserFormModel {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max="40")
     */
    private $displayName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max="40")
     */
    private $displayNameKana;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $nickName;

    /**
     * @var integer 会社ＩＤ
     */
    private $company;

    /**
     * @var integer 部署ＩＤ
     */
    private $department;

    /**
     * @var string メールアドレス
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="100")
     */
    private $mailAddress;

    /**
     * @var int 権限番号
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="numeric")
     */
    private $systemRoleId;

    /**
     * @var  登録日時
     *
     * @Assert\NotBlank()
     * @Assert\DateTime()
     */
    private $createDatetime;

    /**
     * @param  $createDatetime
     */
    public function setCreateDatetime($createDatetime)
    {
        $this->createDatetime = $createDatetime;
    }

    /**
     * @return
     */
    public function getCreateDatetime()
    {
        return $this->createDatetime;
    }

    /**
     * @param int $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param int $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return int
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayNameKana
     */
    public function setDisplayNameKana($displayNameKana)
    {
        $this->displayNameKana = $displayNameKana;
    }

    /**
     * @return string
     */
    public function getDisplayNameKana()
    {
        return $this->displayNameKana;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $mailAddress
     */
    public function setMailAddress($mailAddress)
    {
        $this->mailAddress = $mailAddress;
    }

    /**
     * @return string
     */
    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param int $systemRoleId
     */
    public function setSystemRoleId($systemRoleId)
    {
        $this->systemRoleId = $systemRoleId;
    }

    /**
     * @return int
     */
    public function getSystemRoleId()
    {
        return $this->systemRoleId;
    }



}
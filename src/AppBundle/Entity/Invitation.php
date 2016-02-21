<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invitations")
 */
class Invitation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=6)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $email;

    /**
     * When sending invitation be sure to set this value to bool(true). It can prevent invitations from being sent
     * twice.
     *
     * @ORM\Column(type="boolean")
     */
    protected $sent = false;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="invitation", cascade={"persist", "merge"})
     */
    protected $user;

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        // Generate identifier only once, here a 6 characters length code.
        $this->code = substr(md5(uniqid(rand(), true)), 0, 6);
    }

    /**
     * Get: Invitation Code
     *
     * @access public
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get: User's Email Address
     *
     * @access public
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Mark Invitation as Sent
     *
     * @access public
     * @return void
     */
    public function send()
    {
        $this->sent = true;
    }

    /**
     * Is Invitation Sent?
     *
     * @access public
     * @return boolean
     */
    public function isSent()
    {
        return $this->sent;
    }

    /**
     * Get: User Object
     *
     * @access public
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set: User's Email Address
     *
     * @access public
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set: User Object
     *
     * @access public
     * @param \AppBundle\Entity\User $user
     * @return void
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="user_groups",
     *      joinColumns={@ORM\JoinColumn(name="user", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @access protected
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Invitation", inversedBy="user")
     * @ORM\JoinColumn(referencedColumnName="code", name="invitation")
     * @Assert\NotNull(message="Your invitation code is wrong", groups={"Registration"})
     */
    protected $invitation;

    /**
     * @return \AppBundle\Entity\Invitation
     */
    public function getInvitation()
    {
        return $this->invitation;
    }

    /**
     * @param  \AppBundle\Entity\Invitation $invitation
     * @return void
     */
    public function setInvitation(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }
}

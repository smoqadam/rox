<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Member;
use AppBundle\Entity\Message;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig_Extension;
use Twig_Extension_GlobalsInterface;

class MemberTwigExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * MemberTwigExtension constructor.
     *
     * @param Session       $session
     * @param EntityManager $em
     */
    public function __construct(Session $session, EntityManager $em)
    {
        $this->session = $session;
        $this->em = $em;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        $member = null;
        $rememberMeToken = unserialize($this->session->get('_security_default'));
        if (false !== $rememberMeToken) {
            $member = $rememberMeToken->getUser();
        }

        return [
            'my_member' => $member ? $member : null,
            'messageCount' => $member ? $this->getUnreadMessagesCount($member) : 0,
            'teams' => $member ? $this->getTeams($rememberMeToken->getRoles()) : [],
        ];
    }

    public function getName()
    {
        return self::class;
    }

    protected function getUnreadMessagesCount(Member $member)
    {
        $messageRepository = $this->em->getRepository(Message::class);

        return $messageRepository->getUnreadCount($member);
    }

    /**
     * @param array $roles
     *
     * @return array
     */
    protected function getTeams($roles)
    {
        $allTeams = [
            'communitynews' => [
                'AdminCommunityNews',
                'admin/communitynews',
            ],
            'words' => [
                'AdminWord',
                'admin/word',
            ],
            'flags' => [
                'AdminFlags',
                'admin/flags',
            ],
            'rights' => [
                'AdminRights',
                'admin/rights',
            ],
            'logs' => [
                'AdminLogs',
                'admin/logs',
            ],
            'comments' => [
                'AdminComments',
                'bw/admin/admincomments.php',
            ],
            'newmembersbewelcome' => [
                'AdminNewMembers',
                'admin/newmembers',
            ],
            'massmail' => [
                'AdminMassMail',
                'admin/massmail',
            ],
            'treasurer' => [
                'AdminTreasurer',
                'admin/treasurer',
            ],
            'faq' => [
                'AdminFAQ',
                'bw/faq.php',
            ],
            'sqlforvolunteers' => [
                'AdminSqlForVolunteers',
                'bw/admin/adminquery.php',
            ],
        ];

        $teams = [];
        $keys = array_keys($allTeams);
        foreach ($roles as $role) {
            $role = strtolower(str_replace('ROLE_ADMIN_', '', $role->getRole()));
            if (in_array($role, $keys, true)) {
                $teams[] = [
                    'trans' => $allTeams[$role][0],
                    'link' => $allTeams[$role][1],
                ];
            }
        }

        return $teams;
    }
}

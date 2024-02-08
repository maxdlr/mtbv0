<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/api/login', name: 'api_login', methods: ['POST'])]
class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login', methods: ['POST'])]
    public function login(#[CurrentUser] ?User $user = null): Response
    {
        if (!$user) {
            return $this->json([
                'error' => 'Invalid login request, check Content-Type'
            ], 401);
        }

        return $this->json([
            'user' => $user->getUserIdentifier()
        ]);
    }
}

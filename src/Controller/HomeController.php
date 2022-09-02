<?php

namespace App\Controller;

use App\Classe\MailSend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $mail = new MailSend();
        $mail->send('yasmine.radouani@outlook.fr', 'Yasmine Radouani', 'Mon premier Mail', 'Bonjour Joelle');

        return $this->render('home/index.html.twig');
    }
}

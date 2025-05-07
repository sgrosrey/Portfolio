<?php

namespace App\Service;

use App\Entity\ContactData;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class EmailService
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly Environment $twig
    ) {
    }

    public function sendContactEmails(ContactData $data): void
    {
        $this->sendAdminEmail($data);
        $this->sendConfirmationEmail($data);
    }

    private function sendAdminEmail(ContactData $data): void
    {
        $email = (new Email())
            ->from(new Address($data->getEmail(), $data->getName()))
            ->to(new Address('contact@guillaume-piard.fr', 'Guillaume PIARD'))
            ->subject('Nouveau message de ' . $data->getEmail())
            ->html($this->twig->render('emails/contact_admin.html.twig', [
                'data' => $data
            ]));

        $this->mailer->send($email);
    }

    private function sendConfirmationEmail(ContactData $data): void
    {
        $email = (new Email())
            ->from(new Address('contact@guillaume-piard.fr', 'Guillaume PIARD'))
            ->to(new Address($data->getEmail(), $data->getName()))
            ->subject('Confirmation de réception')
            ->html($this->twig->render('emails/contact_confirmation.html.twig', [
                'data' => $data
            ]));

        $this->mailer->send($email);
    }
}

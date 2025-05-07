// src/Service/EmailService.php
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
            ->to('contact@guillaume-piard.fr')
            ->subject('Nouveau message portfolio')
            ->html($this->twig->render('emails/contact_admin.html.twig', [
                'data' => $data
            ]));

        $this->mailer->send($email);
    }

    // Méthode similaire pour sendConfirmationEmail
}

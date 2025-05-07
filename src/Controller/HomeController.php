<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\EmailService;
use App\Service\PortfolioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    public function __construct(
        private readonly PortfolioService $portfolioService,
        private readonly EmailService $emailService
    ) {}


    #[Route('/switch-locale/{locale}', name: 'switch_locale', methods: ['POST'])]
    public function switchLocale(
        Request $request,
        string $locale,
        TranslatorInterface $translator
    ): JsonResponse {
        $supportedLocales = ['en', 'fr'];
        
        if (!in_array($locale, $supportedLocales, true)) {
            return $this->json([
                'success' => false,
                'message' => 'Unsupported locale'
            ], Response::HTTP_BAD_REQUEST);
        }

        $request->getSession()->set('_locale', $locale);
        $content = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        
        // Liste des clés de traduction autorisées
        $validKeys = [
            'home', 'projects', 'experiences', 'educations', 
            'skills', 'contact', 'legal', 'privacy'
        ];
        $keys = array_intersect($content['keys'] ?? [], $validKeys);

        $translations = [];
        foreach ($keys as $key) {
            $translations[$key] = $translator->trans($key, [], null, $locale);
        }

        return $this->json([
            'success' => true,
            'locale' => $locale,
            'translations' => $translations
        ]);
    }

    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->emailService->sendContactEmails($form->getData());
                $this->addFlash('success', 'Votre message a bien été envoyé');
                return $this->redirectToRoute('home');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi du message');
            }
        }

        return $this->render('home/index.html.twig', [
            ...$this->portfolioService->getAllData(),
            'age' => $this->portfolioService->calculateAge(new \DateTimeImmutable('1988-09-20')),
            'form' => $form->createView()
        ]);
    }

    #[Route('/legal-notice', name: 'legal_notice')]
    public function legalNotice(): Response
    {
        return $this->render('home/legal_notice.html.twig');
    }

    #[Route('/privacy-policy', name: 'privacy_policy')]
    public function privacyPolicy(): Response
    {
        return $this->render('home/privacy_policy.html.twig');
    }
}

<?php

namespace App\Service;

/**
 * Service centralisant les données du portfolio.
 */
class PortfolioService
{
    public function calculateAge(\DateTimeInterface $birthDate): int
{
    $today = new \DateTime();
    return $today->diff($birthDate)->y;
}
    /**
     * Retourne toutes les données du portfolio pour la page d'accueil.
     */
    public function getAllData(): array
    {
        return [
            'personal_info' => $this->getPersonalInfo(),
            'skills'        => $this->getSkills(),
            'experiences'   => $this->getExperiences(),
            'educations'    => $this->getEducations(),
            'projects'      => $this->getProjects(),
        ];
    }

    /**
     * Retourne les compétences classées par catégorie.
     */
    public function getSkills(): array
    {
        return [   
            'Languages' => [
                'icon'        => 'fa-solid fa-code',
                'color_bg'    => 'blue-500/40',
                'color_text'  => 'blue-400',
                'color_hover' => 'blue-800',
                'items'       => [
                    [ 'icon' => 'fa-brands fa-html5',      'name' => 'HTML',       'display' => true ],
                    [ 'icon' => 'fa-brands fa-css3-alt',   'name' => 'CSS',        'display' => true ],
                    [ 'icon' => 'fa-brands fa-js',         'name' => 'JavaScript', 'display' => true ],
                    [ 'image' => 'skills/typescript.svg',  'name' => 'TypeScript', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-php',        'name' => 'PHP',        'display' => true ],
                    [ 'icon' => 'fa-brands fa-python',     'name' => 'Python',     'display' => true ],
                    [ 'icon' => 'fa-brands fa-java',       'name' => 'Java',       'display' => true ],
                ]
            ],
            'Frameworks' => [
                'icon'        => 'fa-solid fa-layer-group',
                'color_bg'    => 'red-500/40',
                'color_text'  => 'red-400',
                'color_hover' => 'red-800',
                'items'       => [
                    [ 'icon' => 'fa-brands fa-symfony',             'name' => 'Symfony',      'display' => true ],
                    [ 'image' => 'skills/flask.png',                'name' => 'Flask',        'display' => true ],
                    [ 'icon' => 'fa-brands fa-bootstrap',           'name' => 'Bootstrap',    'display' => true ],
                ]
            ],
            'Backend' => [
                'icon'        => 'fa-solid fa-server',
                'color_bg'    => 'green-500/40',
                'color_text'  => 'green-400',
                'color_hover' => 'green-800',
                'items'       => [
                    [ 'icon' => 'fa-brands fa-node',        'name' => 'Node.js',    'display' => true ],
                    [ 'icon' => 'fa-solid fa-database',     'name' => 'MySQL',      'display' => true ],
                    [ 'icon' => 'fa-solid fa-database',     'name' => 'SQLite',     'display' => true ],
                    [ 'icon' => 'fa-solid fa-server',       'name' => 'REST APIs',  'display' => true ],
                ]
            ],
            'Practices' => [
                'icon'        => 'fa-solid fa-list-check',
                'color_bg'    => 'yellow-500/40',
                'color_text'  => 'yellow-400',
                'color_hover' => 'yellow-800',
                'items'       => [
                    [ 'icon' => 'fa-solid fa-arrows-spin',  'name' => 'Agile',   'display' => true ],
                    [ 'icon' => 'fa-brands fa-git-alt',     'name' => 'Git',     'display' => true ],
                    [ 'image' => 'skills/postman.svg',      'name' => 'Postman', 'display' => true ],
                ]
            ]
        ];
    }

    /**
     * Recherche une technologie par son nom.
     */
    public function findTechByName(string $name): ?array
    {
        $skills = $this->getSkills();
        foreach ($skills as $category) {
            foreach ($category['items'] as $item) {
                if ($item['name'] === $name) {
                    return array_merge($item, [
                        'color_bg'    => $category['color_bg'],
                        'color_text'  => $category['color_text'],
                        'color_hover' => $category['color_hover'],
                    ]);
                }
            }
        }
        return null;
    }

    /**
     * Retourne la liste des expériences professionnelles.
     */
    public function getExperiences(): array
    {
        return [
            [
                'title'        => 'Développeur Full-Stack',
                'company'      => 'Actimage',
                'location'     => 'Strasbourg, France',
                'period'       => '2019 - 2022',
                'logo'         => 'companies/actimage.png',
                'description'  => [
                    'Développement d’applications gouvernementales majeures, telles que prix-carburants.gouv.fr et vigicrues.gouv.fr.',
                    'Gestion complète des projets, de la conception au déploiement.',
                    'Optimisation des performances et sécurisation des données.',
                    'Collaboration avec Actimage, acteur reconnu en IT dans le Grand Est.',
                ],
                'technologies' => $this->mapTechs([
                    'Symfony', 'PHP', 'TypeScript', 'Node.js', 'MySQL', 'SQLite', 'REST APIs', 'Git', 'Agile', 'Postman'
                ])
            ],
            [
                'title'        => 'Développeur Full-Stack Freelance',
                'company'      => 'Indépendant (WIWEB)',
                'location'     => 'Strasbourg, France',
                'period'       => '2022 - Présent',
                'logo'         => 'companies/freelance.png', 
                'description'  => [
                    'Gestion complète de projets web et mobiles pour divers clients, avec un focus sur Symfony et PHP.',
                    'Conception et développement d’applications sur mesure, orientées performance et sécurité.',
                    'Accompagnement client de la phase de conception jusqu’au déploiement et maintenance.',
                ],
                'technologies' => $this->mapTechs([
                    'Symfony', 'PHP', 'TypeScript', 'Node.js', 'MySQL', 'SQLite', 'REST APIs', 'Git', 'Agile', 'Postman'
                ])
            ],
        ];
    }
    /**
     * Retourne la liste des formations.
     */
    public function getEducations(): array
    {
        return [
            [
                'degree'      => 'Développeur Web et Web Mobile',
                'school'      => 'Wild Code School Strasbourg',
                'location'    => 'Strasbourg, France',
                'period'      => '2018',
                'logo'        => 'schools/wild-code-school.png',
                'description' => [
                    'Spécialisation Symfony et développement full-stack.',
                ]
            ],
            [
                'degree'      => 'BTS Management des Unités Commerciales',
                'school'      => 'CCI Strasbourg',
                'location'    => 'Strasbourg, France',
                'period'      => '2012 - 2014',
                'logo'        => 'schools/cci-strasbourg.png',
                'description' => [
                    'Formation commerciale et gestion d’équipes.',
                ]
            ],
        ];
    }

    /**
     * Retourne la liste des projets réalisés.
     */
   /**
 * Retourne la liste des projets réalisés.
 */
public function getProjects(): array
{
    return [
        [
            'title'        => 'Prix-carburants.gouv.fr',
            'description'  => 'Plateforme gouvernementale de suivi des prix des carburants en temps réel - Ministère de l\'Économie',
            'image'        => 'projects/prix-carburants.jpg',
            'website'      => 'https://www.prix-carburants.gouv.fr',
            'github'       => null, // Code propriétaire
            'demo'         => null,
            'technologies' => $this->mapTechs([
                'PHP', 'Symfony', 'API Platform', 'MySQL', 
                'Twig', 'Bootstrap', 'Docker', 'REST APIs', 
                'Git', 'Agile', 'Postman'
            ]),
            'features'     => [
                'Intégration des flux Open Data en temps réel',
                'Système de géolocalisation des stations-service',
                'API publique avec documentation technique',
                'Tableaux de bord analytiques pour le ministère',
                'Conformité RGAA et sécurité gouvernementale'
            ]
        ],
        [
            'title'        => 'Vigicrues.gouv.fr',
            'description'  => 'Système national de surveillance et d\'alerte des crues - Ministère de la Transition Écologique',
            'image'        => 'projects/vigicrues.jpg',
            'website'      => 'https://www.vigicrues.gouv.fr',
            'github'       => null,
            'demo'         => null,
            'technologies' => $this->mapTechs([
                'Symfony', 'PHP', 'Node.js', 'MySQL', 
                'TypeScript', 'Leaflet.js', 'API REST', 
                'Docker', 'GitLab CI/CD'
            ]),
            'features'     => [
                'Visualisation cartographique en temps réel',
                'Intégration avec les API hydrométriques',
                'Système d\'alertes push multi-canaux',
                'Tableaux de bord personnalisables pour les préfectures',
                'Gestion des seuils d\'alerte configurables'
            ]
        ],
        [
            'title'        => 'Application mobile VIGICRUES',
            'description'  => 'Application cross-platform de surveillance des crues (Android/iOS)',
            'image'        => 'projects/vigicrues-mobile.jpg',
            'website'      => null,
            'github'       => null,
            'demo'         => 'https://play.google.com/store/apps/details?id=fr.gouv.vigicrues',
            'technologies' => $this->mapTechs([
                'Ionic', 'Angular', 'TypeScript', 'Capacitor', 
                'Chart.js', 'Geolocation API', 'Push Notifications'
            ]),
            'features'     => [
                'Notifications push en cas d\'alerte crue',
                'Géolocalisation des zones à risque',
                'Synchro offline des données critiques',
                'Intégration profonde avec les API Vigicrues',
                'Publication sur Apple Store & Play Store'
            ]
        ],
    ];
}


    /**
     * Retourne les informations personnelles.
     */
    public function getPersonalInfo(): array
    {
        return [
            'name'          => 'Sylvain GROSREY',
            'title'         => 'Développeur Web et Mobile Full-Stack',
            'bio'           => 'Développeur full-stack passionné spécialisé en Symfony et PHP avec plus de 5 ans d’expérience dans des projets web et mobiles critiques.',
            'profile_image' => 'images/profil.jpg',
            'social'        => [
                'linkedin' => 'https://linkedin.com/in/sylvaingrosrey',
                'github'   => 'https://github.com/sylvain-grosrey',
                'email'    => 'contact@sylvain-grosrey.fr',
            ],
            'cv'            => 'files/cv_sylvain_grosrey.pdf',
        ];
    }

    /**
     * Utilitaire pour transformer un tableau de noms de technologies en tableau de données enrichies.
     */
    private function mapTechs(array $names): array
    {
        return array_filter(array_map(fn($tech) => $this->findTechByName($tech), $names));
    }
}

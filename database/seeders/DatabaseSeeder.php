<?php

namespace Database\Seeders;

use App\Models\Composant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(TemplateSeeder::class);

        Composant::create([
            'name' => 'Navbar',
            'contenu' => json_encode([
            'logo' => 'assets/img/navbar-logo.svg',
             'links' => [
            ['label' => 'Services', 'url' => '#services'],
            ['label' => 'Portfolio', 'url' => '#portfolio'],
            ['label' => 'About', 'url' => '#about'],
            ['label' => 'Team', 'url' => '#team'],
            ['label' => 'Contact', 'url' => '#contact'],
                 ],
           ]),
           'templateId' => 1,

     ]);
        
     Composant::create([
        'name' => 'Masthead',
        'contenu' => json_encode([
            'subheading' => 'Welcome To Our Studio!',
            'heading' => "It's Nice To Meet You",
            'buttonText' => 'Tell Me More',
        ]),
        'templateId' => 1,
    ]);

    Composant::create([
        'name' => 'Services',
        'contenu' => json_encode([
            'heading' => 'Services',
            'subheading' => 'Lorem ipsum dolor sit amet consectetur.',
            'services' => [
                [
                    'icon' => 'fas fa-shopping-cart',
                    'title' => 'E-Commerce',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'
                ],
                [
                    'icon' => 'fas fa-laptop',
                    'title' => 'Responsive Design',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'
                ],
                [
                    'icon' => 'fas fa-lock',
                    'title' => 'Web Security',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.'
                ],
            ]
        ]),
        'templateId' => 1,
    ]);
    Composant::create([
        'name' => 'Portfolio',
        'contenu' => json_encode([
            'heading' => 'Portfolio',
            'subheading' => 'Lorem ipsum dolor sit amet consectetur.',
            'items' => [
                [
                    'image' => 'assets/img/portfolio/1.jpg',
                    'modal' => '#portfolioModal1',
                    'captionHeading' => 'Threads',
                    'captionSubheading' => 'Illustration'
                ],
                [
                    'image' => 'assets/img/portfolio/2.jpg',
                    'modal' => '#portfolioModal2',
                    'captionHeading' => 'Explore',
                    'captionSubheading' => 'Graphic Design'
                ],
                [
                    'image' => 'assets/img/portfolio/3.jpg',
                    'modal' => '#portfolioModal3',
                    'captionHeading' => 'Finish',
                    'captionSubheading' => 'Identity'
                ],
                [
                    'image' => 'assets/img/portfolio/4.jpg',
                    'modal' => '#portfolioModal4',
                    'captionHeading' => 'Lines',
                    'captionSubheading' => 'Branding'
                ],
                [
                    'image' => 'assets/img/portfolio/5.jpg',
                    'modal' => '#portfolioModal5',
                    'captionHeading' => 'Southwest',
                    'captionSubheading' => 'Website Design'
                ],
                [
                    'image' => 'assets/img/portfolio/6.jpg',
                    'modal' => '#portfolioModal6',
                    'captionHeading' => 'Window',
                    'captionSubheading' => 'Photography'
                ],
            ]
        ]),
        'templateId' => 1,
    ]);
       
    Composant::create([
        'name' => 'About',
        'contenu' => json_encode([
            'heading' => 'About',
            'subheading' => 'Lorem ipsum dolor sit amet consectetur.',
            'timeline' => [
                [
                    'image' => 'assets/img/about/1.jpg',
                    'year' => '2009-2011',
                    'subheading' => 'Our Humble Beginnings',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
                    'inverted' => false
                ],
                [
                    'image' => 'assets/img/about/2.jpg',
                    'year' => 'March 2011',
                    'subheading' => 'An Agency is Born',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
                    'inverted' => true
                ],
                [
                    'image' => 'assets/img/about/3.jpg',
                    'year' => 'December 2015',
                    'subheading' => 'Transition to Full Service',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
                    'inverted' => false
                ],
                [
                    'image' => 'assets/img/about/4.jpg',
                    'year' => 'July 2020',
                    'subheading' => 'Phase Two Expansion',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
                    'inverted' => true
                ],
                [
                    'finalMessage' => 'Be Part Of Our Story!'
                ]
            ]
        ]),
        'templateId' => 1,
    ]);

    Composant::create([
        'name' => 'Team',
        'contenu' => json_encode([
            'heading' => 'Our Amazing Team',
            'subheading' => 'Lorem ipsum dolor sit amet consectetur.',
            'members' => [
                [
                    'image' => 'assets/img/team/1.jpg',
                    'name' => 'Parveen Anand',
                    'role' => 'Lead Designer',
                    'social' => [
                        'twitter' => '#',
                        'facebook' => '#',
                        'linkedin' => '#',
                    ]
                ],
                [
                    'image' => 'assets/img/team/2.jpg',
                    'name' => 'Diana Petersen',
                    'role' => 'Lead Marketer',
                    'social' => [
                        'twitter' => '#',
                        'facebook' => '#',
                        'linkedin' => '#',
                    ]
                ],
                [
                    'image' => 'assets/img/team/3.jpg',
                    'name' => 'Larry Parker',
                    'role' => 'Lead Developer',
                    'social' => [
                        'twitter' => '#',
                        'facebook' => '#',
                        'linkedin' => '#',
                    ]
                ]
            ],
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.'
        ]),
        'templateId' => 1,
    ]);
    
    Composant::create([
        'name' => 'Clients',
        'contenu' => json_encode([
            'logos' => [
                [
                    'image' => 'assets/img/logos/microsoft.svg',
                    'alt' => 'Microsoft Logo',
                    'aria_label' => 'Microsoft Logo',
                    'link' => '#'
                ],
                [
                    'image' => 'assets/img/logos/google.svg',
                    'alt' => 'Google Logo',
                    'aria_label' => 'Google Logo',
                    'link' => '#'
                ],
                [
                    'image' => 'assets/img/logos/facebook.svg',
                    'alt' => 'Facebook Logo',
                    'aria_label' => 'Facebook Logo',
                    'link' => '#'
                ],
                [
                    'image' => 'assets/img/logos/ibm.svg',
                    'alt' => 'IBM Logo',
                    'aria_label' => 'IBM Logo',
                    'link' => '#'
                ]
            ]
        ]),
        'templateId' => 1,
    ]);

    // Composant::create([
    //     'name' => 'Contact',
    //     'contenu' => json_encode([
    //         'heading' => 'Contact Us',
    //         'subheading' => 'Lorem ipsum dolor sit amet consectetur.'
    //     ]),
    //     'templateId' => 1,
    // ]);
    
    Composant::create([
        'name' => 'Footer',
        'contenu' => json_encode([
            'copyright' => 'Copyright © Your Website 2023',
            'social_links' => [
                'twitter' => '#!',
                'facebook' => '#!',
                'linkedin' => '#!',
            ],
            'footer_links' => [
                'privacy_policy' => '#!',
                'terms_of_use' => '#!',
            ],
        ]),
        'templateId' => 1,
    ]);
    }
    
}

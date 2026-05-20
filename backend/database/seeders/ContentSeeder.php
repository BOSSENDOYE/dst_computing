<?php
namespace Database\Seeders;

use App\Models\MembreEquipe;
use App\Models\Produit;
use App\Models\Service;
use App\Models\Temoignage;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── Produits ──────────────────────────────────────────────────────────
        Produit::updateOrCreate(['nom' => 'SAYCURE'], [
            'tagline'       => 'La solution complète pour votre officine',
            'secteur'       => 'Santé',
            'type'          => 'Logiciel métier',
            'description'   => 'Gestion complète de pharmacie : stock, vente, ordonnances, caisse, audit et conformité.',
            'techs'         => ['WinDev', 'HFSQL'],
            'features'      => ['Gestion des stocks en temps réel', 'Suivi des ordonnances', 'Caisse intégrée', 'Rapports et audit'],
            'href'          => '/realisations',
            'accent_color'  => 'text-dst-blue',
            'badge_class'   => 'bg-blue-50 text-blue-700',
            'bg_gradient'   => 'bg-gradient-to-br from-blue-700 to-dst-blue',
            'btn_bg'        => 'bg-dst-blue hover:bg-blue-700',
            'icon_path'     => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
            'produit_stats' => [['value' => '15+', 'label' => 'Pharmacies clientes'], ['value' => '99.9%', 'label' => 'Disponibilité'], ['value' => '2019', 'label' => 'Lancé en']],
            'is_active'     => true,
            'ordre'         => 1,
        ]);

        Produit::updateOrCreate(['nom' => 'LERAL'], [
            'tagline'       => 'ERP multi-boutiques synchronisé',
            'secteur'       => 'Commerce',
            'type'          => 'ERP multi-boutiques',
            'description'   => 'ERP multi-boutiques avec synchronisation centrale en temps réel. Gérez tout votre réseau depuis un seul outil.',
            'techs'         => ['WinDev', 'HFSQL'],
            'features'      => ['Multi-points de vente', 'Synchronisation temps réel', 'Gestion des stocks', 'Tableau de bord central'],
            'href'          => '/realisations',
            'accent_color'  => 'text-dst-orange',
            'badge_class'   => 'bg-orange-50 text-orange-700',
            'bg_gradient'   => 'bg-gradient-to-br from-orange-600 to-dst-orange',
            'btn_bg'        => 'bg-dst-orange hover:bg-orange-600',
            'icon_path'     => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
            'produit_stats' => [['value' => '10+', 'label' => 'Commerces actifs'], ['value' => '3 pays', 'label' => 'Déployé dans'], ['value' => '2021', 'label' => 'Lancé en']],
            'is_active'     => true,
            'ordre'         => 2,
        ]);

        Produit::updateOrCreate(['nom' => 'GESOM-CCIS'], [
            'tagline'       => "Gestion des certificats d'origine",
            'secteur'       => 'Administration',
            'type'          => 'Logiciel métier',
            'description'   => "Gestion des sommiers, certificats d'origine et conformité CCIS pour les opérations douanières.",
            'techs'         => ['WinDev', 'HFSQL'],
            'features'      => ["Certificats d'origine automatisés", 'Conformité CCIS', 'Suivi des dossiers', 'Rapports douaniers'],
            'href'          => '/realisations',
            'accent_color'  => 'text-green-600',
            'badge_class'   => 'bg-green-50 text-green-700',
            'bg_gradient'   => 'bg-gradient-to-br from-green-700 to-green-500',
            'btn_bg'        => 'bg-green-600 hover:bg-green-700',
            'icon_path'     => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'produit_stats' => [['value' => '500+', 'label' => 'Dossiers/mois'], ['value' => '1', 'label' => 'Déploiement CCIS'], ['value' => '2022', 'label' => 'Lancé en']],
            'is_active'     => true,
            'ordre'         => 3,
        ]);

        Produit::updateOrCreate(['nom' => 'Cabinet Soins Ide'], [
            'tagline'       => 'Le DSI numérique de votre cabinet',
            'secteur'       => 'Santé',
            'type'          => 'Application mobile & web',
            'description'   => 'Gestion complète de cabinet IDE : patients, soins, plaies, DSI, compatible MSP/CPTS.',
            'techs'         => ['Laravel', 'Flutter'],
            'features'      => ['Dossier patient numérique', 'Suivi des soins et plaies', 'Compatible MSP/CPTS', 'Hébergement HDS'],
            'href'          => '/realisations',
            'accent_color'  => 'text-purple-600',
            'badge_class'   => 'bg-purple-50 text-purple-700',
            'bg_gradient'   => 'bg-gradient-to-br from-purple-700 to-purple-500',
            'btn_bg'        => 'bg-purple-600 hover:bg-purple-700',
            'icon_path'     => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
            'produit_stats' => [['value' => '8+', 'label' => 'Cabinets utilisateurs'], ['value' => '2 000+', 'label' => 'Patients suivis'], ['value' => '2023', 'label' => 'Lancé en']],
            'is_active'     => true,
            'ordre'         => 4,
        ]);

        Produit::updateOrCreate(['nom' => 'SEN ARCHIV'], [
            'tagline'       => 'Votre GED sur mesure',
            'secteur'       => 'Archivage',
            'type'          => 'GED / Logiciel métier',
            'description'   => 'Solution GED complète : archivage numérique, workflows documentaires et accès multi-sites sécurisé.',
            'techs'         => ['WebDev', 'Laravel'],
            'features'      => ['Archivage numérique', 'Workflows documentaires', 'Accès multi-sites', 'Recherche full-text'],
            'href'          => '/realisations',
            'accent_color'  => 'text-teal-600',
            'badge_class'   => 'bg-teal-50 text-teal-700',
            'bg_gradient'   => 'bg-gradient-to-br from-teal-700 to-teal-500',
            'btn_bg'        => 'bg-teal-600 hover:bg-teal-700',
            'icon_path'     => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
            'produit_stats' => [['value' => '50 000+', 'label' => 'Documents archivés'], ['value' => '5+', 'label' => 'Institutions clientes'], ['value' => '2023', 'label' => 'Lancé en']],
            'is_active'     => true,
            'ordre'         => 5,
        ]);

        // ── Témoignages ───────────────────────────────────────────────────────
        Temoignage::firstOrCreate(['name' => 'Moussa Diallo'], [
            'role'      => 'Pharmacien titulaire',
            'company'   => 'Pharmacie Centrale, Dakar',
            'avatar_bg' => 'bg-dst-blue',
            'text'      => 'SAYCURE a totalement transformé la gestion de notre officine. Le suivi des stocks en temps réel et la gestion des ordonnances nous font gagner un temps précieux chaque jour. Le support de DST Computing est réactif et professionnel.',
            'is_active' => true,
            'ordre'     => 1,
        ]);

        Temoignage::firstOrCreate(['name' => 'Fatou Sow'], [
            'role'      => 'Directrice Générale',
            'company'   => 'Réseau Boutiques LERAL, Thiès',
            'avatar_bg' => 'bg-dst-orange',
            'text'      => 'Grâce à LERAL, nous supervisons nos 5 boutiques depuis un seul tableau de bord. La synchronisation en temps réel est impressionnante. DST Computing a compris nos besoins métiers dès le départ.',
            'is_active' => true,
            'ordre'     => 2,
        ]);

        Temoignage::firstOrCreate(['name' => 'Ibrahima Ndiaye'], [
            'role'      => 'Responsable Informatique',
            'company'   => 'CCIS Sénégal',
            'avatar_bg' => 'bg-green-600',
            'text'      => "GESOM-CCIS a digitalisé l'ensemble de notre processus de délivrance des certificats d'origine. Fiabilité, conformité et gain de temps : exactement ce que nous cherchions.",
            'is_active' => true,
            'ordre'     => 3,
        ]);

        Temoignage::firstOrCreate(['name' => 'Aïssatou Diop'], [
            'role'      => 'Infirmière libérale',
            'company'   => 'Cabinet Soins Ide, Dakar',
            'avatar_bg' => 'bg-purple-600',
            'text'      => "Le logiciel Cabinet Soins Ide nous a permis de passer au tout numérique. Les dossiers patients, les soins, les rapports — tout est centralisé et accessible n'importe où.",
            'is_active' => true,
            'ordre'     => 4,
        ]);

        Temoignage::firstOrCreate(['name' => 'Cheikh Mbaye'], [
            'role'      => 'Directeur Administratif',
            'company'   => 'Ministère, Dakar',
            'avatar_bg' => 'bg-teal-600',
            'text'      => 'SEN ARCHIV a révolutionné notre gestion documentaire. La recherche full-text et les workflows d\'approbation nous font gagner des heures chaque semaine.',
            'is_active' => true,
            'ordre'     => 5,
        ]);

        // ── Membres Équipe ────────────────────────────────────────────────────
        MembreEquipe::firstOrCreate(['initiales' => 'DG'], [
            'nom'        => 'Directeur Général',
            'poste'      => 'Directeur Général & Fondateur',
            'bio'        => 'Architecte de la vision de DST Computing, il pilote la stratégie et les partenariats.',
            'competences'=> ['Vision stratégique', 'Management', 'Business dev', 'WinDev'],
            'avatar_bg'  => 'bg-dst-blue',
            'is_active'  => true,
            'ordre'      => 1,
        ]);

        MembreEquipe::firstOrCreate(['initiales' => 'LD'], [
            'nom'        => 'Lead Développeur',
            'poste'      => 'Lead Developer',
            'bio'        => 'Expert WinDev et Laravel, il supervise l\'ensemble de nos développements logiciels.',
            'competences'=> ['WinDev', 'Laravel', 'HFSQL', 'Flutter'],
            'avatar_bg'  => 'bg-dst-orange',
            'is_active'  => true,
            'ordre'      => 2,
        ]);

        MembreEquipe::firstOrCreate(['initiales' => 'UX'], [
            'nom'        => 'UX Designer',
            'poste'      => 'Designer UI/UX',
            'bio'        => 'Responsable de l\'expérience utilisateur et du design de nos interfaces.',
            'competences'=> ['Figma', 'UI/UX', 'Tailwind', 'Vue.js'],
            'avatar_bg'  => 'bg-purple-600',
            'is_active'  => true,
            'ordre'      => 3,
        ]);

        MembreEquipe::firstOrCreate(['initiales' => 'IS'], [
            'nom'        => 'Ingénieur Systèmes',
            'poste'      => 'Ingénieur Infrastructure',
            'bio'        => 'Expert réseau et systèmes, il assure la fiabilité de nos déploiements.',
            'competences'=> ['Linux', 'Docker', 'Réseau', 'Sécurité'],
            'avatar_bg'  => 'bg-green-600',
            'is_active'  => true,
            'ordre'      => 4,
        ]);

        // ── Services ──────────────────────────────────────────────────────────
        Service::firstOrCreate(['titre' => 'Développement Logiciel'], [
            'description' => 'Applications métiers sur mesure : gestion stock, caisse, RH, facturation, ERP.',
            'icon_path'   => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
            'items'       => ['Logiciels métiers WinDev', 'Applications HFSQL', 'ERP sur mesure', 'Modules de gestion', 'Tableaux de bord', 'Maintenance MCO'],
            'icon_bg'     => 'bg-dst-blue/20',
            'icon_color'  => 'text-dst-blue',
            'accent_bar'  => 'bg-dst-blue',
            'link_color'  => 'text-dst-blue hover:text-blue-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 1,
        ]);

        Service::firstOrCreate(['titre' => 'Applications Web'], [
            'description' => 'Sites vitrine, e-commerce et plateformes avec Laravel, React et WebDev.',
            'icon_path'   => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
            'items'       => ['Sites vitrines', 'Plateformes e-commerce', 'Applications SaaS', 'API REST/GraphQL', 'Intégration CMS', 'Hébergement VPS'],
            'icon_bg'     => 'bg-indigo-500/20',
            'icon_color'  => 'text-indigo-400',
            'accent_bar'  => 'bg-indigo-500',
            'link_color'  => 'text-indigo-600 hover:text-indigo-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 2,
        ]);

        Service::firstOrCreate(['titre' => 'Applications Mobiles'], [
            'description' => 'Apps Android & iOS avec Flutter. Fonctionnement offline/online garanti.',
            'icon_path'   => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
            'items'       => ['Flutter cross-platform', 'Mode offline/online', 'Notifications push', 'Géolocalisation', 'Paiement mobile', 'Publication stores'],
            'icon_bg'     => 'bg-purple-500/20',
            'icon_color'  => 'text-purple-400',
            'accent_bar'  => 'bg-purple-500',
            'link_color'  => 'text-purple-600 hover:text-purple-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 3,
        ]);

        Service::firstOrCreate(['titre' => 'Agents IA & Automatisation'], [
            'description' => 'Chatbots, OCR intelligent, automatisation et analyse prédictive.',
            'icon_path'   => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
            'items'       => ['Chatbots IA (Claude/GPT)', 'OCR & extraction documents', 'Automatisation RPA', 'Analyse prédictive', 'Agents autonomes', 'Intégration API IA'],
            'icon_bg'     => 'bg-dst-orange/20',
            'icon_color'  => 'text-dst-orange',
            'accent_bar'  => 'bg-dst-orange',
            'link_color'  => 'text-orange-500 hover:text-orange-600',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 4,
        ]);

        Service::firstOrCreate(['titre' => 'Infrastructure & Serveurs'], [
            'description' => 'Installation, configuration et maintenance serveurs, réseau LAN/WAN.',
            'icon_path'   => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
            'items'       => ['Installation serveurs', 'Réseau LAN/WAN', 'VPN & sécurité', 'Virtualisation', 'Sauvegarde', 'Monitoring'],
            'icon_bg'     => 'bg-gray-400/20',
            'icon_color'  => 'text-gray-500',
            'accent_bar'  => 'bg-gray-400',
            'link_color'  => 'text-gray-600 hover:text-gray-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 5,
        ]);

        Service::firstOrCreate(['titre' => 'Gestion Documentaire'], [
            'description' => 'Solution GED SEN ARCHIV : archivage numérique et workflows documentaires.',
            'icon_path'   => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'items'       => ['Archivage numérique', 'Recherche full-text', 'Workflows validation', 'Accès multi-sites', 'Gestion des droits', 'Export PDF/Excel'],
            'icon_bg'     => 'bg-teal-500/20',
            'icon_color'  => 'text-teal-500',
            'accent_bar'  => 'bg-teal-500',
            'link_color'  => 'text-teal-600 hover:text-teal-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 6,
        ]);

        Service::firstOrCreate(['titre' => 'Conseil & Formation'], [
            'description' => 'Audit informatique, conseil digital, formations WinDev, Flutter et Laravel.',
            'icon_path'   => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
            'items'       => ['Audit informatique', 'Conseil en digitalisation', 'Formation WinDev', 'Formation Flutter', 'Formation Laravel', 'Accompagnement projets'],
            'icon_bg'     => 'bg-yellow-500/20',
            'icon_color'  => 'text-yellow-500',
            'accent_bar'  => 'bg-yellow-500',
            'link_color'  => 'text-yellow-600 hover:text-yellow-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 7,
        ]);

        Service::firstOrCreate(['titre' => 'Maintenance & Support'], [
            'description' => 'Contrats MCO, hotline dédiée, mises à jour et monitoring 24/7.',
            'icon_path'   => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
            'items'       => ['Contrats MCO', 'Hotline dédiée', 'Mises à jour', 'Monitoring 24/7', 'Intervention sur site', 'SLA garanti'],
            'icon_bg'     => 'bg-red-500/20',
            'icon_color'  => 'text-red-500',
            'accent_bar'  => 'bg-red-500',
            'link_color'  => 'text-red-600 hover:text-red-700',
            'href'        => '/services',
            'is_active'   => true,
            'ordre'       => 8,
        ]);
    }
}

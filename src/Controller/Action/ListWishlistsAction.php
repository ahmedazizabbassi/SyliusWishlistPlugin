<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusWishlistPlugin\Controller\Action;

use BitBag\SyliusWishlistPlugin\Context\WishlistContextInterface;
use BitBag\SyliusWishlistPlugin\Entity\WishlistInterface;
use BitBag\SyliusWishlistPlugin\Repository\WishlistRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

final class ListWishlistsAction
{
    private WishlistContextInterface $wishlistContext;

    private WishlistRepositoryInterface $wishlistRepository;

    private EntityManagerInterface $wishlistManager;

    private FlashBagInterface $flashBag;

    private TranslatorInterface $translator;

    private UrlGeneratorInterface $urlGenerator;

    private Environment $twigEnvironment;

    public function __construct(
        WishlistContextInterface $wishlistContext,
        WishlistRepositoryInterface $wishlistRepository,
        EntityManagerInterface $wishlistManager,
        FlashBagInterface $flashBag,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        Environment $twigEnvironment
    ) {
        $this->wishlistContext = $wishlistContext;
        $this->wishlistRepository = $wishlistRepository;
        $this->wishlistManager = $wishlistManager;
        $this->urlGenerator = $urlGenerator;
        $this->flashBag = $flashBag;
        $this->translator = $translator;
        $this->twigEnvironment = $twigEnvironment;
    }

    public function __invoke(Request $request): Response
    {
        /** @var WishlistInterface $wishlists */
        $wishlists = $this->wishlistRepository->findAll();

        return new Response(
            $this->twigEnvironment->render('@BitBagSyliusWishlistPlugin/Wishlist/wishlists.html.twig', [
                'wishlist' => $wishlists,

            ])
        );
    }

}

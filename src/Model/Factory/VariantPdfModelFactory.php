<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusWishlistPlugin\Model\Factory;

use BitBag\SyliusWishlistPlugin\Model\VariantPdfModel;
use BitBag\SyliusWishlistPlugin\Model\VariantPdfModelInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

final class VariantPdfModelFactory implements VariantPdfModelFactoryInterface
{
    public function createWithVariantAndImagePath(
        ProductVariantInterface $variant,
        string $path,
        int $quantity,
        string $actualVariant,
    ): VariantPdfModelInterface {
        $productPdfModel = new VariantPdfModel();

        $productPdfModel->setVariant($variant);
        $productPdfModel->setImagePath($path);
        $productPdfModel->setQuantity($quantity);
        $productPdfModel->setActualVariant($actualVariant);

        return $productPdfModel;
    }
}

<?php

declare(strict_types=1);

/**
 * Please make below code executable
 */
class EcommerceCatalog
{
    private Category $rootCategory;

    public function addRootCategory(Category $rootCategory)
    {
        $this->rootCategory = $rootCategory;
    }
}

class Product
{
    private string $name;
    private int $quantity = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}


class Category
{
    private string $name = '';
    private array $childCategory;
    private array $product;

    public function __construct(string $categoryName)
    {
        $this->name = $categoryName;
    }

    public function addChildCategory(Category $childCategory): void
    {
        $this->childCategory[] = $childCategory;
    }

    public function addProduct(Product $product): void
    {
        $this->product[] = $product;
    }
}

$rootCategory = new Category("root");

$ecommerceCatalog = new EcommerceCatalog();
$ecommerceCatalog->addRootCategory($rootCategory);

$womenCategory = new Category("Women products");
$menCategory = new Category("Men products");

$womenCategory->addChildCategory(new Category("Shoes"));
$womenCategory->addChildCategory(new Category("Handbags"));

$rootCategory->addChildCategory($womenCategory);
$rootCategory->addChildCategory($menCategory);

$product1 = new Product("product1");
$product2 = new Product("product2");
$product3 = new Product("product3");
$product3->addQuantity(3);

$womenCategory->addProduct($product3);

var_dump($ecommerceCatalog);

?>
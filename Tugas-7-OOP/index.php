<?php
require_once('product.php');
require_once('cdMusic.php');
require_once('cdRack.php');

echo "<hr>";
echo "PRODUCT";
echo "<br><br>";

// Product 1
$product1 = new Product();
$product1->setName("Sheila On 7");
$product1->setPrice(500000);
$product1->setDiscount(10);

echo "Nama Produk : " . $product1->getName() . "<br>";
echo "Harga Produk : " . $product1->getPrice() . "<br>";
echo "Diskon : " . $product1->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 2
$product2 = new Product();
$product2->setName("D'Masiv");
$product2->setPrice(600000);
$product2->setDiscount(8);

echo "Nama Produk : " . $product2->getName() . "<br>";
echo "Harga Produk : " . $product2->getPrice() . "<br>";
echo "Diskon : " . $product2->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 3
$product3 = new Product();
$product3->setName("Rak Susun");
$product3->setPrice(150000);
$product3->setDiscount(5);

echo "Nama Produk : " . $product3->getName() . "<br>";
echo "Harga Produk : " . $product3->getPrice() . "<br>";
echo "Diskon : " . $product3->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 4
$product4 = new Product();
$product4->setName("Rak Gantung");
$product4->setPrice(100000);
$product4->setDiscount(5);

echo "Nama Produk : " . $product4->getName() . "<br>";
echo "Harga Produk : " . $product4->getPrice() . "<br>";
echo "Diskon : " . $product4->getDiscount() . "%" . "<br>";
echo "<hr>";

echo "<br>";

//CD Music
echo "<hr>";
echo "CD MUSIC";
echo "<br><br>";

// Music 1
$music1 = new CDMusic();
$music1->setName($product1->getName());
$music1->setPrice($product1->getPrice());
$music1->setDiscount($product1->getDiscount());
$music1->setArtist("Akhdiyat Duta Modjo");
$music1->setGenre("Pop");

echo "Nama Produk : " . $music1->getName() . "<br>";
echo "Harga Produk : " . $music1->getPrice() . "<br>";
echo "Diskon : " . $music1->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music1->getArtist() . "<br>";
echo "Genre Musik : " . $music1->getGenre() . "<br>";
echo "Harga setelah diskon : " . $music1->calculatePrice() . "<br>";

echo "<br>";

// Music 2
$music2 = new CDMusic();
$music2->setName($product2->getName());
$music2->setPrice($product2->getPrice());
$music2->setDiscount($product2->getDiscount());
$music2->setArtist("Rian Ekky Pradipta");
$music2->setGenre("Pop");

echo "Nama Produk : " . $music2->getName() . "<br>";
echo "Harga Produk : " . $music2->getPrice() . "<br>";
echo "Diskon : " . $music2->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music2->getArtist() . "<br>";
echo "Genre Musik : " . $music2->getGenre() . "<br>";
echo "Harga setelah diskon : " . $music2->calculatePrice() . "<br>";


echo "<hr>";
echo "<br>";

// CD Rack
echo "<hr>";
echo "CD RACK";
echo "<br><br>";

// Rack 1
$rack1 = new CDRack();
$rack1->setName($product3->getName());
$rack1->setPrice($product3->getPrice());
$rack1->setDiscount($product3->getDiscount());
$rack1->setCapacity("100");
$rack1->setModel("Susun");

echo "Nama Produk : " . $rack1->getName() . "<br>";
echo "Harga Produk : " . $rack1->getPrice() . "<br>";
echo "Diskon : " . $rack1->getDiscount() . "%" . "<br>";
echo "Kapsitas : " . $rack1->getCapacity() . "<br>";
echo "Model : " . $rack1->getModel() . "<br>";
echo "Harga setelah diskon : " . $rack1->calculatePrice() . "<br>";

echo "<br>";

// Rack 2
$rack2 = new CDRack();
$rack2->setName($product4->getName());
$rack2->setPrice($product4->getPrice());
$rack2->setDiscount($product4->getDiscount());
$rack2->setCapacity("50");
$rack2->setModel("Susun");

echo "Nama Produk : " . $rack2->getName() . "<br>";
echo "Harga Produk : " . $rack2->getPrice() . "<br>";
echo "Diskon : " . $rack2->getDiscount() . "%" . "<br>";
echo "Kapasitas: " . $rack2->getCapacity() . "<br>";
echo "Model : " . $rack2->getModel() . "<br>";
echo "Harga setelah diskon : " . $rack2->calculatePrice() . "<br>";
echo "<hr>";

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product & Person Details</title>
    <?php
    echo "<link rel='stylesheet' href='styles.css'>";
    ?>
</head>

<body>

    <?php
    class Product
    {
        public $name, $price, $description, $category, $stock, $sku, $image, $brand;

        public function productDetails()
        {
            echo "<div class='section'>";
            echo "<h2>Product Details</h2>";
            echo "<table>";
            echo "<tr><th>Name</th><td>$this->name</td></tr>";
            echo "<tr><th>Price</th><td>$$this->price</td></tr>";
            echo "<tr><th>Description</th><td>$this->description</td></tr>";
            echo "<tr><th>Category</th><td>$this->category</td></tr>";
            echo "<tr><th>Stock</th><td>$this->stock</td></tr>";
            echo "<tr><th>SKU</th><td>$this->sku</td></tr>";
            echo "<tr><th>Brand</th><td>$this->brand</td></tr>";
            echo "<tr><th>Image</th><td><img src='$this->image' class='photo' alt='Product Image'></td></tr>";
            echo "</table></div>";
        }
    }

    $product = new Product();
    $product->name = "Samsung Galaxy S24";
    $product->price = 999.99;
    $product->description = "Latest Samsung smartphone with amazing features.";
    $product->category = "Electronics";
    $product->stock = 50;
    $product->sku = "SAMS24-5G-BLK";
    $product->image = "https://www.mobiledokan.com/media/1712310284Wg4L9.webp";
    $product->brand = "Samsung";
    $product->productDetails();

    class Person
    {
        public $name, $age, $gender, $email, $phone, $address, $nationality, $dateOfBirth, $occupation, $photo;

        public function showDetails()
        {
            echo "<div class='section'>";
            echo "<h2>Person Details</h2>";
            echo "<table>";
            echo "<tr><th>Name</th><td>$this->name</td></tr>";
            echo "<tr><th>Age</th><td>$this->age</td></tr>";
            echo "<tr><th>Gender</th><td>$this->gender</td></tr>";
            echo "<tr><th>Email</th><td>$this->email</td></tr>";
            echo "<tr><th>Phone</th><td>$this->phone</td></tr>";
            echo "<tr><th>Address</th><td>$this->address</td></tr>";
            echo "<tr><th>Nationality</th><td>$this->nationality</td></tr>";
            echo "<tr><th>Date of Birth</th><td>$this->dateOfBirth</td></tr>";
            echo "<tr><th>Occupation</th><td>$this->occupation</td></tr>";
            echo "<tr><th>Photo</th><td><img src='$this->photo' class='photo' alt='Person Photo'></td></tr>";
            echo "</table></div>";
        }
    }

    $person = new Person();
    $person->name = "Ibrahim Zadran";
    $person->age = 2;
    $person->gender = "Male";
    $person->email = "ibrahimzadran.info@gmail.com";
    $person->phone = "017xxxxxxxx";
    $person->address = "Dhaka, Bangladesh";
    $person->nationality = "Bangladeshi";
    $person->dateOfBirth = "2025-03-12";
    $person->occupation = "Student";
    $person->photo = "Ibrahim Zadran.jpg";
    $person->showDetails();
    ?>

</body>

</html>
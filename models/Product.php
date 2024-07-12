<?php
// Product.php
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}


function getAllProducts(){
    global $conn;
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
function getProduct($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}


function addProduct($title, $price, $sale, $image, $description, $detail, $category_id) {
    global $conn;
    $sql = "INSERT INTO products(title, price, sale, image, description, detail, category_id) VALUES(:title, :price, :sale, :image, :description, :detail, :category_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':sale', $sale);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':detail', $detail);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    return $conn->lastInsertId();
}


function updateProduct($id, $title, $price, $sale, $image, $description, $detail, $category_id) {
    global $conn;
    $sql = "UPDATE products SET title = :title, price = :price, sale = :sale, image = :image, description = :description, detail = :detail, category_id = :category_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':sale', $sale);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':detail', $detail);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function deleteProduct($id) {
    // Xóa sản phẩm phải xử lý thêm các ràng buộc trong bảng orderdetails
    // Có thể chuyển trạng thái sản phẩm ẩn/ ngừng kinh doanh/ hết hàng thay vì xóa
    global $conn;  
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

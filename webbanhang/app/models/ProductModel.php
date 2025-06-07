<?php
class ProductModel
{
private $conn;
private $table_name = "product";
public function __construct($db)
{
$this->conn = $db;
}
public function getProducts()
{
$query = "SELECT p.id, p.name, p.description, p.price, p.image, c.name as
category_name
FROM " . $this->table_name . " p
LEFT JOIN category c ON p.category_id = c.id";
$stmt = $this->conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
return $result;
}
public function getProductById($id)
{
$query = "SELECT p.*, c.name as category_name
FROM " . $this->table_name . " p
LEFT JOIN category c ON p.category_id = c.id
WHERE p.id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);
return $result;
}
public function addProduct($name, $description, $price, $category_id, $image)
{
$errors = [];
if (empty($name)) {
$errors['name'] = 'Tên sản phẩm không được để trống';
}
if (empty($description)) {
$errors['description'] = 'Mô tả không được để trống';
}
if (!is_numeric($price) || $price < 0) {
$errors['price'] = 'Giá sản phẩm không hợp lệ';
}
if (count($errors) > 0) {
return $errors;
}
$query = "INSERT INTO " . $this->table_name . " (name, description, price,
category_id, image) VALUES (:name, :description, :price, :category_id, :image)";
$stmt = $this->conn->prepare($query);
$name = htmlspecialchars(strip_tags($name));
$description = htmlspecialchars(strip_tags($description));
$price = htmlspecialchars(strip_tags($price));
$category_id = htmlspecialchars(strip_tags($category_id));
$image = htmlspecialchars(strip_tags($image));
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':category_id', $category_id);
$stmt->bindParam(':image', $image);
if ($stmt->execute()) {
return true;
}
return false;
}
public function updateProduct(
$id,
$name,
$description,
$price,
$category_id,
$image
) {
$query = "UPDATE " . $this->table_name . " SET name=:name,
description=:description, price=:price, category_id=:category_id, image=:image WHERE
id=:id";
$stmt = $this->conn->prepare($query);
$name = htmlspecialchars(strip_tags($name));
$description = htmlspecialchars(strip_tags($description));
$price = htmlspecialchars(strip_tags($price));
$category_id = htmlspecialchars(strip_tags($category_id));
$image = htmlspecialchars(strip_tags($image));
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':category_id', $category_id);
$stmt->bindParam(':image', $image);
if ($stmt->execute()) {
return true;
}
return false;
}
public function deleteProduct($id)
{
$query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);
if ($stmt->execute()) {
return true;
}
return false;
}
public function getProductsPaging($search = '', $categoryId = '', $page = 1, $limit = 8)
{
    $offset = ($page - 1) * $limit;
    $params = [];
    $where = " WHERE 1=1 ";

    if (!empty($search)) {
        $where .= " AND p.name LIKE :search ";
        $params[':search'] = "%$search%";
    }
    if (!empty($categoryId)) {
        $where .= " AND p.category_id = :categoryId ";
        $params[':categoryId'] = $categoryId;
    }

    // Đếm tổng sản phẩm phù hợp
    $countSql = "SELECT COUNT(*) FROM " . $this->table_name . " p $where";
    $stmt = $this->conn->prepare($countSql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->execute();
    $total = $stmt->fetchColumn();

    // Lấy danh sách sản phẩm phân trang
    $sql = "SELECT p.id, p.name, p.description, p.price, p.image, c.name as category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
            $where
            ORDER BY p.id DESC
            LIMIT :limit OFFSET :offset";

    $stmt = $this->conn->prepare($sql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_OBJ);

    return ['products' => $products, 'total' => $total];
}

}
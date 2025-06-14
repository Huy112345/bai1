  <?php
  class orderModel
  {
      private $conn;
      private $table_name = "orders";


     public function __construct($db)
      {
          $this->conn = $db;
     }

     public function getOrder($user_id)
     {
         $query = "SELECT
                     o.id AS order_id,
                     o.created_at,
                     o.phone AS order_phone,
                     o.address,
                     o.name,
                     o.phone AS user_phone
                   FROM orders o
                   WHERE o.user_id = :user_id";
     
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
         $stmt->execute();
     
         return $stmt->fetchAll(PDO::FETCH_OBJ);
     }
     

     public function getDetailOrder($order_id)
     {
         $query = "SELECT p.id, p.name,p.description, p.price, p.image FROM order_details dor
                     LEFT JOIN product p ON p.id = dor.product_id
                     WHERE dor.order_id = :order_id";

         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
         $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
     }
 }
?>
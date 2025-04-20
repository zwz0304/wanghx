<?php
// submit.php —— 处理表单提交并保存图片和数据
include 'connect.php';

$ticket  = $_POST['ticket'];
$name    = $_POST['name'];
$rating  = (int)$_POST['rating'];
$comment = $_POST['comment'];

$imagePath = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    $filename   = uniqid() . "_" . basename($_FILES['image']['name']);
    $uploadFile = $uploadDir . $filename;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $imagePath = $uploadFile;
    }
}

$sql = "INSERT INTO feedback (ticket_number, name, rating, comment, image_path)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $ticket, $name, $rating, $comment, $imagePath);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: feedback.php");
exit;
?>

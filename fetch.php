<?php
// fetch.php —— 从数据库读取并输出评论
include 'connect.php';
$result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='review-item'>";
    echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong></p>";
    echo "<p>" . str_repeat("⭐", $row['rating']) . "</p>";
    echo "<p class='review-time'>Reviewed on " . $row['created_at'] . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['comment'])) . "</p>";
    if ($row['image_path']) {
        echo "<img class='review-image' src='" . htmlspecialchars($row['image_path']) . "' alt='Review Image'/>";
    }
    echo "</div>";
}
$conn->close();
?>

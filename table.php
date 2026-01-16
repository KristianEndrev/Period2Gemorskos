<?php
require_once 'dbconnect_inc.php';

$table = 'user';

try {
    $stmt = $dbHandler->query("SELECT * FROM `$table`");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    printError($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Data</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>

<a href="home.php">← Back</a>

<h1>Table: <?= htmlspecialchars($table) ?></h1>

<?php if (empty($rows)): ?>
    <p>No data found.</p>
<?php else: ?>
<table>
    <tr>
        <?php foreach (array_keys($rows[0]) as $column): ?>
            <th><?= htmlspecialchars($column) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($rows as $row): ?>
        <tr>
            <?php foreach ($row as $value): ?>
                <td><?= htmlspecialchars((string)$value) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

</body>
</html>

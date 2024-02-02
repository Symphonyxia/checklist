<?php
include 'header.php';
include 'sidebar.php';

// Query the latest checklist_id
$getLatestChecklistIdStmt = $pdo->query('SELECT MAX(checklist_id) AS latest_id FROM checklist');
$latestChecklistId = $getLatestChecklistIdStmt->fetchColumn();

// Fetch the year for the very latest checklist_id
$getYearStmt = $pdo->prepare('SELECT year FROM checklist WHERE checklist_id = :latestChecklistId');
$getYearStmt->bindParam(':latestChecklistId', $latestChecklistId, PDO::PARAM_INT);
$getYearStmt->execute();
$year = $getYearStmt->fetchColumn();

// Fetch content for the very latest checklist_id
$getYearContentStmt = $pdo->prepare('
    SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
    FROM checklist c
    JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
    JOIN questions q ON cr.questions_id = q.questions_id
    WHERE c.checklist_id = :latestChecklistId
');
$getYearContentStmt->bindParam(':latestChecklistId', $latestChecklistId, PDO::PARAM_INT);
$getYearContentStmt->execute();
$yearContent = $getYearContentStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<article class="my-article">
    <?php if (!empty($yearContent)) : ?>
        <div>
            <form method="post" action="">
                <br>
                <h5><strong>Form for <?php echo $year; ?></strong></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Result Yes</th>
                            <th>Result No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $currentGroup = null;
                        foreach ($yearContent as $content) {
                            if ($currentGroup !== $content['group']) {
                                echo '<tr><td colspan="3"><strong>' . htmlspecialchars($content['group']) . '</strong></td></tr>';
                                $currentGroup = $content['group'];
                            }
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($content['display_text']); ?></td>
                                <td><?php echo htmlspecialchars($content['result_yes'] === 'Yes' ? 'Yes' : 'No'); ?></td>
                                <td><?php echo htmlspecialchars($content['result_no'] === 'Yes' ? 'Yes' : 'No'); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
            </form>
            <br>
        </div>
    <?php else : ?>
        <p>No data available for the latest checklist.</p>
    <?php endif; ?>
</article>

<?php include 'footer.php'; ?>

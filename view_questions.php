<?php
include 'header.php';
include 'sidebar.php';


$itemsPerPage = 1;

$currentChecklistPage = isset($_GET['checklist_page']) ? (int)$_GET['checklist_page'] : 1;

$offset = ($currentChecklistPage - 1) * $itemsPerPage;

$getTotalDistinctChecklistIdsStmt = $pdo->query('SELECT COUNT(DISTINCT checklist_id) FROM checklist');
$totalDistinctChecklistIds = $getTotalDistinctChecklistIdsStmt->fetchColumn();

$getDistinctChecklistIdsStmt = $pdo->prepare('SELECT DISTINCT checklist_id FROM checklist ORDER BY checklist_id LIMIT :offset, :itemsPerPage');
$getDistinctChecklistIdsStmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$getDistinctChecklistIdsStmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$getDistinctChecklistIdsStmt->execute();
$distinctChecklistIds = $getDistinctChecklistIdsStmt->fetchAll(PDO::FETCH_COLUMN);

$totalChecklistPages = ceil($totalDistinctChecklistIds / $itemsPerPage);
?>

<article class="my-article">
    <?php foreach ($distinctChecklistIds as $checklistId) : ?>
        <div>
            <?php
            $getChecklistContentStmt = $pdo->prepare('
                SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no, c.year
                FROM checklist_result cr
                JOIN questions q ON cr.questions_id = q.questions_id
                JOIN checklist c ON cr.checklist_id = c.checklist_id
                WHERE cr.checklist_id = :checklistId
            ');
            $getChecklistContentStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);
            $getChecklistContentStmt->execute();
            $checklistContent = $getChecklistContentStmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <form method="post" action="">
                <?php if (!empty($checklistContent)) : ?>
                    <h5><strong>Form for <?php echo htmlspecialchars($checklistContent[0]['year']); ?></strong></h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Yes</th>
                                <th>No</th>
                                <th>Max Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $currentGroup = null;
                            foreach ($checklistContent as $content) {
                                if ($currentGroup !== $content['group']) {
                                    echo '<tr><td colspan="5"><strong>' . htmlspecialchars($content['group']) . '</strong></td></tr>';
                                    $currentGroup = $content['group'];
                                }
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($content['display_text']); ?></td>
                                    <td class="checkbox1">
                                        <input type="checkbox" name="result_yes" disabled>
                                    </td>
                                    <td class="checkbox2">
                                        <input type="checkbox" name="result_no" disabled>
                                    </td>
                                    <td><?php echo htmlspecialchars($content['max_points']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No data available for this checklist ID.</p>
                <?php endif; ?>
            </form>
            <br>
        </div>
    <?php endforeach; ?>



<div class="pagination-container">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $totalChecklistPages; $i++) : ?>
            <li><a class="<?php echo ($i === $currentChecklistPage) ? 'active' : ''; ?>" href="?checklist_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
    </ul>
</div>

</article>

<?php include 'footer.php'; ?>

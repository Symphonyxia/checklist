<?php
include 'header.php';
include 'sidebar.php';

$itemsPerPage = 1;

$currentChecklistPage = isset($_GET['checklist_page']) ? (int)$_GET['checklist_page'] : 1;

$offset = ($currentChecklistPage - 1) * $itemsPerPage;

$getTotalDistinctChecklistIdsStmt = $pdo->query('SELECT COUNT(DISTINCT checklist_id) FROM checklist');
$totalDistinctChecklistIds = $getTotalDistinctChecklistIdsStmt->fetchColumn();

$totalChecklistPages = ceil($totalDistinctChecklistIds / $itemsPerPage);

$getDistinctChecklistIdsStmt = $pdo->prepare('SELECT DISTINCT checklist_id FROM checklist ORDER BY checklist_id LIMIT :offset, :itemsPerPage');
$getDistinctChecklistIdsStmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$getDistinctChecklistIdsStmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$getDistinctChecklistIdsStmt->execute();
$distinctChecklistIds = $getDistinctChecklistIdsStmt->fetchAll(PDO::FETCH_COLUMN);
?>

<article class="my-article">
    <?php foreach ($distinctChecklistIds as $checklistId) : ?>
        <div>
            <?php
            $getChecklistYearStmt = $pdo->prepare('SELECT year FROM checklist WHERE checklist_id = :checklistId');
            $getChecklistYearStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);
            $getChecklistYearStmt->execute();
            $checklistYear = $getChecklistYearStmt->fetchColumn();
            
            $getChecklistContentStmt = $pdo->prepare('
                SELECT q.`group`, q.display_text, q.max_points
                FROM checklist_result cr
                JOIN questions q ON cr.questions_id = q.questions_id
                WHERE cr.checklist_id = :checklistId
                ORDER BY q.`group` ASC
            ');
            $getChecklistContentStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);
            $getChecklistContentStmt->execute();
            $checklistContent = $getChecklistContentStmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <form method="post" action="">
                <?php if (!empty($checklistContent)) : ?>
                    <h5><strong>Form for <?php echo htmlspecialchars($checklistYear); ?></strong></h5>
                    <?php
                    $currentGroup = null;
                    foreach ($checklistContent as $content) {
                        if ($currentGroup !== $content['group']) {
                            if ($currentGroup !== null) {
                                echo '</tbody></table>'; 
                            }
                            echo '<table class="table table-bordered">';
                            echo '<thead><tr><th colspan="4"><strong>' . htmlspecialchars($content['group']) . '</strong></th></tr></thead>';
                            echo '<tbody>';
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
                        <?php
                    }
                    echo '</tbody></table>'; 
                    ?>
                <?php else : ?>
                    <p style="font-weight: bold; text-align: center;">No Data Available.</p>
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

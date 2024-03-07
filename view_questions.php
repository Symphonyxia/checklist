<?php
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch checklist_id from the URL parameter
$checklistId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($checklistId) {
    // Fetch checklist year
    $getChecklistYearStmt = $pdo->prepare('SELECT year FROM checklist WHERE checklist_id = :checklistId');
    $getChecklistYearStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);
    $getChecklistYearStmt->execute();
    $checklistYear = $getChecklistYearStmt->fetchColumn();

    // Fetch questions associated with the checklist_id from the checklist_result table
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

<div class="container">
    <article class="my-article">
        <div>
            <?php if (!empty($checklistContent)) : ?>
                <h5 style = "color: black;"><strong>Form for <?php echo htmlspecialchars($checklistYear); ?></strong></h5>
                <br>
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
        </div>
    </article>
    </div>
    
<?php
} else {
    // Handle case when checklist_id is not provided
    echo "Checklist ID not provided.";
}
?>
<?php
include 'includes/scripts.php';
include 'includes/footer.php';
 ?>

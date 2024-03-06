<?php
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch checklist_id from the URL parameter
$checklistId = isset($_GET['checklist_id']) ? (int)$_GET['checklist_id'] : null;

if ($checklistId) {
    // Fetch checklist year
    $getYearStmt = $pdo->prepare('SELECT year FROM checklist WHERE checklist_id = :checklistId');
    $getYearStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);

    if ($getYearStmt->execute()) {
        $year = $getYearStmt->fetchColumn();

        // Fetch questions associated with the checklist_id from the checklist_result table
        $getYearContentStmt = $pdo->prepare('
            SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
            FROM checklist_result cr
            JOIN questions q ON cr.questions_id = q.questions_id
            WHERE cr.checklist_id = :checklistId
        ');
        $getYearContentStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);

        if ($getYearContentStmt->execute()) {
            $yearContent = $getYearContentStmt->fetchAll(PDO::FETCH_ASSOC);

            $groupedQuestions = [];
            foreach ($yearContent as $content) {
                $groupedQuestions[$content['group']][] = $content;
            }

            // Calculate total points
            $getMaxPointsStmt = $pdo->prepare('
                SELECT cr.questions_id, q.max_points
                FROM checklist_result cr
                JOIN questions q ON cr.questions_id = q.questions_id
                WHERE cr.checklist_id = :checklistId AND cr.result_yes = \'Yes\'
            ');
            $getMaxPointsStmt->bindParam(':checklistId', $checklistId, PDO::PARAM_INT);

            if ($getMaxPointsStmt->execute()) {
                $maxPointsResults = $getMaxPointsStmt->fetchAll(PDO::FETCH_ASSOC);

                $sumMaxPoints = array_sum(array_column($maxPointsResults, 'max_points'));

                // Calculate grade based on total points
                $grade = '';
                if ($sumMaxPoints >= 0 && $sumMaxPoints <= 40) {
                    $grade = 'Non-existent';
                } elseif ($sumMaxPoints >= 41 && $sumMaxPoints <= 50) {
                    $grade = 'Defective';
                } elseif ($sumMaxPoints >= 51 && $sumMaxPoints <= 60) {
                    $grade = 'Non-operational';
                } elseif ($sumMaxPoints >= 61 && $sumMaxPoints <= 70) {
                    $grade = 'Weak';
                } elseif ($sumMaxPoints >= 71 && $sumMaxPoints <= 80) {
                    $grade = 'Good';
                } elseif ($sumMaxPoints >= 81 && $sumMaxPoints <= 90) {
                    $grade = 'Very Good';
                } elseif ($sumMaxPoints >= 91 && $sumMaxPoints <= 100) {
                    $grade = 'Excellent';
                }
            } else {
                echo "Error fetching maximum points.";
            }
        } else {
            echo "Error fetching checklist content.";
        }
    } else {
        $errorInfo = $getYearStmt->errorInfo();
        echo "Error fetching year: {$errorInfo[2]}<br>";
    }
    ?>

    <article class="my-article">
        <?php if (!empty($groupedQuestions)): ?>
            <div>
                <form method="post" action="">
                    <h5 style="color: black;"><strong>Form for <?php echo $year; ?></strong></h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Result Yes</th>
                            <th>Result No</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($groupedQuestions as $group => $questions): ?>
                            <tr>
                                <td colspan="3"><strong><?php echo htmlspecialchars($group); ?></strong></td>
                            </tr>
                            <?php foreach ($questions as $content): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($content['display_text']); ?></td>
                                    <td><?php echo ($content['result_yes'] === '0' || $content['result_yes'] === 'No') ? '' : 'Yes'; ?></td>
                                    <td><?php echo ($content['result_no'] === '0' || $content['result_no'] === 'No') ? '' : 'No'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td><strong>TOTAL POINT SCORE: </strong></td>
                            <td><strong><?php echo $sumMaxPoints; ?></strong></td>
                            <td colspan="2"><strong><?php echo $grade; ?></strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </form>
                <br>
            </div>
        <?php else: ?>
            <p style="font-weight: bold; text-align: center;">No data available for the selected checklist.</p>
        <?php endif; ?>
    </article>

<?php
} else {
    // Handle case when checklist_id is not provided
    echo "Checklist ID not provided.";
}

include 'includes/scripts.php';
include 'includes/footer.php';
?>

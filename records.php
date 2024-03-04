<?php
include 'header.php';
include 'sidebar.php';

$getLatestChecklistIdStmt = $pdo->query('SELECT MAX(checklist_id) AS latest_id FROM checklist');
$latestChecklistId = $getLatestChecklistIdStmt->fetchColumn();

$getYearStmt = $pdo->prepare('SELECT year FROM checklist WHERE checklist_id = :latestChecklistId');
$getYearStmt->bindParam(':latestChecklistId', $latestChecklistId, PDO::PARAM_INT);

if (!$getYearStmt->execute()) {
    $errorInfo = $getYearStmt->errorInfo();
    echo "Error fetching year: {$errorInfo[2]}<br>";
}

$year = $getYearStmt->fetchColumn();

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

$groupedQuestions = [];
foreach ($yearContent as $content) {
    $groupedQuestions[$content['group']][] = $content;
}

$getMaxPointsStmt = $pdo->prepare('
    SELECT cr.questions_id, q.max_points
    FROM checklist_result cr
    JOIN questions q ON cr.questions_id = q.questions_id
    WHERE cr.checklist_id = :latestChecklistId AND cr.result_yes = \'Yes\'
');
$getMaxPointsStmt->bindParam(':latestChecklistId', $latestChecklistId, PDO::PARAM_INT);

if ($getMaxPointsStmt->execute()) {
    $maxPointsResults = $getMaxPointsStmt->fetchAll(PDO::FETCH_ASSOC);

    $sumMaxPoints = array_sum(array_column($maxPointsResults, 'max_points'));

    foreach ($maxPointsResults as $result) {
        $questionId = $result['questions_id'];
        $maxPoints = $result['max_points'];
    }


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
    $errorInfo = $getMaxPointsStmt->errorInfo();
}

?>


<article class="my-article">
    <?php if (!empty($groupedQuestions)) : ?>
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
                        <?php foreach ($groupedQuestions as $group => $questions) : ?>
                            <tr>
                                <td colspan="3"><strong><?php echo htmlspecialchars($group); ?></strong></td>
                            </tr>
                            <?php foreach ($questions as $content) : ?>
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
                            <td colspan="2"><strong><?php echo $grade; ?> </strong></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </form>
            <br>
        </div>
    <?php else : ?>
        <p style="font-weight: bold; text-align: center;">No data available for the latest checklist.</p>
    <?php endif; ?>
</article>

<?php include 'footer.php'; ?>

<?php
include 'header.php';
include 'sidebar.php';

// Query all distinct years
$getDistinctYearsStmt = $pdo->prepare('SELECT DISTINCT c.year FROM checklist c JOIN checklist_result cr ON c.checklist_id = cr.checklist_id');
$getDistinctYearsStmt->execute();
$distinctYears = $getDistinctYearsStmt->fetchAll(PDO::FETCH_COLUMN);

// Rating scheme thresholds
$ratingScheme = array(
    "Excellent" => array(91, 100),
    "Very Good" => array(81, 90),
    "Good" => array(71, 80),
    "Weak" => array(61, 70),
    "Non-operational" => array(51, 60),
    "Defective" => array(41, 50),
    "Non-existent" => array(0, 40)
);

?>

<article class="my-article">

    <?php foreach ($distinctYears as $year) : ?>
        <div>
            <?php
            // Fetch content for each year
            $getYearContentStmt = $pdo->prepare('
                SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
                FROM checklist c
                JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
                JOIN questions q ON cr.questions_id = q.questions_id
                WHERE c.year = :year
            ');
            $getYearContentStmt->execute(['year' => $year]);
            $yearContent = $getYearContentStmt->fetchAll(PDO::FETCH_ASSOC);

            // Calculate total points and rating
            $totalPoints = 0;
            foreach ($yearContent as $content) {
                $totalPoints += $content['result_yes'];
            }

            // Determine rating
            $rating = '';
            foreach ($ratingScheme as $key => $value) {
                if ($totalPoints >= $value[0] && $totalPoints <= $value[1]) {
                    $rating = $key;
                    break;
                }
            }
            ?>

            <form method="post" action="">
                <br>
                <h3><strong>Year <?php echo $year; ?></strong></h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Result Yes</th>
                            <th>Result No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($yearContent)) : ?>
                            <?php
                            $currentGroup = null;
                            foreach ($yearContent as $content) {
                                if ($currentGroup !== $content['group']) {
                                    echo '<tr><td colspan="5"><strong>' . htmlspecialchars($content['group']) . '</strong></td></tr>';
                                    $currentGroup = $content['group'];
                                }
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($content['display_text']); ?></td>
                                    <td><?php echo htmlspecialchars($content['result_yes']); ?></td>
                                    <td><?php echo htmlspecialchars($content['result_no']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">No data available for this year.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br>
                <p><strong>Total Point Score: <?php echo $totalPoints; ?></strong></p>
                <p><strong>Rating: <?php echo $rating; ?></strong></p>
                <br>
            </form>
            <br>
        </div>
    <?php endforeach; ?>

</article>

<?php include 'footer.php'; ?>

<?php
include 'header.php';
include 'sidebar.php';

// Query all distinct years
$getDistinctYearsStmt = $pdo->prepare('SELECT DISTINCT c.year FROM checklist c JOIN checklist_result cr ON c.checklist_id = cr.checklist_id');
$getDistinctYearsStmt->execute();
$distinctYears = $getDistinctYearsStmt->fetchAll(PDO::FETCH_COLUMN);

?>

<article class="my-article">


    <?php foreach ($distinctYears as $year) : ?>
        <button type="button" class="accordion">Year <?php echo $year; ?></button>
        <div class="panel">
            <?php
            // Fetch accordion content for each year
            $getAccordionContentStmt = $pdo->prepare('
                SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
                FROM checklist c
                JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
                JOIN questions q ON cr.questions_id = q.questions_id
                WHERE c.year = :year
            ');
            $getAccordionContentStmt->execute(['year' => $year]);
            $accordionContent = $getAccordionContentStmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <form method="post" action="">
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Result Yes</th>
                            <th>Result No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accordionContent)) : ?>
                            <?php
                            $currentGroup = null;
                            foreach ($accordionContent as $content) {
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
            </form>
            <br>
        </div>
    <?php endforeach; ?>

</article>

<?php include 'footer.php'; ?>
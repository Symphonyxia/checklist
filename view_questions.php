<?php
include 'header.php';
include 'sidebar.php';

$getDistinctYearsStmt = $pdo->prepare('SELECT DISTINCT c.year FROM checklist c JOIN checklist_result cr ON c.checklist_id = cr.checklist_id');
$getDistinctYearsStmt->execute();
$distinctYears = $getDistinctYearsStmt->fetchAll(PDO::FETCH_COLUMN);
?>

<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">

            <?php foreach ($distinctYears as $year) : ?>
    <button type="button" class="accordion">Year <?php echo $year; ?></button>
    <div class="panel">
        <?php
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

        <form method="post" action="" >
            <table class="table table-bordered">    
                <thead>
                    <tr>
                        <th></th>
                        <th>Result Yes</th>
                        <th>Result No</th>
                        <th>Max Points</th>
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
                                <td class="checkbox1">
                                    <input type="checkbox" name="result_yes" disabled>
                                </td>
                                <td class="checkbox2">
                                <input type="checkbox" name="result_no" disabled>
                                </td>
                                <td><?php echo htmlspecialchars($content['max_points']); ?></td>

                            </tr>
                        <?php } ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No data available for this year.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
        <br>
    </div>
<?php endforeach; ?>


        </div>
    </div>
</article>

<?php include 'footer.php'; ?>

<div class="container">
    <h5>Checks for url <a href="<?= $checkingUrl->url ?>" 
                          target="_blank" rel="noopener noreferrer"><?= $checkingUrl->url ?></a></h5>
    Max attempts: <?= $checkingUrl->retries_number ?><br>
    Check interval: <?= $checkingUrl->check_interval ?> min<br><br>

    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>
                    Check date
                </th>
                <th>
                    Time
                </th>
                <th>
                    Status code
                </th>
                <th>
                    Attempt
                </th>
            </tr>

            <?php foreach ($checks as $check) : ?>
            <?php if ($check->status_code < 200 || $check->status_code > 399) : ?>
                    <tr style="color: red">
                    <?php else : ?>
                    <tr>
                    <?php endif; ?>
                    <td>
                        <?= date_format(new \DateTime($check->check_date), 'd.m.Y') ?>
                    </td>
                    <td>
                        <?= $check->check_time ?>
                    </td>
                    <td>
                        <?= $check->status_code ?>
                    </td>
                    <td>
                        <?= $check->attempt_number ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
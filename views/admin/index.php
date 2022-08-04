<div class="container">
    <h3>Urls for check</h3>

    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>
                    URL
                </th>
                <th>
                    Check interval
                </th>
                <th>
                    Retries
                </th>
                <th>
                    Creation date
                </th>
                <th></th>
            </tr>
            <?php foreach ($checkingUrls as $checkingUrl) : ?>
                <tr>
                    <td>
                        <?= $checkingUrl->url ?>
                    </td>
                    <td>
                        <?= $checkingUrl->check_interval ?> min
                    </td>
                    <td>
                        <?= $checkingUrl->retries_number ?>
                    </td>
                    <td>
                        <?= date_format(new \DateTime($checkingUrl->creation_date), 'd.m.Y') ?>
                    </td>
                    <td>
                        <a href="/admin/checks/<?= $checkingUrl->id ?>">Show checks</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
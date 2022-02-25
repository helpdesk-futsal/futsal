<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mt-5 mb-4 text-center"><?= $title ?></h3>
    <h4 class="text-center"><?= $team[0]['team'] ?></h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Member name</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($team as $t): ?>
        <tr>
                <td style="width: 50px;"><?= $count++ ?></td>
                <td><?= ucfirst($t['name']) ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('/exit-team') ?>">Exit team</a>
</div>
<?= $this->endSection(); ?>

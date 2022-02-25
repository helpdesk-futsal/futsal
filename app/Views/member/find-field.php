<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mt-5 mb-4 text-center"><?= $title ?></h3>
    <div class="row">
        <?php foreach ($field as $f): ?>
            <div class="col-lg-4 col-6">
                <a href="<?= base_url('field/'.$f['field_id']);?>">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('/assets/img/field/'.$f['field_image']); ?>" alt="..." width="100%">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $f['field_name']?></h5>
                                    <p class="card-text"><?= $f['address'].', '
                                        .getAddress($f['subdistrict']).', '
                                        .getAddress($f['district']).', '
                                        .getAddress($f['city']).', '
                                        .getAddress($f['province'])?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->extend('template/navbar'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/album.css"   />


<?php foreach ($foto as $f) : ?>
 
    <div class="container2">
            <div class="card2">
            <div class="card2">
                <img src="/image_storage/<?= $f['foto']; ?>" alt="">
            </div>
    </div>
    <?php endforeach; ?>
 




<?= $this->endSection(); ?>
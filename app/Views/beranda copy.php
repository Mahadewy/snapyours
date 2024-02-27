<?= $this->extend('template/navbar'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/album.css"   />

<div class="flex-container">
    <div class="container">
        <div class="card">
            <img src="<?= base_url(); ?>/image/pemandangan.jpg" alt="">
            <h2>Pemandangan Alam</h2>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <img src="<?= base_url(); ?>/image/hewan.jpg" alt="">
            <h2>Hewan/satwa</h2>
        </div>
    </div>


    <div class="container">
        <div class="card">
            <img src="<?= base_url(); ?>/image/makanan.jpg" alt="">
            <h2>Makanan</h2>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <img src="<?= base_url(); ?>/image/outfit.jpg" alt="">
            <h2>Outfit</h2>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <img src="<?= base_url(); ?>/image/senirupa.jpg" alt="">
            <h2>Seni rupa</h2>
        </div>
    </div>

</div>

<div class="flex-container">
<?php foreach ($foto as $f) : ?>
 
    <div class="container">
            <div class="card">
                <img src="/image_storage/<?= $f['foto']; ?>" alt="">
            </div>
    </div>
    <?php endforeach; ?>
 
</div>



<?= $this->endSection(); ?>
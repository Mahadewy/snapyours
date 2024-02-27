<?= $this->extend('template/navbar_beranda'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/album.css"   />

<div class="gridds">
    <?php foreach ($foto as $f) : ?>
        <div class="box">
            <a href="/galeri/<?= $f['foto_id'] ?>">
                <img src="/image_storage/<?= $f['foto']; ?>" alt="">
            </a>
        </div>
    <?php endforeach; ?>
</div>

<script src="/js/onclick.js"></script>


<?= $this->endSection(); ?>
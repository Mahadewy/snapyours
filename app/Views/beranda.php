<?= $this->extend('template/navbar_beranda'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/album.css"   />


<div class="container">
    <div class="flex-container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="<?= base_url(); ?>/image/pemandangan.jpg" alt="" onclick="redirectToPage('/1')" >
                    <h2>Pemandangan Alam</h2>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="<?= base_url(); ?>/image/hewan.jpg" alt="" onclick="redirectToPage('/2')">
                    <h2>Hewan/satwa</h2>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="<?= base_url(); ?>/image/makanan.jpg" alt="" onclick="redirectToPage('/3')">
                    <h2>Makanan</h2>
                </div>
            </div>
        </div>



        <div class="flex-container mt-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="<?= base_url(); ?>/image/outfit.jpg" alt="" onclick="redirectToPage('/4')">
                        <h2>Outfit</h2>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="<?= base_url(); ?>/image/senirupa.jpg" alt="" onclick="redirectToPage('/5')">
                        <h2>Seni Rupa</h2>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="<?= base_url(); ?>/image/nails.jpg" alt="" onclick="redirectToPage('/6')">
                        <h2>Nails</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

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
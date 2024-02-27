<?= $this->extend('template/navbar_beranda');?>
<?= $this->section('content');?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/profile.css" />

<div class="wrapper">
    <div class="img-wrapper">
        <div class="img-circle-wrapper">
            <img src="/image_storage/<?= $user['foto'] ?>" class=""  margin-left ="300px"; width="220px";>
        </div>
    </div>
    <h2 class="title"><?= $user['nama_lengkap'] ?></h2>
    <h3 class="username">@<?= $user['username'] ?></h3>
    <a href="/editprofile/<?= $user['user_id'] ?>">
    <button type="button" class="editprofile">Edit Profile</button>
    </a>
</div>

<?= $this->endSection();?>
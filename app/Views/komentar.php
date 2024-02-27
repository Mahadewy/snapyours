<?= $this->extend('template/navbar_upload'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/komentar.css">

<?php
$date = $foto['tanggal_unggah'];
$date = date("d M Y", strtotime($date));
?>


<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<div class="container">
    <div class="detail">
        <div class="detail-post">
            <div class="user-image">
                <img src="/image_storage/<?= $foto['foto']; ?>" alt="">
            </div>
        </div>


        <div class="comment-detail">
            <div class="cont-sessionmme">
                <div class="list">
                    <div class="user">
                        <p class="m-b-13" style="font-size:18px;">Komentar</p>
                        <div class="post-comment">
                            <div class="list">
                                <div class="user">
                                    <div class="user-meta">
                                        <img src="/image_storage/<?= $user['foto']; ?>" alt="image">
                                        <div class="dtl">
                                            <div class="name"><?= $user['username']; ?></div>
                                            <div class="day"><?= $date ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-post"><?= $foto['deskripsi_foto']; ?></div>
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/editpostingan/<?= $foto['foto_id']; ?>">Edit Postingan</a></li>
                                    <li><a class="dropdown-item" href="/delete/<?= $foto['foto_id']; ?>">Hapus Postingan</a></li>
                                </ul>
                            </div>
                        </div>

                        <?php if ($liked) : ?>
                            <a href="/unlike/<?= $foto['foto_id'] ?>" class="like" style="text-decoration:none; color:black;">
                                <i class="fa-solid fa-heart fa-xl" style="color: #ff0000; width: 20px; height:20px; margin-bottom:3px;"></i>
                                <p style="text-decoration:none;"><?= $jumlahLike ?> suka</p>
                            </a>
                        <?php else : ?>
                            <a href="/like/<?= $foto['foto_id'] ?>" class="like" style="text-decoration:none; color:black;">
                                <i class="fa-regular fa-heart fa-xl" style="width: 20px; height:20px; margin-bottom:3px"></i>
                                <p><?= $jumlahLike ?> suka</p>
                            </a>
                        
                        <?php endif; ?>



                        <?php foreach ($komen as $k) : ?>
                            <div class="komentar">
                                <?php foreach ($user_comment as $uc) :  if ($k['user_id'] == $uc['user_id']) : ?>
                                        <img class="" src="/image_storage/<?= $uc['foto']; ?>" alt="user_id" style="width: 30px; height: 30px; border-radius:100%;">
                                        <div class="detail_komentar" style="margin-left: 20px;">
                                            <p style="font-size: 13px;"><b><?= $uc['username'] ?></b>&nbsp; &nbsp; <?= $k['isi_komentar'] ?></p>
                                            <p style="font-size: 10px; margin-top:-12px;"><?= $k['tanggal_komentar'] ?></p>
                                        </div>
                                <?php endif;
                                endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="comment-box">
                <form action="/komentar-save/<?= $foto['foto_id']; ?>" method="post">
                    <textarea placeholder="Your Massage" name="isi_komentar"></textarea> <br>
                    <button class="comment submit">Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
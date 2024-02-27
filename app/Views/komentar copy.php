<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/komentar.css">
</head>

<body>
    <div class="container">
        <div class="card">


            <div class="detail-post">
                <div class="user-image">
                    <img src="/image_storage/<?= $foto['foto']; ?>" alt="">
                </div>
            </div>
            <div class="comment-detail">
                <div class="comment-session">
                    <div class="list">
                        <div class="user">
                            <p class="m-b-13" style="font-size:18px;">Komentar</p>
                            <div class="post-comment">
                                <div class="list">
                                    <div class="user">
                                        <div class="user-meta">
                                            <div class="name">Mark</div>
                                            <div class="day">10 days ago</div>
                                        </div>
                                    </div>
                                    <div class="comment-post">Wow, this is amazing!</div>
                                </div>
                            </div>
                            <?php foreach ($komen as $k) : ?>
                                <div class="komentar">
                                    <?php foreach ($user_comment as $uc) :  if ($k['user_id'] == $uc['user_id']) : ?>
                                            <img src="/profil_storage/<?= $uc['foto']; ?>" alt="foto_user">
                                            <div class="detail_komentar">
                                                <p style="font-size: 13px;"><b><?= $uc['username'] ?></b>&nbsp; &nbsp; <?= $k['isi_komentar'] ?></p>
                                                <p style="font-size: 10px;"><?= $k['tanggal_komentar'] ?></p>
                                            </div>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="comment-box">
                    <div class="user">
                        <div class="image"><img src="/image/mark.jpg" alt="image"></div>
                        <div class="name">Mark</div>
                    </div>
                    <form action="" method="post">
                        <textarea name="comment" placeholder="Your Massage"></textarea>
                        <button class="comment submit">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
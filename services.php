<?php
require_once __DIR__.'/config.php'; $title='Services – Didi Online'; include __DIR__.'/includes/header.php';
$items=db()->query("SELECT * FROM services WHERE active=1 ORDER BY id DESC")->fetchAll(); ?>
<section class="section"><div class="container"><h1>All Services</h1><div class="grid"><?php foreach($items as $s): ?><article class="card"><?php if($s['image']): ?><img src="<?=e($s['image'])?>" alt="<?=e($s['title'])?>"><?php endif; ?><h3><?=e($s['title'])?></h3><p><?=nl2br(e($s['description']))?></p><div class="price"><?=e($s['price'])?></div><a class="btn" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('Service enquiry: '.$s['title'])?>">Enquiry on WhatsApp</a></article><?php endforeach; ?></div></div></section>
<?php include __DIR__.'/includes/footer.php'; ?>

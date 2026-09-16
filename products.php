<?php
require_once __DIR__.'/config.php'; $title='Products – Didi Online'; include __DIR__.'/includes/header.php';
$items=db()->query("SELECT * FROM products WHERE active=1 ORDER BY id DESC")->fetchAll(); ?>
<section class="section"><div class="container"><h1>Products</h1><div class="grid"><?php foreach($items as $p): ?><article class="card"><?php if($p['image']): ?><img src="<?=e($p['image'])?>" alt="<?=e($p['title'])?>"><?php endif; ?><h3><?=e($p['title'])?></h3><p><?=nl2br(e($p['description']))?></p><div class="price">₹<?=number_format((float)$p['price'],2)?></div><a class="btn" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('Product order enquiry: '.$p['title'])?>">Order on WhatsApp</a></article><?php endforeach; ?></div></div></section>
<?php include __DIR__.'/includes/footer.php'; ?>

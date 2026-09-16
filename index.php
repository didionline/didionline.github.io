<?php
require_once __DIR__.'/config.php';
$services = db()->query("SELECT * FROM services WHERE active=1 ORDER BY id DESC LIMIT 6")->fetchAll();
$products = db()->query("SELECT * FROM products WHERE active=1 ORDER BY id DESC LIMIT 6")->fetchAll();
$title='Didi Online';
include __DIR__.'/includes/header.php';
?>
<section class="hero"><div class="container"><h1>Didi Online</h1><p>आपकी जरूरत की Digital Services और Products — एक ही जगह।</p>
<a class="btn" href="services.php">Services देखें</a> <a class="btn secondary" href="products.php">Products देखें</a></div></section>
<section class="section"><div class="container"><h2>हमारी Services</h2><div class="grid">
<?php foreach($services as $s): ?><article class="card"><?php if($s['image']): ?><img src="<?=e($s['image'])?>" alt="<?=e($s['title'])?>"><?php endif; ?><h3><?=e($s['title'])?></h3><p class="muted"><?=e($s['description'])?></p><div class="price"><?=e($s['price'])?></div><a class="btn small" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('मुझे '.$s['title'].' service चाहिए।')?>">WhatsApp</a></article><?php endforeach; ?>
</div></div></section>
<section class="section"><div class="container"><h2>Featured Products</h2><div class="grid">
<?php foreach($products as $p): ?><article class="card"><?php if($p['image']): ?><img src="<?=e($p['image'])?>" alt="<?=e($p['title'])?>"><?php endif; ?><h3><?=e($p['title'])?></h3><p class="muted"><?=e($p['description'])?></p><div class="price">₹<?=number_format((float)$p['price'],2)?></div><a class="btn small" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('मुझे '.$p['title'].' चाहिए।')?>">Order on WhatsApp</a></article><?php endforeach; ?>
</div></div></section>
<?php include __DIR__.'/includes/footer.php'; ?>

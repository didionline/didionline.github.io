<?php
require_once __DIR__.'/config.php';
$services = db()->query("SELECT * FROM services WHERE active=1 ORDER BY id DESC LIMIT 8")->fetchAll();
$products = db()->query("SELECT * FROM products WHERE active=1 ORDER BY id DESC LIMIT 8")->fetchAll();
$title='Didi Online | Digital Services & Products';
include __DIR__.'/includes/header.php';
?>
<section class="hero"><div class="container hero-inner">
<div class="hero-copy"><span class="badge">DIDI ONLINE</span><h1>आपकी हर Online Service,<br><strong>एक ही जगह।</strong></h1>
<p>Driving Licence, Banking, Government & Digital Services और उपयोगी Products — आसानी से और भरोसे के साथ।</p>
<div class="actions"><a class="btn" href="services.php">सभी Services देखें</a><a class="btn outline" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('नमस्ते Didi Online, मुझे service के बारे में जानकारी चाहिए।')?>">WhatsApp पर संपर्क करें</a></div></div>
<div class="hero-card"><div class="hero-icon">✓</div><h3>Digital Service Center</h3><p>Online आवेदन, दस्तावेज़ और डिजिटल सेवाओं में सहायता।</p><div class="mini-row"><span>📱 Mobile Friendly</span><span>💬 WhatsApp Support</span></div></div>
</div></section>

<section class="section stats"><div class="container stat-grid"><div><b>24×7</b><span>Online enquiry</span></div><div><b>Easy</b><span>Simple process</span></div><div><b>Direct</b><span>WhatsApp support</span></div><div><b>Trusted</b><span>Didi Online</span></div></div></section>

<section class="section"><div class="container"><div class="section-head"><div><span class="eyebrow">OUR SERVICES</span><h2>लोकप्रिय Services</h2></div><a href="services.php">View All →</a></div><div class="grid">
<?php foreach($services as $s): ?><article class="card service-card"><?php if($s['image']): ?><img src="<?=e($s['image'])?>" alt="<?=e($s['title'])?>"><?php else: ?><div class="placeholder">DIDI ONLINE</div><?php endif; ?><div class="card-body"><h3><?=e($s['title'])?></h3><p class="muted"><?=e($s['description'])?></p><div class="card-foot"><strong><?=e($s['price'])?></strong><a class="text-btn" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('मुझे '.$s['title'].' service चाहिए।')?>">Enquiry →</a></div></div></article><?php endforeach; ?>
</div></div></section>

<section class="section product-section"><div class="container"><div class="section-head"><div><span class="eyebrow">PRODUCTS</span><h2>Featured Products</h2></div><a href="products.php">View All →</a></div><div class="grid">
<?php foreach($products as $p): ?><article class="card service-card"><?php if($p['image']): ?><img src="<?=e($p['image'])?>" alt="<?=e($p['title'])?>"><?php else: ?><div class="placeholder">PRODUCT</div><?php endif; ?><div class="card-body"><h3><?=e($p['title'])?></h3><p class="muted"><?=e($p['description'])?></p><div class="card-foot"><strong>₹<?=number_format((float)$p['price'],2)?></strong><a class="text-btn" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('मुझे '.$p['title'].' चाहिए।')?>">Order →</a></div></div></article><?php endforeach; ?>
</div></div></section>

<section class="cta"><div class="container cta-inner"><div><span class="eyebrow">NEED HELP?</span><h2>किसी Service की जानकारी चाहिए?</h2><p>WhatsApp पर message भेजें, हम आपकी मदद करेंगे।</p></div><a class="btn" href="https://wa.me/<?=e(WHATSAPP_NUMBER)?>?text=<?=rawurlencode('नमस्ते Didi Online, मुझे जानकारी चाहिए।')?>">💬 WhatsApp करें</a></div></section>
<?php include __DIR__.'/includes/footer.php'; ?>

# Didi Online – Website + Admin Panel

यह PHP + MySQL वेबसाइट shared hosting (cPanel आदि) पर चलाने के लिए बनाई गई है।

## मुख्य सुविधाएँ
- Home page
- Services की सूची और Admin से Add/Edit/Delete
- Products की सूची और Admin से Add/Edit/Delete
- WhatsApp/contact section
- Responsive mobile-friendly design
- Admin login
- Image upload
- सभी content database में, इसलिए वेबसाइट को code बदले बिना update किया जा सकता है

## Setup
1. Hosting में PHP 8+ और MySQL database बनाएं।
2. इस package की सभी files `public_html` में upload करें।
3. `config.example.php` को `config.php` नाम दें और database details भरें।
4. Browser में `/install.php` खोलें और admin account बनाएं।
5. Install के बाद `install.php` delete करें।
6. Admin panel `/admin/` से services/products manage करें।

## सुरक्षा
- Strong admin password रखें।
- HTTPS/SSL चालू रखें।
- `config.php` को public download से सुरक्षित रखें (Apache hosting में PHP normally execute होता है)।
- Uploads में केवल image files रखें।

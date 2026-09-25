# 🚗 VinFast Vĩnh Phúc — Child Theme

## Cấu trúc file

```
flatsome-child/
├── style.css               ← CSS chính (Design System VinFast #2563EB)
├── functions.php           ← Đăng ký CPT, ACF, Shortcodes, AJAX
├── page-home.php           ← Template: Trang chủ (Hero Swiper + Car Grid)
├── single-car_model.php    ← Template: Trang xe đơn (như vinfastauto.com)
├── page-du-toan.php        ← Template: Dự toán chi phí lăn bánh
├── page-tra-gop.php        ← Template: Dự toán vay trả góp
├── page-so-sanh.php        ← Template: So sánh xe
└── assets/
    └── js/
        └── main.js         ← Swiper, animations, interactions
```

## Hướng dẫn kích hoạt

### Bước 1: Kích hoạt Child Theme
- WordPress Admin → **Giao diện → Theme**
- Chọn **Flatsome Child - VinFast Vĩnh Phúc** → Kích hoạt

### Bước 2: Cài plugin bắt buộc
| Plugin | Mục đích |
|--------|----------|
| **Advanced Custom Fields (ACF)** | Fields cho xe |
| **Contact Form 7** | Form liên hệ, lái thử |
| **WooCommerce** | Trang đặt cọc |

### Bước 3: Tạo Pages trong WordPress
Vào **Trang → Thêm mới**, tạo các trang sau và chọn Template tương ứng:

| Tên trang | Slug | Template |
|-----------|------|----------|
| Trang chủ | `/` | Trang chủ VinFast Vĩnh Phúc |
| Dự toán chi phí | `/du-toan-chi-phi` | Dự toán chi phí lăn bánh |
| Mua xe trả góp | `/mua-xe-tra-gop` | Dự toán vay trả góp |
| So sánh xe | `/so-sanh-xe` | So sánh xe điện VinFast |

### Bước 4: Nhập dữ liệu xe
- Vào **Mẫu xe → Phân loại xe**: Kiểm tra có đủ "Xe cá nhân" và "Xe dịch vụ"
- Vào **Mẫu xe → Thêm xe mới**: Nhập từng mẫu xe với đầy đủ ACF fields

### Bước 5: Đặt Trang chủ
- **Cài đặt → Đọc → Trang tĩnh** → chọn trang "Trang chủ"

## Shortcodes có sẵn

```
[du_toan_chi_phi]   ← Dự toán chi phí lăn bánh
[du_toan_tra_gop]   ← Dự toán vay trả góp  
[so_sanh_xe]        ← So sánh 2-3 xe
```

## Màu sắc Design System
| Biến | Giá trị | Dùng cho |
|------|---------|----------|
| `--vf-blue` | `#2563EB` | Primary (buttons, tabs, accents) |
| `--vf-blue-dark` | `#1D4ED8` | Hover state |
| `--vf-text` | `#1A1A1A` | Text chính |
| `--vf-bg-gray` | `#F5F5F5` | Nền xám nhạt |

## Tính năng đã code

✅ Custom Post Type `car_model` (Mẫu xe)  
✅ Taxonomy `car_category` (Xe cá nhân / Xe dịch vụ)  
✅ ACF Fields đầy đủ: phiên bản, giá, màu sắc, gallery, thông số  
✅ Template trang xe đơn giống vinfastauto.com  
✅ Sticky subnav (Tổng quan / Thiết kế / Nội thất / Công nghệ / Vận hành / An toàn)  
✅ Color Selector (đổi màu xe realtime)  
✅ Modal "Đăng ký lái thử / Nhận báo giá"  
✅ Bảng so sánh phiên bản (Eco vs Plus)  
✅ Hero Slider (Swiper.js, fade effect, autoplay)  
✅ Dự toán chi phí lăn bánh (tự động tính theo vùng + ưu đãi)  
✅ Dự toán vay trả góp (dư nợ giảm dần, bảng chi tiết)  
✅ So sánh xe (AJAX, tối đa 3 xe)  
✅ Floating sidebar (Lái thử / Dịch vụ / Trả góp / Dự toán / So sánh)  
✅ Responsive (Mobile / Tablet / Desktop)  
✅ GLightbox gallery  
✅ Section reveal animation  

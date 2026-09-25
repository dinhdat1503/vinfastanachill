# AGENTS.md — Quy tắc dự án VinFast Vĩnh Phúc

## Quy tắc Lấy Hình Ảnh (Image Sourcing Rules)
Mỗi khi cần sử dụng, thay thế hoặc bổ sung hình ảnh cho các dòng xe, phụ kiện, trạm sạc, banner hay bất kỳ thành phần nào trên website VinFast, Agent **BẮT BUỘC** phải kiểm tra, ưu tiên lấy và copy trực tiếp từ 2 nguồn dữ liệu cục bộ chính sau đây:

1. **Thư mục VinFast Full Gallery**:
   `C:\Users\ngodi\.gemini\antigravity-ide\scratch\vinfast-image-downloader\vinfast_full_gallery`
   - Chứa ảnh thực tế chính hãng phân loại theo thư mục `o_to` và `phu_kien`.

2. **Thư mục Uploads từ dự án vftanuyen**:
   `C:\Users\ngodi\Job Freelancer\Local Sites\vftanuyen\app\public\wp-content\uploads`
   - Chứa toàn bộ các file ảnh cắt nền Studio (transparent cutout PNG/WebP), banner chiến dịch chính thức, và phụ kiện đã được xử lý chuẩn.

### Quy trình thực hiện khi làm việc với ảnh:
- **Ảnh dải sản phẩm ô tô**: Sử dụng ảnh cắt nền Studio trong suốt (Cutout PNG/WebP) để lớp chữ watermark thương hiệu chìm nổi bật phía sau thân xe.
- **Quản lý tài nguyên dự án**: Tải/copy ảnh từ 2 nguồn trên trực tiếp vào các thư mục cục bộ của dự án hiện tại:
  - `wp-content/uploads/official_cars/` (cho ô tô & trạm sạc)
  - `wp-content/uploads/accessories/` (cho phụ kiện chính hãng)
- Không tùy tiện sử dụng các nguồn ảnh không rõ nguồn gốc ngoài 2 nguồn chính chủ này.

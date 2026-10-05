<?php
/**
 * Template Name: Trang chủ VinFast Vĩnh Phúc
 * Homepage với Hero Swiper + Danh sách xe
 */
defined('ABSPATH') || exit;
get_header();

// Lấy danh sách xe theo phân loại
$xe_ca_nhan = get_posts([
    'post_type'      => 'car_model',
    'posts_per_page' => -1,
    'tax_query'      => [[
        'taxonomy' => 'car_category',
        'field'    => 'slug',
        'terms'    => 'xe-ca-nhan',
    ]],
    'orderby'    => 'menu_order',
    'order'      => 'ASC',
    'post_status' => 'publish',
]);

$xe_dich_vu = get_posts([
    'post_type'      => 'car_model',
    'posts_per_page' => -1,
    'tax_query'      => [[
        'taxonomy' => 'car_category',
        'field'    => 'slug',
        'terms'    => 'xe-dich-vu',
    ]],
    'orderby'    => 'menu_order',
    'order'      => 'ASC',
    'post_status' => 'publish',
]);
?>

<!-- ============================
     HERO BANNER SLIDER
     ============================ -->
<div class="vf-hero">
  <div class="swiper">
    <div class="swiper-wrapper">

      <!-- Slide 1: Lên đời 4 bánh xe điện -->
      <div class="swiper-slide">
        <picture>
          <source media="(max-width: 768px)" srcset="https://static-cms-prod.vinfastauto.com/len-doi-4-banh-len-cap-trai-nghiem-mobile.webp">
          <img src="https://static-cms-prod.vinfastauto.com/len-doi-4-banh-len-cap-trai-nghiem-desktop.webp"
               alt="VinFast - Lên đời 4 bánh xe điện" class="vf-slide-img" fetchpriority="high">
        </picture>
        <div class="vf-slide-overlay"></div>
        <div class="vf-slide-content">
          <div class="vf-slide-inner">
            <span class="vf-slide-tag">VinFast Tân Á Châu</span>
            <h2 class="vf-slide-title">Mãnh Liệt<br>Vì Tương Lai Xanh</h2>
            <p class="vf-slide-sub">Đại lý VinFast chính hãng Tân Á Châu — Tư vấn tận tâm, Ưu đãi tốt nhất</p>
            <div class="vf-slide-btns">
              <a href="<?php echo home_url('/#dong-xe-dien'); ?>" class="vf-btn vf-btn-primary">
                XEM DÒNG XE ĐIỆN
              </a>
              <a href="<?php echo esc_url(home_url('/dang-ky-lai-thu/')); ?>" class="vf-btn vf-btn-outline">
                ĐĂNG KÝ LÁI THỬ
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2: Voucher 80 triệu / Ưu đãi -->
      <div class="swiper-slide">
        <picture>
          <source media="(max-width: 768px)" srcset="https://static-cms-prod.vinfastauto.com/vinfast-len-doi-xe-dien-voucher-80-trieu-mobile.jpg">
          <img src="https://static-cms-prod.vinfastauto.com/vinfast-len-doi-xe-dien-voucher-80-trieu-desktop.jpg"
               alt="VinFast - Voucher 80 triệu" class="vf-slide-img" loading="lazy">
        </picture>
        <div class="vf-slide-overlay"></div>
        <div class="vf-slide-content">
          <div class="vf-slide-inner">
            <span class="vf-slide-tag">Ưu đãi độc quyền</span>
            <h2 class="vf-slide-title">Tặng Voucher<br>Tới 80 Triệu Đồng*</h2>
            <p class="vf-slide-sub">Hỗ trợ chuyển đổi từ xe xăng sang ô tô điện VinFast chính hãng</p>
            <div class="vf-slide-btns">
              <a href="<?php echo esc_url(home_url('/dat-coc-xe/')); ?>" class="vf-btn vf-btn-primary">ĐẶT CỌC ONLINE</a>
              <a href="<?php echo esc_url(home_url('/dang-ky-lai-thu/')); ?>" class="vf-btn vf-btn-outline" style="color:#fff; border-color:#fff;">ĐĂNG KÝ LÁI THỬ</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3: Thu nhập hiệu quả kinh doanh xe -->
      <div class="swiper-slide">
        <picture>
          <source media="(max-width: 768px)" srcset="https://static-cms-prod.vinfastauto.com/thu-nhap-hieu-qua-du-ngay-hay-dem-mobile.webp">
          <img src="https://static-cms-prod.vinfastauto.com/thu-nhap-hieu-qua-du-ngay-hay-dem-desktop.webp"
               alt="VinFast Xe Dịch Vụ" class="vf-slide-img" loading="lazy">
        </picture>
        <div class="vf-slide-overlay"></div>
        <div class="vf-slide-content">
          <div class="vf-slide-inner">
            <span class="vf-slide-tag">Giải pháp xe dịch vụ</span>
            <h2 class="vf-slide-title">Kinh Doanh Xanh<br>Thu Nhập Hiệu Quả</h2>
            <p class="vf-slide-sub">Giải pháp xe điện chuyên dụng cho taxi & dịch vụ vận chuyển</p>
            <div class="vf-slide-btns">
              <a href="<?php echo home_url('/#xe-dich-vu'); ?>" class="vf-btn vf-btn-primary">XEM XE DỊCH VỤ</a>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /swiper-wrapper -->

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</div><!-- /vf-hero -->

<!-- ============================
     OFFICIAL VINFAST CAR SHOWCASE SLIDER
     ============================ -->
<section class="vf-showcase-section" id="dong-xe-dien">
  <div class="container">

    <div class="vf-showcase-slider swiper">
      <div class="swiper-wrapper">

        <?php
        // Lấy tất cả Mẫu xe từ CPT car_model
        $cars_query = get_posts([
            'post_type'      => 'car_model',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        // Nếu chưa nhập dữ liệu CPT, dùng danh sách mẫu xe mặc định đầy đủ VinFast
        if (empty($cars_query)) {
            $cars_data = [
                [
                    'slug'      => 'vf2',
                    'name'      => 'VinFast VF 2',
                    'wm'        => 'VF 2',
                    'segment'   => 'MiniCar',
                    'seats'     => '4 chỗ',
                    'range'     => '210 km (NEDC)',
                    'price'     => '188.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf2'),
                    'link'      => vfvp_get_car_product_url('vf2'),
                ],
                [
                    'slug'      => 'vf3',
                    'name'      => 'VinFast VF 3',
                    'wm'        => 'VF 3',
                    'segment'   => 'Mini SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '210 km',
                    'price'     => '285.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf3'),
                    'link'      => vfvp_get_car_product_url('vf3'),
                ],
                [
                    'slug'      => 'vf5',
                    'name'      => 'VinFast VF 5 Plus',
                    'wm'        => 'VF 5',
                    'segment'   => 'A-SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '326 km (NEDC)',
                    'price'     => '496.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf5'),
                    'link'      => vfvp_get_car_product_url('vf5'),
                ],
                [
                    'slug'      => 'vf6',
                    'name'      => 'VinFast VF 6',
                    'wm'        => 'VF 6',
                    'segment'   => 'B-SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '399 km (WLTP)',
                    'price'     => '646.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf6'),
                    'link'      => vfvp_get_car_product_url('vf6'),
                ],
                [
                    'slug'      => 'vf7',
                    'name'      => 'VinFast VF 7',
                    'wm'        => 'VF 7',
                    'segment'   => 'C-SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '431 km (WLTP)',
                    'price'     => '740.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf7'),
                    'link'      => vfvp_get_car_product_url('vf7'),
                ],
                [
                    'slug'      => 'vf8',
                    'name'      => 'VinFast VF 8',
                    'wm'        => 'VF 8',
                    'segment'   => 'D-SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '460 km (WLTP)',
                    'price'     => '898.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf8'),
                    'link'      => vfvp_get_car_product_url('vf8'),
                ],
                [
                    'slug'      => 'vf8_allnew',
                    'name'      => 'VinFast VF 8 All New',
                    'wm'        => 'VF 8 ALL NEW',
                    'segment'   => 'D-SUV Thể thao',
                    'seats'     => '5 chỗ',
                    'range'     => '471 km (WLTP)',
                    'price'     => '899.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf8_allnew'),
                    'link'      => vfvp_get_car_product_url('vf8_allnew'),
                ],
                [
                    'slug'      => 'vf9',
                    'name'      => 'VinFast VF 9',
                    'wm'        => 'VF 9',
                    'segment'   => 'E-SUV',
                    'seats'     => '6 - 7 chỗ',
                    'range'     => '626 km (WLTP)',
                    'price'     => '1.348.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vf9'),
                    'link'      => vfvp_get_car_product_url('vf9'),
                ],
                [
                    'slug'      => 'vfwild',
                    'name'      => 'VinFast VF Wild',
                    'wm'        => 'VF WILD',
                    'segment'   => 'Bán Tải REEV',
                    'seats'     => '5 chỗ',
                    'range'     => '> 1.000 km (NEDC)',
                    'price'     => '860.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('vfwild'),
                    'link'      => vfvp_get_car_product_url('vfwild'),
                ],
                [
                    'slug'      => 'mpv7',
                    'name'      => 'VinFast VF MPV 7',
                    'wm'        => 'VF MPV 7',
                    'segment'   => 'Xe MPV 7 chỗ',
                    'seats'     => '7 chỗ',
                    'range'     => '450 km (WLTP)',
                    'price'     => '750.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('mpv7'),
                    'link'      => vfvp_get_car_product_url('mpv7'),
                ],
                [
                    'slug'      => 'ecvan',
                    'name'      => 'EC Van',
                    'wm'        => 'EC VAN',
                    'segment'   => 'Xe tải thương mại',
                    'seats'     => '2 chỗ',
                    'range'     => '180 km (NEDC)',
                    'price'     => '286.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('ecvan'),
                    'link'      => vfvp_get_car_product_url('ecvan'),
                ],
                [
                    'slug'      => 'minio',
                    'name'      => 'Minio Green',
                    'wm'        => 'MINIO GREEN',
                    'segment'   => 'Xe dịch vụ đô thị',
                    'seats'     => '4 chỗ',
                    'range'     => '210 km (NEDC)',
                    'price'     => 'Liên hệ báo giá',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('minio'),
                    'link'      => vfvp_get_car_product_url('minio'),
                ],
                [
                    'slug'      => 'herio',
                    'name'      => 'Herio Green',
                    'wm'        => 'HERIO GREEN',
                    'segment'   => 'Xe dịch vụ đô thị',
                    'seats'     => '5 chỗ',
                    'range'     => '326 km (NEDC)',
                    'price'     => 'Liên hệ báo giá',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('herio'),
                    'link'      => vfvp_get_car_product_url('herio'),
                ],
                [
                    'slug'      => 'nerio',
                    'name'      => 'Nerio Green',
                    'wm'        => 'NERIO GREEN',
                    'segment'   => 'Xe dịch vụ C-SUV',
                    'seats'     => '5 chỗ',
                    'range'     => '318.6 km (NEDC)',
                    'price'     => 'Liên hệ báo giá',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('nerio'),
                    'link'      => vfvp_get_car_product_url('nerio'),
                ],
                [
                    'slug'      => 'limo',
                    'name'      => 'Limo Green',
                    'wm'        => 'LIMO GREEN',
                    'segment'   => 'Xe dịch vụ cao cấp',
                    'seats'     => '7 chỗ',
                    'range'     => '450 km (WLTP)',
                    'price'     => '699.000.000 VNĐ*',
                    'price_old' => '',
                    'img'       => vfvp_get_car_image_url('limo'),
                    'link'      => vfvp_get_car_product_url('limo'),
                ],
            ];
        } else {
            $cars_data = [];
            foreach ($cars_query as $c) {
                $versions = get_field('car_versions', $c->ID) ?: [];
                $min_p = 0; $old_p = '';
                if (!empty($versions)) {
                    $min_p = $versions[0]['version_price'] ?? 0;
                    $old_p = !empty($versions[0]['version_price_old']) ? vfvp_format_price($versions[0]['version_price_old']) : '';
                }
                $thumb = get_the_post_thumbnail_url($c->ID, 'full');
                if (!$thumb) {
                    $colors = get_field('car_colors', $c->ID) ?: [];
                    $thumb = !empty($colors) ? ($colors[0]['color_image'] ?? '') : '';
                }
                $segment = get_field('car_segment', $c->ID) ?: 'Ô tô điện';
                $slug = sanitize_title($c->post_title);
                $cars_data[] = [
                    'slug'      => $slug,
                    'name'      => $c->post_title,
                    'wm'        => strtoupper(str_replace(['VinFast ', 'vinfast '], '', $c->post_title)),
                    'segment'   => $segment,
                    'seats'     => (get_field('car_seats', $c->ID) ?: '5') . ' chỗ',
                    'range'     => get_field('car_range', $c->ID) ?: 'Đang cập nhật',
                    'price'     => $min_p > 0 ? vfvp_format_price($min_p) . '*' : 'Liên hệ báo giá',
                    'price_old' => $old_p,
                    'img'       => vfvp_get_car_image_url(str_replace(['vf-', 'vf_'], 'vf', strtolower($slug))),
                    'link'      => vfvp_get_car_product_url($slug),
                ];
            }
        }

        foreach ($cars_data as $car):
        ?>
        <div class="swiper-slide vf-showcase-item">
          <!-- HÌNH XE CHÍNH HÃNG VINFAST CMS -->
          <a href="<?php echo esc_url($car['link']); ?>" class="vf-showcase-stage">
            <img src="<?php echo esc_url($car['img']); ?>"
                 alt="<?php echo esc_attr($car['name']); ?>"
                 class="vf-showcase-img"
                 loading="lazy">
          </a>

          <!-- BẢNG THÔNG SỐ CHUẨN 4 CỘT -->
          <div class="vf-showcase-bar">
            <div class="vf-showcase-col">
              <span class="vf-sc-label">Dòng xe</span>
              <strong class="vf-sc-val"><?php echo esc_html($car['name']); ?></strong>
            </div>
            <div class="vf-showcase-col">
              <span class="vf-sc-label">Số chỗ ngồi</span>
              <strong class="vf-sc-val"><?php echo esc_html($car['seats']); ?></strong>
            </div>
            <div class="vf-showcase-col">
              <span class="vf-sc-label">Quãng đường lên tới</span>
              <strong class="vf-sc-val"><?php echo esc_html($car['range']); ?></strong>
            </div>
            <div class="vf-showcase-col">
              <span class="vf-sc-label">Giá bán từ</span>
              <strong class="vf-sc-val vf-sc-price"><?php echo esc_html($car['price']); ?></strong>
              <?php if (!empty($car['price_old'])): ?>
                <span class="vf-sc-price-old"><?php echo esc_html($car['price_old']); ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- 2 NÚT THAO TÁC: ĐẶT CỌC & XEM CHI TIẾT -->
          <div class="vf-showcase-actions">
            <a href="<?php echo esc_url(home_url('/dat-coc-xe/?car=' . $car['slug'])); ?>" class="vf-btn vf-btn-primary">
              ĐẶT CỌC NGAY
            </a>
            <a href="<?php echo esc_url($car['link']); ?>" class="vf-btn vf-btn-outline vf-sc-btn-detail">
              XEM CHI TIẾT
            </a>
          </div>
        </div>
        <?php endforeach; ?>

      </div><!-- /swiper-wrapper -->

      <!-- NÚT ĐIỀU HƯỚNG TRÁI / PHẢI CHUẨN TRÒN -->
      <div class="vf-sc-button-prev swiper-button-prev"></div>
      <div class="vf-sc-button-next swiper-button-next"></div>

      <!-- CHẤM TRÒN PHÂN TRANG (PAGINATION DOTS) -->
      <div class="vf-sc-pagination swiper-pagination"></div>
    </div><!-- /vf-showcase-slider -->

    <div class="vf-showcase-disclaimer">
      (*) Mức giá ưu đãi mang tính chất tham khảo. Chương trình áp dụng theo điều khoản & điều kiện.
    </div>

  </div>
</section>

<!-- ============================
     BANNER KÊU GỌI ĐẶT CỌC XE TRỰC TUYẾN (DẠNG CARD GỌN GÀNG)
     ============================ -->
<section class="vf-deposit-card-section" style="padding: 16px 0 32px 0; background: transparent;">
  <style>
  @media (max-width: 900px) {
    .vf-deposit-banner-card {
      flex-direction: column !important;
      align-items: flex-start !important;
      padding: 24px 20px !important;
      gap: 18px !important;
      border-radius: 16px !important;
    }
    .vf-dep-card-btns {
      width: 100% !important;
    }
    .vf-dep-card-btns .vf-btn {
      flex: 1 1 100% !important;
      text-align: center !important;
      justify-content: center !important;
      display: flex !important;
      align-items: center !important;
    }
  }
  </style>
  <div class="container">
    <div class="vf-deposit-banner-card" style="
      background: linear-gradient(135deg, #070F26 0%, #102A71 60%, #1E40AF 100%);
      border-radius: 20px;
      padding: 34px 40px;
      color: #ffffff;
      box-shadow: 0 12px 35px rgba(16, 42, 117, 0.16);
      border: 1px solid rgba(255, 255, 255, 0.16);
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 28px;
    ">
      <!-- Glow ambient light -->
      <div style="position: absolute; right: -40px; top: -40px; width: 260px; height: 260px; background: radial-gradient(circle, rgba(96, 165, 250, 0.18) 0%, transparent 70%); pointer-events: none;"></div>

      <div style="max-width: 640px; position: relative; z-index: 2;">
        <span style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.12); color: #93C5FD; font-size: 11px; font-weight: 800; padding: 4px 14px; border-radius: 20px; letter-spacing: 0.8px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
          ⚡ CHÍNH SÁCH ĐẶT CỌC TRỰC TUYẾN
        </span>
        <h3 style="font-size: clamp(1.25rem, 2.2vw, 1.65rem); font-weight: 900; color: #ffffff; margin: 0 0 8px 0; text-transform: uppercase; line-height: 1.35; letter-spacing: -0.2px;">
          Đặt cọc online — Giữ trọn ưu đãi & Giao xe sớm nhất
        </h3>
        <p style="font-size: 13.5px; color: #CBD5E1; margin: 0; line-height: 1.55;">
          Bảo toàn 100% quà tặng voucher tháng, ưu đãi lệ phí trước bạ và thanh toán an toàn qua mã VietQR đại lý ủy quyền VinFast Tân Á Châu.
        </p>
      </div>

      <div class="vf-dep-card-btns" style="display: flex; gap: 12px; flex-wrap: wrap; flex-shrink: 0; position: relative; z-index: 2;">
        <a href="<?php echo esc_url(home_url('/dat-coc-xe/')); ?>" class="vf-btn vf-btn-primary" style="background: linear-gradient(135deg, #2563EB, #1D4ED8); box-shadow: 0 6px 18px rgba(37, 99, 235, 0.45); white-space: nowrap; height: 46px; line-height: 46px; padding: 0 26px; font-weight: 800; font-size: 13px; border-radius: 10px; text-decoration: none; border: none;">
          ✓ ĐẶT CỌC NGAY
        </a>
        <a href="<?php echo esc_url(home_url('/dang-ky-lai-thu/')); ?>" class="vf-btn vf-btn-outline" style="color: #ffffff; border-color: rgba(255,255,255,0.4); white-space: nowrap; height: 46px; line-height: 46px; padding: 0 22px; font-weight: 700; font-size: 13px; border-radius: 10px; text-decoration: none;">
          LÁI THỬ XE
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================
     PHỤ KIỆN XE VINFAST CHÍNH HÃNG
     ============================ -->
<?php
$accessories = vfvp_get_accessories();
if (!empty($accessories)):
?>
<section class="vf-accessory-section" id="phu-kien-xe">
  <div class="container">
    <div class="vf-acc-head">
      <div>
        <h2 class="vf-acc-title">Phụ kiện xe</h2>
        <p class="vf-acc-subtitle">Phụ kiện & thiết bị sạc chính hãng VinFast</p>
      </div>
      <a href="<?php echo home_url('/phu-kien/'); ?>" class="vf-btn vf-btn-primary vf-acc-more">
        XEM THÊM <span>→</span>
      </a>
    </div>

    <div class="vf-acc-grid">
      <?php 
      $display_acc = array_slice($accessories, 0, 8);
      foreach ($display_acc as $acc): 
      ?>
      <div class="vf-acc-card">
        <div class="vf-acc-img-wrapper">
          <img src="<?php echo esc_url($acc['image']); ?>" 
               alt="<?php echo esc_attr($acc['name']); ?>" 
               loading="lazy" 
               class="vf-acc-img">
        </div>
        <div class="vf-acc-info">
          <div class="vf-acc-cat"><?php echo esc_html($acc['category'] ?? 'Phụ kiện chính hãng'); ?></div>
          <h3 class="vf-acc-name"><?php echo esc_html($acc['name']); ?></h3>
          <div class="vf-acc-price"><?php echo esc_html($acc['price']); ?></div>
          <a href="<?php echo home_url('/phu-kien/'); ?>" class="vf-btn vf-btn-outline vf-acc-btn">
            XEM CHI TIẾT
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============================
     PIN & TRẠM SẠC Ô TÔ ĐIỆN
     ============================ -->
<section class="vf-charging-section" id="pin-tram-sac">
  <div class="container">
    <div class="vf-charging-grid">
      <!-- Left Column Cards -->
      <div class="vf-charging-left">
        <!-- Card 1: Trạm sạc ô tô điện -->
        <a href="<?php echo esc_url(home_url('/dich-vu-pin-oto-dien/')); ?>" class="vf-charging-card" style="display:block; text-decoration:none; background: linear-gradient(180deg, rgba(15,23,42,0.1) 0%, rgba(15,23,42,0.85) 100%), url('<?php echo esc_url(vfvp_get_charging_image_url('charging_station_car.jpg')); ?>') center/cover no-repeat;">
          <div class="vf-charging-card-overlay">
            <h3 class="vf-charging-card-title">Pin & Trạm sạc ô tô điện</h3>
          </div>
        </a>
        <!-- Card 2: Giải pháp năng lượng V-GREEN -->
        <a href="<?php echo esc_url(home_url('/tim-kiem-showroom-tram-sac/')); ?>" class="vf-charging-card" style="display:block; text-decoration:none; background: linear-gradient(180deg, rgba(15,23,42,0.1) 0%, rgba(15,23,42,0.85) 100%), url('<?php echo esc_url(vfvp_get_charging_image_url('charging_station_vgreen.jpg')); ?>') center/cover no-repeat;">
          <div class="vf-charging-card-overlay">
            <h3 class="vf-charging-card-title">Hệ thống trạm sạc V-GREEN phủ rộng toàn quốc</h3>
          </div>
        </a>
      </div>

      <!-- Right Column Featured Card: Thiết bị sạc di động -->
      <div class="vf-charging-right">
        <a href="<?php echo esc_url(home_url('/pin-va-tram-sac/')); ?>" class="vf-charging-featured-card" style="display:flex; text-decoration:none; color:inherit;">
          <div class="vf-charging-featured-content">
            <h3 class="vf-charging-featured-title">Thiết bị sạc di động</h3>
            <p class="vf-charging-featured-desc">
              VinFast cung cấp đa dạng giải pháp sạc để đáp ứng nhu cầu sử dụng của khách hàng một cách thuận tiện nhất.
            </p>
            <span class="vf-charging-featured-link">
              XEM CHI TIẾT <span style="font-size:1.1rem; vertical-align:middle; margin-left:4px;">→</span>
            </span>
          </div>
          <div class="vf-charging-featured-img-wrap">
            <img src="<?php echo esc_url(vfvp_get_charging_image_url('portable_charger.webp')); ?>" 
                 alt="Thiết bị sạc di động VinFast" 
                 class="vf-charging-featured-img"
                 loading="lazy">
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================
     BẢO HÀNH & DỊCH VỤ HẬU MÃI
     ============================ -->
<section class="vf-service-section" id="bao-hanh-dich-vu">
<?php 
$upload_dir = wp_upload_dir();
$tunnel_bg  = $upload_dir['baseurl'] . '/official_cars/common/service_bg_tunnel.png';
$vf9_clean  = $upload_dir['baseurl'] . '/official_cars/common/cutout_vf9_clean.png';
?>
    <div class="vf-service-banner" style="background: url('<?php echo esc_url($tunnel_bg); ?>') center right / cover no-repeat; background-color: #F8FAFC;">
      <div class="vf-service-content">
        <h2 class="vf-service-title">Bảo hành & Dịch vụ</h2>
        <p class="vf-service-desc">
          VinFast đã đầu tư nghiêm túc và bài bản để phát triển hệ thống Showroom, Nhà phân phối và xưởng dịch vụ rộng khắp, đáp ứng tối đa nhu cầu của Khách hàng.
        </p>
        <div class="vf-service-actions">
          <a href="<?php echo home_url('/dat-lich-dich-vu/'); ?>" class="vf-btn vf-btn-primary">
            ĐẶT LỊCH BẢO DƯỠNG
          </a>
          <a href="<?php echo home_url('/chinh-sach-bao-hanh/'); ?>" class="vf-btn vf-btn-outline">
            CHÍNH SÁCH
          </a>
        </div>
      </div>
      <div class="vf-service-img-wrap">
        <img src="<?php echo esc_url($vf9_clean); ?>" 
             alt="VinFast VF 9 - Bảo hành & Dịch vụ" 
             class="vf-service-img"
             loading="lazy">
      </div>
    </div>
</section>

<!-- ============================
     MÃNH LIỆT TINH THẦN VIỆT NAM - VÌ TƯƠNG LAI XANH
     ============================ -->
<?php
$camp_posts = get_posts([
    'post_type'      => 'post',
    'title'          => 'Mãnh liệt Tinh thần Việt Nam - Vì Tương lai Xanh',
    'posts_per_page' => 1,
    'post_status'    => 'publish'
]);
$camp_url   = !empty($camp_posts) ? get_permalink($camp_posts[0]->ID) : home_url('/tin-tuc/');
$camp_title = !empty($camp_posts) ? esc_html($camp_posts[0]->post_title) : 'Mãnh liệt Tinh thần Việt Nam - Vì Tương lai Xanh';
$camp_desc  = !empty($camp_posts) ? esc_html(get_the_excerpt($camp_posts[0]->ID)) : 'Chiến dịch Mãnh liệt Tinh thần Việt Nam - Vì Tương lai Xanh là lời khẳng định mạnh mẽ của VinFast trong hành trình thúc đẩy cuộc cách mạng xe điện và kiến tạo một tương lai bền vững...';
?>
<section class="vf-campaign-section" id="manh-liet-tinh-than-viet-nam">
  <div class="vf-campaign-banner" style="background-image: url('<?php echo esc_url(content_url('/uploads/official_cars/common/manh_liet_tinh_than_viet_nam.png')); ?>');">
    <div class="vf-campaign-overlay"></div>
    <div class="vf-campaign-content">
      <h2 class="vf-campaign-title">
        <?php echo $camp_title; ?>
      </h2>
      <p class="vf-campaign-desc">
        <?php echo $camp_desc; ?>
      </p>
      <a href="<?php echo esc_url($camp_url); ?>" class="vf-btn vf-btn-primary vf-campaign-btn">
        XEM CHI TIẾT
      </a>
    </div>
  </div>
</section>

<!-- ============================
     XE DỊCH VỤ
     ============================ -->
<?php if (!empty($xe_dich_vu)): ?>
<section class="vf-car-section vf-section-alt" id="xe-dich-vu">
  <div class="container">
    <div class="vf-section-header">
      <div class="vf-section-label">Giải pháp kinh doanh xanh</div>
      <h2 class="vf-section-title">Xe dịch vụ VinFast</h2>
      <p class="vf-section-desc">Dòng xe chuyên dụng cho taxi, chia sẻ xe và dịch vụ vận chuyển</p>
    </div>

    <div class="vf-car-grid">
      <?php foreach ($xe_dich_vu as $car):
        $post_id  = $car->ID;
        $versions = get_field('car_versions', $post_id) ?: [];
        $min_price = 0;
        foreach ($versions as $v) {
            $p = floatval($v['version_price'] ?? 0);
            if ($p > 0 && ($min_price === 0 || $p < $min_price)) $min_price = $p;
        }
        $range = get_field('car_range', $post_id);
        $seats = get_field('car_seats', $post_id);
        $thumb = get_the_post_thumbnail_url($post_id, 'large');
        if (!$thumb) {
            $colors = get_field('car_colors', $post_id) ?: [];
            $thumb  = !empty($colors) ? ($colors[0]['color_image'] ?? '') : '';
        }
      ?>
      <div class="vf-car-card">
        <a href="<?php the_permalink($post_id); ?>" class="vf-car-card-img" style="text-decoration:none;">
          <?php if ($thumb): ?>
            <img src="<?php echo esc_url($thumb); ?>"
                 alt="<?php echo esc_attr(get_the_title($post_id)); ?>"
                 loading="lazy">
          <?php else: ?>
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#f5f5f5;">
              <span style="font-size:2rem;font-weight:900;color:#ddd;"><?php echo esc_html(get_the_title($post_id)); ?></span>
            </div>
          <?php endif; ?>
        </a>
        <div class="vf-car-card-body">
          <div class="vf-car-card-category">Xe dịch vụ</div>
          <h3 class="vf-car-card-name">
            <a href="<?php the_permalink($post_id); ?>" style="color:inherit; text-decoration:none;">
              <?php echo esc_html(get_the_title($post_id)); ?>
            </a>
          </h3>
          <div class="vf-car-card-price">
            <?php if ($min_price > 0): ?>
              Giá từ <strong><?php echo vfvp_format_price($min_price); ?></strong>
            <?php else: ?>
              <strong>Liên hệ để nhận giá</strong>
            <?php endif; ?>
          </div>
          <ul class="vf-car-card-specs">
            <?php if ($range): ?><li><?php echo esc_html($range); ?> tầm hoạt động</li><?php endif; ?>
            <?php if ($seats): ?><li><?php echo esc_html($seats); ?> chỗ ngồi</li><?php endif; ?>
          </ul>
          <div class="vf-car-card-actions">
            <a href="<?php the_permalink($post_id); ?>" class="vf-btn vf-btn-outline">Khám phá</a>
            <button class="vf-btn vf-btn-primary" onclick="vfOpenModal('modal-laythu')">Đặt cọc</button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>



<!-- ============================
     CÔNG CỤ HỖ TRỢ MUA XE & ĐẶT CỌC
     ============================ -->
<section class="vf-finance-section" id="cong-cu-mua-xe" style="padding: 70px 0; background: #F8FAFC; border-top: 1px solid #E2E8F0; border-bottom: 1px solid #E2E8F0;">
  <div class="container">
    <div style="text-align: center; margin-bottom: 44px;">
      <span style="display:inline-block; background:#EFF6FF; color:#2563EB; font-size:12px; font-weight:800; padding:5px 16px; border-radius:20px; text-transform:uppercase; letter-spacing:1px; margin-bottom:12px; border:1px solid #BFDBFE;">LẬP KẾ HOẠCH TÀI CHÍNH</span>
      <h2 style="font-size:clamp(1.7rem, 3.2vw, 2.3rem); font-weight:900; color:#0F172A; margin:0 0 12px 0; text-transform:uppercase; letter-spacing:-0.4px;">Công cụ hỗ trợ sở hữu xe</h2>
      <p style="color:#64748B; font-size:14.5px; max-width:620px; margin:0 auto; line-height:1.6;">Dễ dàng ước tính toàn bộ chi phí lăn bánh chính xác, bảng tính trả góp linh hoạt và thủ tục đặt cọc trực tuyến bảo toàn quà tặng ưu đãi.</p>
    </div>

    <div class="vf-finance-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(310px, 1fr)); gap:24px;">
      
      <!-- Thẻ 1: Dự toán chi phí lăn bánh -->
      <a href="<?php echo esc_url(home_url('/du-toan-chi-phi/')); ?>" 
         class="vf-fin-card" 
         style="background: linear-gradient(135deg, #1E40AF 0%, #2563EB 100%); border-radius: 18px; padding: 34px 28px; text-decoration: none; display: flex; flex-direction: column; color: #ffffff; box-shadow: 0 10px 28px rgba(37, 99, 235, 0.22); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid rgba(255, 255, 255, 0.15); position: relative; overflow: hidden;"
         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 18px 40px rgba(37, 99, 235, 0.38)';"
         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 28px rgba(37, 99, 235, 0.22)';">
        <div style="width: 56px; height: 56px; border-radius: 14px; background: rgba(255, 255, 255, 0.16); backdrop-filter: blur(8px); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 20px;">
          📊
        </div>
        <span style="font-size: 11.5px; font-weight: 800; color: #93C5FD; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">ƯỚC TÍNH CHI PHÍ</span>
        <h3 style="font-size: 1.35rem; font-weight: 800; margin: 0 0 12px 0; color: #ffffff;">Dự toán chi phí lăn bánh</h3>
        <p style="font-size: 13.5px; color: rgba(255, 255, 255, 0.85); line-height: 1.6; margin: 0 0 24px 0; flex: 1;">
          Tính toán tổng chi phí sở hữu xe chi tiết theo từng tỉnh thành: miễn 100% lệ phí trước bạ, phí đăng ký biển số, bảo hiểm bắt buộc & quà tặng voucher tháng.
        </p>
        <span style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: #ffffff; background: rgba(255, 255, 255, 0.2); padding: 10px 18px; border-radius: 8px; width: fit-content;">
          TÍNH GIÁ LĂN BÁNH →
        </span>
      </a>

      <!-- Thẻ 2: Bảng tính vay trả góp -->
      <a href="<?php echo esc_url(home_url('/mua-xe-tra-gop/')); ?>" 
         class="vf-fin-card" 
         style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); border-radius: 18px; padding: 34px 28px; text-decoration: none; display: flex; flex-direction: column; color: #ffffff; box-shadow: 0 10px 28px rgba(15, 23, 42, 0.2); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid rgba(255, 255, 255, 0.12); position: relative; overflow: hidden;"
         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 18px 40px rgba(15, 23, 42, 0.35)';"
         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 28px rgba(15, 23, 42, 0.2)';">
        <div style="width: 56px; height: 56px; border-radius: 14px; background: rgba(255, 255, 255, 0.12); backdrop-filter: blur(8px); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 20px;">
          💳
        </div>
        <span style="font-size: 11.5px; font-weight: 800; color: #60A5FA; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">HỖ TRỢ TÀI CHÍNH</span>
        <h3 style="font-size: 1.35rem; font-weight: 800; margin: 0 0 12px 0; color: #ffffff;">Dự toán vay trả góp 80%</h3>
        <p style="font-size: 13.5px; color: rgba(255, 255, 255, 0.85); line-height: 1.6; margin: 0 0 24px 0; flex: 1;">
          Ước tính số tiền trả trước từ 20% và số tiền góp hàng tháng theo phương thức dư nợ giảm dần. Liên kết 10+ ngân hàng lớn, duyệt hồ sơ nhanh trong 24h.
        </p>
        <span style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: #ffffff; background: rgba(255, 255, 255, 0.18); padding: 10px 18px; border-radius: 8px; width: fit-content;">
          TÍNH GÓI TRẢ GÓP →
        </span>
      </a>

      <!-- Thẻ 3: Đặt cọc trực tuyến giữ ưu đãi -->
      <a href="<?php echo esc_url(home_url('/dat-coc-xe/')); ?>" 
         class="vf-fin-card" 
         style="background: linear-gradient(135deg, #064E3B 0%, #059669 100%); border-radius: 18px; padding: 34px 28px; text-decoration: none; display: flex; flex-direction: column; color: #ffffff; box-shadow: 0 10px 28px rgba(5, 150, 105, 0.22); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid rgba(255, 255, 255, 0.15); position: relative; overflow: hidden;"
         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 18px 40px rgba(5, 150, 105, 0.38)';"
         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 28px rgba(5, 150, 105, 0.22)';">
        <div style="width: 56px; height: 56px; border-radius: 14px; background: rgba(255, 255, 255, 0.18); backdrop-filter: blur(8px); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 20px;">
          ⚡
        </div>
        <span style="font-size: 11.5px; font-weight: 800; color: #A7F3D0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">ĐẶT CỌC CHÍNH HÃNG</span>
        <h3 style="font-size: 1.35rem; font-weight: 800; margin: 0 0 12px 0; color: #ffffff;">Đặt cọc xe trực tuyến</h3>
        <p style="font-size: 13.5px; color: rgba(255, 255, 255, 0.85); line-height: 1.6; margin: 0 0 24px 0; flex: 1;">
          Ưu tiên xếp lịch nhận xe sớm nhất, bảo toàn 100% quà tặng ưu đãi trong tháng. Hỗ trợ quét mã VietQR tự động chính chủ VinFast Tân Á Châu.
        </p>
        <span style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: #ffffff; background: rgba(255, 255, 255, 0.22); padding: 10px 18px; border-radius: 8px; width: fit-content;">
          ĐẶT CỌC NGAY →
        </span>
      </a>

    </div>
  </div>
</section>

<!-- ============================
     TIN TỨC & SỰ KIỆN VINFAST
     ============================ -->
<?php
$latest_posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
]);

if (!empty($latest_posts)):
?>
<section class="vf-news-section" id="tin-tuc" style="background:#F8FAFC; padding: 60px 0; border-top:1px solid #E2E8F0;">
  <div class="container">
    <div class="vf-acc-head" style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom: 32px;">
      <div>
        <span style="display:inline-block; background:#EFF6FF; color:#2563EB; font-size:12px; font-weight:800; padding:4px 12px; border-radius:20px; text-transform:uppercase; margin-bottom:8px;">⚡ THÔNG TIN MỚI NHẤT</span>
        <h2 style="font-size:clamp(1.6rem, 3vw, 2.2rem); font-weight:800; color:#0F172A; margin:0;">Tin tức & Sự kiện</h2>
      </div>
      <a href="<?php echo esc_url(home_url('/tin-tuc/')); ?>" class="vf-btn vf-btn-primary vf-acc-more">
        XEM TẤT CẢ BÀI VIẾT <span>→</span>
      </a>
    </div>

    <div class="vf-news-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap:24px;">
      <?php foreach ($latest_posts as $post_item): 
        $post_thumb = get_the_post_thumbnail_url($post_item->ID, 'medium_large');
        if (!$post_thumb) {
            $post_thumb = content_url('/uploads/official_cars/common/official_vf8.webp');
        }
      ?>
      <article class="vf-news-card" style="background:#FFFFFF; border-radius:12px; overflow:hidden; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.04); display:flex; flex-direction:column; transition:transform 0.3s ease, box-shadow 0.3s ease;">
        <a href="<?php echo esc_url(get_permalink($post_item->ID)); ?>" style="display:block; height:180px; overflow:hidden; position:relative;">
          <img src="<?php echo esc_url($post_thumb); ?>" alt="<?php echo esc_attr($post_item->post_title); ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;">
        </a>
        <div style="padding: 20px; display:flex; flex-direction:column; flex:1;">
          <div style="font-size:12px; color:#64748B; margin-bottom:8px; font-weight:600;">
            📅 <?php echo get_the_date('d/m/Y', $post_item->ID); ?>
          </div>
          <h3 style="font-size:15px; font-weight:800; color:#0F172A; line-height:1.4; margin:0 0 10px 0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
            <a href="<?php echo esc_url(get_permalink($post_item->ID)); ?>" style="color:inherit; text-decoration:none;">
              <?php echo esc_html($post_item->post_title); ?>
            </a>
          </h3>
          <p style="font-size:13px; color:#64748B; line-height:1.5; margin:0 0 16px 0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; flex:1;">
            <?php echo esc_html(get_the_excerpt($post_item->ID) ?: wp_trim_words($post_item->post_content, 20)); ?>
          </p>
          <a href="<?php echo esc_url(get_permalink($post_item->ID)); ?>" style="font-size:13px; font-weight:700; color:#2563EB; text-decoration:none; display:inline-flex; align-items:center; gap:4px;">
            Đọc tiếp →
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============================
     SHOWROOM INFO
     ============================ -->
<section class="vf-section vf-section-alt" id="gioi-thieu">
  <div class="container">
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">
      <div>
        <div class="vf-section-label">Về chúng tôi</div>
        <h2 style="font-size:clamp(1.6rem,3vw,2.2rem); font-weight:800; margin-bottom:20px; line-height:1.25;">
          Đại lý VinFast Tân Á Châu
        </h2>
        <p style="color:var(--vf-text-muted); line-height:1.8; margin-bottom:24px;">
          Chúng tôi là đại lý ủy quyền chính thức của VinFast Tân Á Châu, cam kết mang đến
          trải nghiệm mua xe tốt nhất với đội ngũ tư vấn chuyên nghiệp, tận tâm.
        </p>

        <div style="display:flex; flex-direction:column; gap:12px; margin-bottom:32px;">
          <div style="display:flex; align-items:center; gap:12px; font-size:14px;">
            <span style="color:var(--vf-blue); font-size:1.2rem;">📍</span>
            <span>191 Đường Hùng Vương, Phường Vĩnh Yên, Tỉnh Phú Thọ , Vinh Yen, Vietnam</span>
          </div>
          <div style="display:flex; align-items:center; gap:12px; font-size:14px;">
            <span style="color:var(--vf-blue); font-size:1.2rem;">📞</span>
            <a href="tel:0562256256" style="color:var(--vf-text); font-weight:600;">056 225 6256</a>
          </div>
          <div style="display:flex; align-items:center; gap:12px; font-size:14px;">
            <span style="color:var(--vf-blue); font-size:1.2rem;">✉️</span>
            <a href="mailto:phuocvandangdilam@gmail.com" style="color:var(--vf-text); font-weight:600;">phuocvandangdilam@gmail.com</a>
          </div>
          <div style="display:flex; align-items:center; gap:12px; font-size:14px;">
            <span style="color:var(--vf-blue); font-size:1.2rem;">🕐</span>
            <span>Mở cửa: 8:00 – 21:00 (Thứ 2 – Chủ nhật)</span>
          </div>
        </div>

        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <a href="<?php echo home_url('/tim-kiem-showroom-tram-sac/'); ?>" class="vf-btn vf-btn-primary">
            XEM BẢN ĐỒ
          </a>
          <a href="tel:0562256256" class="vf-btn vf-btn-outline">
            GỌI NGAY: 056 225 6256
          </a>
        </div>
      </div>

      <!-- Google Maps placeholder -->
      <div style="border-radius:12px; overflow:hidden; height:320px; background:var(--vf-bg-gray); position:relative;">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59636.23!2d105.59!3d21.32!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f79a0cdc24f9%3A0x7e4ef9b4ee9bf6b3!2sVĩnh%20Yên%2C%20Vĩnh%20Phúc!5e0!3m2!1svi!2s!4v1634567890123!5m2!1svi!2s"
          width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

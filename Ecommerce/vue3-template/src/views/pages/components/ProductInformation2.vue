<template>
  <div class="container-fluid text-start bg-white">
    <div class="row p-3">
      <div class="col-12 p-3 fs-4 mb-4 bg-f9f9f9">{{ data.productDetailTitle }}</div>
      <div class="col-lg-2 col-sm-3 col-4 fw-light">
        <p>{{ data.categoryText }}</p>
        <p>{{ data.brandText }}</p>
        <p>{{ data.typeText }}</p>
        <p>{{ data.stockText }}</p>
        <p>{{ data.shippedFromText }}</p>
      </div>
      <div class="col-lg-10 col-sm-9 col-8">
        <p><span class="font-color_green">{{ data.categoryValue }}</span></p>
        <p><span class="font-color_green">{{ data.brandValue }}</span></p>
        <p>{{ data.typeValue }}</p>
        <p>{{ data.stockValue }}</p>
        <p>{{ data.shippedFromValue }}</p>
      </div>

      <div class="col-12 p-3 fs-4 mb-4 bg-f9f9f9">{{ data.descriptionTitle }}</div>
      <div class="col-12">
        <p>{{ data.descriptionText1 }}</p>
        <p v-html="data.featuresText"></p>
        <p v-html="data.legalText"></p>
        <p v-html="data.warrantyText"></p>
        <p v-html="data.guideText"></p>
        <p v-html="data.policiesText"></p>
        <p v-html="data.referenceText"></p>
        <p>{{ data.convenienceText }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const data = ref({
  productDetailTitle: 'CHI TIẾT SẢN PHẨM',
  categoryText: 'Danh mục',
  brandText: 'Thương hiệu',
  typeText: 'Loại laptop',
  stockText: 'Kho hàng',
  shippedFromText: 'Gửi từ',

  categoryValue: 'Shop / Máy tính & Laptop / Laptop',
  brandValue: 'Apple',
  typeValue: 'Khác',
  stockValue: '180',
  shippedFromValue: 'Bắc Ninh',

  descriptionTitle: 'MÔ TẢ SẢN PHẨM',
  descriptionText1: 'Máy tính xách tay mỏng và nhẹ nhất của Apple, nay siêu mạnh mẽ với chip Apple M1. Xử lý công việc giúp bạn với CPU 8 lõi nhanh như chớp. Đưa các ứng dụng và game có đồ họa khủng lên một tầm cao mới với GPU 7 lõi. Đồng thời, tăng tốc các tác vụ máy học với Neural Engine 16 lõi. Tất cả gói gọn trong một thiết kế không quạt, giảm thiểu tiếng ồn, thời lượng pin dài nhất từ trước đến nay lên đến 18 giờ (1) MacBook Air. Vẫn cực kỳ cơ động. Mà mạnh mẽ hơn nhiều.',

  featuresText: `Tính năng nổi bật <br />• Chip M1 do Apple thiết kế tạo ra một cú nhảy vọt về hiệu năng máy học, CPU và GPU <br />• Tăng thời gian sử dụng với thời lượng pin lên đến 18 giờ (1) <br />• CPU 8 lõi cho tốc độ nhanh hơn đến 3.5x, xử lý công việc nhanh chóng hơn bao giờ hết (2) <br />• GPU lên đến 7 lõi với tốc độ xử lý đồ họa nhanh hơn đến 5x cho các ứng dụng và game đồ họa khủng (2) <br />• Neural Engine 16 lõi cho công nghệ máy học hiện đại <br />• Bộ nhớ thống nhất 8GB giúp bạn làm việc gì cũng nhanh chóng và trôi chảy <br />• Ổ lưu trữ SSD siêu nhanh giúp mở các ứng dụng và tập tin chỉ trong tích tắc <br />• Thiết kế không quạt giảm tối đa tiếng ồn khi sử dụng <br />• Màn hình Retina 13.3 inch với dải màu rộng P3 cho hình ảnh sống động và chi tiết ấn tượng (3) <br />• Camera FaceTime HD với bộ xử lý tín hiệu hình ảnh tiên tiến cho các cuộc gọi video đẹp hình, rõ tiếng hơn <br />• Bộ ba micro phối hợp tập trung thu giọng nói của bạn, không thu tạp âm môi trường <br />• Wi-Fi 6 thế hệ mới giúp kết nối nhanh hơn <br />• Hai cổng Thunderbolt / USB 4 để sạc và kết nối phụ kiện <br />• Bàn phím Magic Keyboard có đèn nền và Touch ID giúp mở khóa và thanh toán an toàn hơn <br />• macOS Big Sur với thiết kế mới đầy táo bạo cùng nhiều cập nhật quan trọng cho các ứng dụng Safari, Messages và Maps <br />• Hiện có màu vàng kim, xám bạc và bạc`,

  legalText: `Pháp lý <br />Hiện có sẵn các lựa chọn để nâng cấp. <br />(1) Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình. Truy cập apple.com/batteries để biết thêm thông tin. <br />(2) So với thế hệ máy trước. <br />(3) Kích thước màn hình tính theo đường chéo.`,

  warrantyText: `Thông tin bảo hành: <br />Bảo hành: 12 tháng kể từ ngày kích hoạt sản phẩm. <br />Kích hoạt bảo hành tại: <a href="https://checkcoverage.apple.com/vn/en/" class="a-black">https://checkcoverage.apple.com/vn/en/</a>`,

  guideText: `Hướng dẫn kiểm tra địa điểm bảo hành gần nhất: <br />Bước 1: Truy cập vào đường link <a href="https://getsupport.apple.com/?caller=grl&locale=en_VN" class="a-black">https://getsupport.apple.com/?caller=grl&locale=en_VN</a> <br />Bước 2: Chọn sản phẩm. <br />Bước 3: Điền Apple ID, nhập mật khẩu. <br />Sau khi hoàn tất, hệ thống sẽ gợi ý những trung tâm bảo hành gần nhất.`,

  policiesText: `Tại Việt Nam, về chính sách bảo hành và đổi trả của Apple, "sẽ được áp dụng chung" theo các điều khoản được liệt kê dưới đây: <br />1) Chính sách chung: <a href="https://www.apple.com/legal/warranty/products/warranty-rest-of-apac-vietnamese.html" class="a-black">https://www.apple.com/legal/warranty/products/warranty-rest-of-apac-vietnamese.html</a> <br />2) Chính sách cho phụ kiện: <a href="https://www.apple.com/legal/warranty/products/accessory-warranty-vietnam.html" class="a-black">https://www.apple.com/legal/warranty/products/accessory-warranty-vietnam.html</a> <br />3) Các trung tâm bảo hành Apple ủy quyền tại Việt Nam: <a href="https://getsupport.apple.com/repair-locations?locale=vi_VN" class="a-black">https://getsupport.apple.com/repair-locations?locale=vi_VN</a> <br />Qúy khách vui lòng đọc kỹ hướng dẫn và quy định trên các trang được Apple công bố công khai, Shop chỉ có thể hỗ trợ theo đúng chính sách được đăng công khai của thương hiệu Apple tại Việt Nam.`,

  referenceText: `Bài viết tham khảo chính sách hỗ trợ của nhà phân phối tiêu biểu: <br /><a href="https://synnexfpt.com/bao-hanh/chinh-sach-bao-hanh/?agency-group=1&agency-slug=san-pham-apple" class="a-black">https://synnexfpt.com/bao-hanh/chinh-sach-bao-hanh/?agency-group=1&agency-slug=san-pham-apple</a>`,

  convenienceText: `Để thuận tiện hơn trong việc xử lý khiếu nại, đơn hàng của Brand Apple thường có giá trị cao, Qúy khách mua hàng vui lòng quay lại Clip khui mở kiện hàng (khách quan nhất có thể, đủ 6 mặt) giúp Shopee có thêm căn cứ để làm việc với các bên và đẩy nhanh tiến độ xử lý giúp Qúy khách mua hàng.`,
});
</script>

<style>

</style>

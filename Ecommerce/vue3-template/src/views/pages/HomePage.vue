<template>
  <page-layout>
    <div class="container-fluid text-center">
      <div class="row">
        <div class="container-fluid container-fluid-main">
          <div class="row">
            <div class="col-12 px-7 d-flex justify-content-center mt-5">
              <HomeCarouse />
            </div>
          </div>
          <div class="row px-7">
            <div class="col-12 mt-5" style="background-color: white">
              <HomeContent />
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <hr class="border border-success border-3 opacity-75 my-0" />
        <div class="col-12 text-start px-7 pt-5">
          <p>
            <b>{{ appData.intro.title }}</b> - {{ appData.intro.description }}
          </p>
          <p class="fw-bolder">
            {{ appData.sellingPoints.title }}
          </p>
          <p>
            {{ appData.sellingPoints.description }}
          </p>
          <p>
            {{ appData.sellerBenefits.description }}
          </p>
          <p>
            {{ appData.shippingInfo.description }}
          </p>
          <p class="fw-bolder">
            {{ appData.trendingKeywords.title }}
          </p>
          <p>
            <span
              v-for="(keyword, index) in appData.trendingKeywords.keywords"
              :key="index"
            >
              {{ keyword
              }}<span
                v-if="index < appData.trendingKeywords.keywords.length - 1"
              >
                |
              </span>
            </span>
          </p>
          <hr class="my-5" />
          <p class="fw-bolder">{{ appData.categories.title }}</p>
          <div class="container-fluid">
            <div class="row" style="font-size: 13px">
              <div
                v-for="(category, categoryIndex) in appData.categories.items"
                :key="categoryIndex"
                class="col-lg-3 col-sm-6 col-12"
              >
                <p>
                  <b>{{ category.category }}</b>
                </p>
                <p>
                  <span
                    v-for="(product, productIndex) in category.products"
                    :key="productIndex"
                  >
                    {{ product
                    }}<span v-if="productIndex < category.products.length - 1">
                      |
                    </span>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </page-layout>
</template>

<script setup>
import PageLayout from "@/layouts/PageLayout.vue";
import HomeCarouse from "@/views/pages/components/HomeCarousel.vue";
import HomeContent from "@/views/pages/components/HomeContent.vue";

const appData = {
  intro: {
    title: "Shoop",
    description:
      "ứng dụng mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Shoop là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á, có trụ sở chính ở Singapore, đã có mặt ở khắp các khu vực Singapore, Malaysia, Indonesia, Thái Lan, Philippines. Với sự đảm bảo của Shoop, bạn sẽ mua hàng trực tuyến an tâm và nhanh chóng hơn bao giờ hết!",
  },
  sellingPoints: {
    title: "MUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN",
    description:
      "Nếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Shoop.vn là một sự lựa chọn tuyệt vời dành cho bạn. Shoop là trang thương mại điện tử cho phép người mua và người bán tương tác và trao đổi dễ dàng thông tin về sản phẩm và chương trình khuyến mãi của shop. Do đó, việc mua bán trên Shoop trở nên nhanh chóng và đơn giản hơn. Bạn có thể trò chuyện trực tiếp với nhà bán hàng để hỏi trực tiếp về mặt hàng cần mua. Còn nếu bạn muốn tìm mua những dòng sản phẩm chính hãng, uy tín, Shoop chính là sự lựa chọn lí tưởng dành cho bạn. Để bạn có thể dễ dàng khi tìm hiểu và sử dụng sản phẩm, Shoop Blog - trang blog thông tin chính thức của Shoop - sẽ giúp bạn có thể tìm được cho mình các kiến thức về xu hướng thời trang, review công nghệ, mẹo làm đẹp, tin tức tiêu dùng và deal giá tốt bất ngờ.",
  },
  sellerBenefits: {
    description:
      "Đến với Shoop, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. Chỉ với vài thao tác trên ứng dụng, bạn đã có thể đăng bán ngay những sản phẩm của mình. Không những thế, các nhà bán hàng có thể tự tạo chương trình khuyến mãi trên Shoop để thu hút người mua với những sản phẩm có mức giá hấp dẫn. Khi đăng nhập tại Shoop Kênh người bán, bạn có thể dễ dàng phân loại sản phẩm, theo dõi đơn hàng, chăm sóc khách hàng và cập nhập ngay các hoạt động của shop.",
  },
  shippingInfo: {
    description:
      "Bên cạnh đó, Shoop hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,... nhằm cung cấp dịch vu giao nhận và vận chuyển tiện lợi cho cả khách hàng và người bán. Cùng với nhiều ưu đãi với chi phí giao hàng hợp lý, Shoop đảm bảo cho khách hàng trải nghiệm mua sắm thuận tiện nhất.",
  },
  trendingKeywords: {
    title: "TOP TỪ KHÓA XU HƯỚNG",
    keywords: [
      "pandora",
      "vaseline",
      "trang trí tết",
      "máy nước nóng trực tiếp",
      "vợt cầu lông",
      "dexeryl",
      "vascara",
      "myherbalife",
      "hasaki",
      "flower knows",
      "avakids",
      "đèn sưởi nhà tắm",
      "kem nẻ",
      "kidsplaza",
      "vnb",
      "wind breaker",
      "ghế massage toàn thân",
      "pin",
      "thỏi vàng",
      "concung",
      "móng tay đẹp",
      "bao cao su",
      "yonex",
      "truyện tranh đam mỹ",
      "tô tượng",
      "lego",
      "memoryzone",
      "mwc",
      "gấu dâu",
      "ivy moda",
    ],
  },
  categories: {
    title: "Danh mục",
    items: [
      {
        category: "THỜI TRANG NAM",
        products: [
          "Áo Khoác",
          "Áo Vest và Blazer",
          "Áo Hoodie, Áo Len & Áo Nỉ",
          "Quần Jeans",
          "Quần Dài/Quần Âu",
          "Quần Short",
          "Áo",
          "Áo Ba Lỗ",
          "Đồ Lót",
          "Đồ Ngủ",
          "Đồ Bộ",
          "Vớ/Tất",
          "Trang PhụcTruyền Thống",
          "Đồ Hóa Trang",
          "Trang Phục Ngành Nghề",
          "Khác",
          "Trang Sức Nam",
          "Kính Mắt Nam",
          "Thắt Lưng Nam",
          "Cà vạt & Nơ cổ",
          "Phụ Kiện Nam",
        ],
      },
      {
        category: "THỜI TRANG NỮ",
        products: [
          "Quần",
          "Quần đùi",
          "Chân váy",
          "Quần jeans",
          "Đầm/Váy",
          "Váy cưới",
          "Đồ liền thân",
          "Áo khoác, Áo choàng & Vest",
          "Áo len & Cardigan",
          "Hoodie và Áo nỉ",
          "Bộ",
          "Đồ lót",
          "Đồ ngủ",
          "Áo",
          "Đồ tập",
          "Đồ Bầu",
          "Đồ truyền thống",
          "Đồ hóa trang",
          "Vải",
          "Vớ/ Tất",
          "Khác",
        ],
      },
      {
        category: "ĐIỆN THOẠI & PHỤ KIỆN",
        products: [
          "Điện thoại",
          "Máy tính bảng",
          "Pin Dự Phòng",
          "Pin Gắn Trong, Cáp và Bộ Sạc",
          "Ốp lưng, bao da, Miếng dán điện thoại",
          "Bảo vệ màn hình",
          "Đế giữ điện thoại",
          "Thẻ nhớ",
          "Sim",
          "Phụ kiện khác",
          "Thiết bị khác",
        ],
      },
      {
        category: "THIẾT BỊ ĐIỆN TỬ",
        products: [
          "Thiết bị đeo thông minh",
          "Phụ kiện tivi",
          "Máy Game Console",
          "Phụ kiện Console",
          "Đĩa game",
          "Linh phụ kiện",
          "Tai nghe nhét tai",
          "Loa",
          "Tivi",
          "Tivi Box",
          "Headphones",
        ],
      },
      {
        category: "SỨC KHỎE",
        products: [
          "Vật tư y tế",
          "Chống muỗi & xua đuổi côn trùng",
          "Thực phẩm chức năng",
          "Tã người lớn",
          "Hỗ trợ làm đẹp",
          "Hỗ trợ tình dục",
          "Dụng cụ massage và trị liệu",
          "Khác",
        ],
      },
      {
        category: "ĐỒNG HỒ",
        products: [
          "Đồng Hồ Nam",
          "Đồng Hồ Nữ",
          "Bộ Đồng Hồ & Đồng Hồ Cặp",
          "Đồng Hồ Trẻ Em",
          "Phụ Kiện Đồng Hồ",
          "Khác",
        ],
      },
    ],
  },
};
</script>

<style scoped>
.category_carusel {
  padding: 0;
}
</style>
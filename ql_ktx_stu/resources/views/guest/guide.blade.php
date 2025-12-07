@extends('guest.layouts.master')

@section('title', 'Hướng Dẫn')

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        📚 Hướng Dẫn Sử Dụng
                    </h2>
                    <div class="text-muted mt-1">
                        Hướng dẫn chi tiết về cách đăng ký nội trú và các bước tiếp theo
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Step 1 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">1️⃣</div>
                                <div>
                                    <h3 class="card-title">Chuẩn Bị Thông Tin Cần Thiết</h3>
                                    <p class="text-muted mt-2">
                                        Trước khi bắt đầu đăng ký, vui lòng chuẩn bị các thông tin sau:
                                    </p>
                                    <ul class="list-unstyled mt-3 ps-3">
                                        <li class="mb-2">
                                            <strong>✓ Mã Sinh Viên (MSSV)</strong> - Mã do trường cấp
                                        </li>
                                        <li class="mb-2">
                                            <strong>✓ Họ và Tên</strong> - Tên đầy đủ của bạn
                                        </li>
                                        <li class="mb-2">
                                            <strong>✓ Số Điện Thoại</strong> - Số điện thoại liên lạc
                                        </li>
                                        <li class="mb-2">
                                            <strong>✓ Địa Chỉ Hiện Tại</strong> - Nơi ở hiện tại
                                        </li>
                                        <li class="mb-2">
                                            <strong>✓ Lý Do Đăng Ký</strong> - Giải thích lý do bạn cần nội trú
                                        </li>
                                        <li class="mb-2">
                                            <strong>✓ Cấp Độ Ưu Tiên</strong> - Chọn mức ưu tiên phù hợp (nếu có)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">2️⃣</div>
                                <div>
                                    <h3 class="card-title">Truy Cập Trang Đăng Ký</h3>
                                    <p class="text-muted mt-2">
                                        Vào mục <strong>"Đăng Ký Nội Trú"</strong> trên trang chủ hoặc click vào nút dưới đây:
                                    </p>
                                    <a href="{{ route('guest.register') }}" class="btn btn-primary mt-3">
                                        🔗 Truy Cập Trang Đăng Ký
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">3️⃣</div>
                                <div>
                                    <h3 class="card-title">Điền Thông Tin Đăng Ký</h3>
                                    <p class="text-muted mt-2">
                                        Điền đầy đủ tất cả các trường thông tin:
                                    </p>
                                    <ul class="list-unstyled mt-3 ps-3">
                                        <li class="mb-2">
                                            <strong>Mã Sinh Viên:</strong> Nhập mã sinh viên chính xác (bắt buộc)
                                        </li>
                                        <li class="mb-2">
                                            <strong>Họ và Tên:</strong> Nhập tên đầy đủ (bắt buộc)
                                        </li>
                                        <li class="mb-2">
                                            <strong>Số Điện Thoại:</strong> Nhập số điện thoại liên lạc
                                        </li>
                                        <li class="mb-2">
                                            <strong>Địa Chỉ:</strong> Mô tả địa chỉ hiện tại của bạn
                                        </li>
                                        <li class="mb-2">
                                            <strong>Lý Do Đăng Ký:</strong> Giải thích tại sao bạn cần nội trú
                                        </li>
                                        <li class="mb-2">
                                            <strong>Cấp Độ Ưu Tiên:</strong> Chọn mức ưu tiên (nếu bạn là trường hợp đặc biệt)
                                        </li>
                                    </ul>
                                    <p class="text-danger mt-3">
                                        ⚠️ <strong>Lưu Ý:</strong> Mã sinh viên phải tồn tại trong danh sách chính thức của trường, nếu không đơn sẽ bị từ chối.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">4️⃣</div>
                                <div>
                                    <h3 class="card-title">Gửi Đơn Đăng Ký</h3>
                                    <p class="text-muted mt-2">
                                        Sau khi điền đầy đủ thông tin, click nút <strong>"Gửi Đơn Đăng Ký"</strong> để gửi đơn.
                                    </p>
                                    <p class="text-success mt-3">
                                        ✅ Nếu thành công, bạn sẽ nhận được thông báo xác nhận
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">5️⃣</div>
                                <div>
                                    <h3 class="card-title">Tra Cứu Trạng Thái Đơn</h3>
                                    <p class="text-muted mt-2">
                                        Để kiểm tra trạng thái đơn đăng ký của bạn, vào mục <strong>"Tra Cứu Trạng Thái"</strong>:
                                    </p>
                                    <a href="{{ route('guest.status') }}" class="btn btn-info mt-3">
                                        🔍 Tra Cứu Trạng Thái
                                    </a>
                                    <p class="text-muted mt-3">
                                        Nhập mã sinh viên để xem:
                                    </p>
                                    <ul class="list-unstyled ps-3">
                                        <li class="mb-2">✓ Trạng thái duyệt (Chờ duyệt / Được duyệt / Bị từ chối)</li>
                                        <li class="mb-2">✓ Ngày gửi đơn</li>
                                        <li class="mb-2">✓ Lý do từ chối (nếu có)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="badge badge-lg badge-primary me-3">6️⃣</div>
                                <div>
                                    <h3 class="card-title">Đơn Được Duyệt</h3>
                                    <p class="text-muted mt-2">
                                        Khi đơn được duyệt:
                                    </p>
                                    <ul class="list-unstyled mt-3 ps-3">
                                        <li class="mb-2">
                                            <strong>📧 Bạn sẽ nhận được email thông báo</strong>
                                        </li>
                                        <li class="mb-2">
                                            <strong>🔑 Tạo tài khoản đăng nhập:</strong> Tạo tài khoản để vào hệ thống sinh viên
                                        </li>
                                        <li class="mb-2">
                                            <strong>👤 Hoàn thiện hồ sơ:</strong> Cập nhật ảnh đại diện và thông tin cá nhân
                                        </li>
                                        <li class="mb-2">
                                            <strong>🏠 Xem phòng ở:</strong> Kiểm tra thông tin phòng ở được gán
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">❓ Câu Hỏi Thường Gặp (FAQ)</h3>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="faqAccordion">
                                <!-- FAQ 1 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            Làm sao để biết mã sinh viên của mình?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Mã sinh viên được trường cấp khi bạn nhập học. Bạn có thể tìm thấy nó trong:
                                            <ul class="mt-2">
                                                <li>Thẻ sinh viên</li>
                                                <li>Giấy xác nhận nhập học</li>
                                                <li>Hệ thống thông tin học sinh của trường (nếu có)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 2 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Bao lâu thì đơn được duyệt?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Thời gian duyệt đơn phụ thuộc vào số lượng đơn. Bình thường từ <strong>3-5 ngày làm việc</strong>.
                                            Bạn có thể kiểm tra trạng thái bất kỳ lúc nào bằng cách tra cứu mã sinh viên.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 3 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Có thể nộp lại đơn nếu bị từ chối không?
                                        </button>
                                    </h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Nếu đơn của bạn bị từ chối, bạn sẽ nhận được lý do chi tiết. Hãy liên hệ với phòng Đại học để được hỗ trợ nộp lại.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 4 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                            Cần chọn mức ưu tiên nào?
                                        </button>
                                    </h2>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Mức ưu tiên được sử dụng khi có quá nhiều đơn so với phòng ở. Sinh viên có hoàn cảnh khó khăn hoặc là 
                                            đối tượng đặc biệt có thể chọn mức ưu tiên cao hơn. Nếu không, chọn mức bình thường.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 5 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                            Cần liên hệ ai nếu gặp vấn đề?
                                        </button>
                                    </h2>
                                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Nếu gặp bất kỳ vấn đề nào, vui lòng liên hệ:
                                            <ul class="mt-2">
                                                <li><strong>📞 Phòng Đại học:</strong> (Số điện thoại)</li>
                                                <li><strong>📧 Email:</strong> (Email hỗ trợ)</li>
                                                <li><strong>📍 Trực tiếp:</strong> Ghé thăm phòng Đại học tại cơ sở chính</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>💡 Mẹo Hữu Ích:</strong>
                        <br>
                        • Kiểm tra kỹ mã sinh viên trước khi gửi đơn<br>
                        • Cung cấp lý do rõ ràng và chi tiết khi đăng ký<br>
                        • Giữ số điện thoại luôn hoạt động để nhận thông báo<br>
                        • Nếu mã sinh viên không có trong hệ thống, hãy liên hệ phòng Đại học để kiểm tra<br>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row mb-4">
                <div class="col-12 d-flex gap-2 flex-wrap">
                    <a href="{{ route('guest.register') }}" class="btn btn-primary">
                        ✏️ Đăng Ký Nội Trú
                    </a>
                    <a href="{{ route('guest.status') }}" class="btn btn-info">
                        🔍 Tra Cứu Trạng Thái
                    </a>
                    <a href="{{ route('guest.home') }}" class="btn btn-secondary">
                        🏠 Trang Chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-lg {
    font-size: 1.25rem;
    padding: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 50px;
    height: 50px;
}

.card {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border: none;
    margin-bottom: 1.5rem;
}

.card-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 0;
}

.list-unstyled li {
    line-height: 1.8;
    color: #555;
}

.accordion-button:not(.collapsed) {
    background-color: #e7f3ff;
    color: #0066cc;
}

.gap-2 {
    gap: 0.5rem;
}
</style>
@endsection

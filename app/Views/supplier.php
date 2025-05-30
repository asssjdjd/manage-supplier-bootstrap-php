<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('public/assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/assets/css/navbar.css') ?>">
    <title>Quản lý nhà cung cấp</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {

            .modal-dialog {
                margin: auto;
            }

            .modal-backdrop {
                display: none;
            }

            .modal-dialog {
                position: absolute;
                right: 0;
                left: 0;
                top: 10%;
                transform: translateX(0);
            }
        }


        .table-container {
            width: 100%;
            /* Đảm bảo thẻ cha có chiều rộng linh hoạt */
            overflow-x: auto;
            /* Tạo thanh cuộn ngang khi nội dung vượt quá */
        }

        .table {
            min-width: 100%;
            /* Đảm bảo bảng luôn chiếm ít nhất chiều rộng thẻ cha */
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="row">
            <!-- navbar -->
            <div class="col-sm-2 col-5">
                <div id="navbar" style="overflow: hidden;">
                    <div id="navbar_body">
                        <ul class="list-group">
                            <div class="group ">
                                <li class="list-group-item">
                                    <span class="me-3"><i class="fa-regular fa-circle-user"></i></span>
                                    <span>Menu</span>
                                </li>

                                <li class="list-group-item">
                                    <a href="dashboard.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-house"></i></span>
                                        <span>Bảng điều khiển</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="supplier.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-truck"></i></span>
                                        <span>Nhà cung cấp</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="contract.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-file-contract"></i></span>
                                        <span>Hợp đồng</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="transaction-history.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-clock"></i></span>
                                        <span>Lịch sử giao dịch</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="progress-evaluation.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-star"></i></span>
                                        <span>Đánh giá tiến độ</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="report.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-chart-column"></i></span>
                                        <span>Báo cáo</span>
                                    </a>
                                </li>
                                <!-- nut cuoi -->
                                <li class="list-group-item">
                                    <a href="send-notification.html" class="d-flex align-items-center"
                                        onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-bell"></i></span>
                                        <span>Gửi thông báo</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="login.html" class="d-flex align-items-center" onclick="setActive(this)">
                                        <span class="me-2"><i class="fa-solid fa-right-from-bracket"></i></span>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-7">
                <!-- Header -->
                <div id="header">
                    <div class="container">
                        <ul class="nav justify-content-between">
                            <div id="header-left">
                                <li class="nav-item">
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">NHÀ CUNG CẤP</h3>
                                </li>
                            </div>

                            <div id="header-right" class="d-inline-flex gap-5 mt-3 ms-5 me-md-5">
                                <li class="nav-item">
                                    <p class=" fs-3" aria-current="page" href="#">
                                        <i class="fa-solid fa-bell"></i>
                                    </p>
                                </li>
                                <li class="nav-item">
                                    <p class=" fs-3" aria-current="page" href="#">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </p>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
                <!-- content -->
                <div class="container">
                    <!-- search and filter -->
                    <div class="container-fluid bg-light py-3 border-bottom">
                        <div id="search-filter">
                            <div class="row mt-4"> 
                                     
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="col-md-4 col-sm-6 w-100">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Tìm kiếm theo tên hoặc mã hợp đồng">
                                            <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <div class="col-6 col-md-4 me-md-0 me-4">
                                        <select class="form-select" aria-label="Lọc theo loại dịch vụ">
                                            <option selected>Lọc theo loại dịch vụ</option>
                                            <option value="ve sinh">Vệ sinh</option>
                                            <option value="dien">Điện</option>
                                            <option value="bao tri">Bảo trì</option>
                                        </select>
                                    </div>

                                    <div class="col-6 col-md-3 me-3">
                                        <button class="btn btn-md btn-success w-75" data-bs-toggle="modal"
                                            data-bs-target="#supplierModal">
                                            Thêm
                                        </button>
                                    </div>

                                    <div class="modal fade" id="supplierModal" tabindex="-1"
                                        aria-labelledby="supplierModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 60%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="supplierModalLabel">Thêm nhà cung cấp
                                                        mới
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <!-- Tên nhà cung cấp -->
                                                        <div class="mb-3">
                                                            <label for="supplierName" class="form-label">Tên nhà cung
                                                                cấp</label>
                                                            <input type="text" class="form-control" id="supplierName"
                                                                placeholder="Nhập tên nhà cung cấp" required>
                                                        </div>

                                                        <!-- Loại dịch vụ -->
                                                        <div class="mb-3">
                                                            <label for="serviceType" class="form-label">Loại dịch
                                                                vụ</label>
                                                            <select class="form-select" id="serviceType" required>
                                                                <!-- có thể thay đổi khi dữ liệu có -->
                                                                <option value="">Chọn loại dịch vụ</option>
                                                                <option value="vesinh">Vệ sinh</option>
                                                                <option value="dien">Điện</option>
                                                                <option value="baotri">Bảo trì</option>
                                                            </select>
                                                        </div>

                                                        <!-- Mô tả dịch vụ -->
                                                        <div class="mb-3">
                                                            <label for="serviceDescription" class="form-label">Mô tả
                                                                dịch
                                                                vụ</label>
                                                            <textarea class="form-control" id="serviceDescription"
                                                                rows="3" placeholder="Mô tả chi tiết về dịch vụ"
                                                                required></textarea>
                                                        </div>

                                                        <!-- Thông tin liên hệ -->
                                                        <div class="mb-3">
                                                            <label for="contactEmail" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="contactEmail"
                                                                placeholder="Nhập email của nhà cung cấp" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="contactPhone" class="form-label">Số điện
                                                                thoại</label>
                                                            <input type="tel" class="form-control" id="contactPhone"
                                                                placeholder="Nhập số điện thoại" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="contactAddress" class="form-label">Địa
                                                                chỉ</label>
                                                            <input type="text" class="form-control" id="contactAddress"
                                                                placeholder="Nhập địa chỉ nhà cung cấp" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="contactWebsite"
                                                                class="form-label">Website</label>
                                                            <input type="url" class="form-control" id="contactWebsite"
                                                                placeholder="Nhập website (nếu có)">
                                                        </div>

                                                        <!-- Ngày bắt đầu hợp tác -->
                                                        <div class="mb-3">
                                                            <label for="startDate" class="form-label">Ngày bắt đầu hợp
                                                                tác</label>
                                                            <input type="date" class="form-control" id="startDate"
                                                                required>
                                                        </div>

                                                        <!-- Trạng thái nhà cung cấp -->
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái nhà cung
                                                                cấp</label>
                                                            <select class="form-select" id="status" required>
                                                                <option value="">Chọn trạng thái</option>
                                                                <option value="active">Đang hoạt động</option>
                                                                <option value="inactive">Tạm ngừng</option>
                                                                <option value="cancelled">Đã hủy hợp đồng</option>
                                                            </select>
                                                        </div>

                                                        <!-- Ghi chú thêm -->
                                                        <div class="mb-3">
                                                            <label for="notes" class="form-label">Ghi chú thêm</label>
                                                            <textarea class="form-control" id="notes" rows="3"
                                                                placeholder="Thông tin thêm về nhà cung cấp"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary">Lưu thay đổi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list supplier -->
                    <div id="list-supper">
                        <div class="container table-container">
                            <h3 class="mt-4 mb-4">Danh Sách Nhà Cung Cấp</h3>
                            <table class="mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Loại dịch vụ</th>
                                        <th scope="col">Hợp đồng</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thông tin liên hệ</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="supplier-list">
                                    <!-- Dữ liê -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div id="paginate-supplier">
                            <nav aria-label="pagination-area-button">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Sau</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Modal: View Supplier Details -->
                    <div class="modal fade" id="viewSupplierModal" tabindex="-1"
                        aria-labelledby="viewSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewSupplierModalLabel">Chi tiết nhà cung cấp</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="viewSupplierModalBody">
                                    <!-- Details will be populated dynamically -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal: Update Supplier -->
                    <div class="modal fade" id="updateSupplierModal" tabindex="-1"
                        aria-labelledby="updateSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateSupplierModalLabel">Chỉnh sửa nhà cung cấp</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="updateName" class="form-label">Tên</label>
                                        <input type="text" class="form-control" id="updateName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateService" class="form-label">Loại dịch vụ</label>
                                        <input type="text" class="form-control" id="updateService">
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateContract" class="form-label">Hợp đồng</label>
                                        <input type="text" class="form-control" id="updateContract">
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateStatus" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="updateStatus">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="updateEmail">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary" id="saveUpdate">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal: Delete Confirmation -->
                    <div class="modal fade" id="deleteSupplierModal" tabindex="-1"
                        aria-labelledby="deleteSupplierModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteSupplierModalLabel">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body overflow-auto" id="deleteSupplierModalBody">
                                    <!-- Confirmation message will be populated dynamically -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= asset('public/assets/js/main.js') ?>"></script>
        <script src="<?= asset('public/assets/js/supplier.js') ?>"></script>

</html>
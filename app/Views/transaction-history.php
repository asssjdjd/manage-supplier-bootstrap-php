<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome CSS từ CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/main.css">
    <link rel="stylesheet" href="../../public/assets/css/navbar.css">
    <title>Lịch sử giao dịch</title>
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
            overflow-x: auto;
        }

        .table {
            min-width: 100%;
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
                                    <h3 class="mt-3 fs-3 fw-bold" href="#">LỊCH SỬ GIAO DỊCH</h3>
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

                <!-- Content -->
                <div class="container">
                    <!-- Search and Filter -->
                    <div class="container-fluid bg-light py-3 border-bottom">
                        <div id="search-filter">
                            <div class="row mt-4">
                               
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="col-md-4 col-sm-6 w-100">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Tìm kiếm giao dịch">
                                            <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex justify-content-between align-items-center">
                                    <div class="col-6 col-md-4 me-md-0 me-4">
                                        <select class="form-select" aria-label="Lọc theo trạng thái">
                                            <option selected>Lọc theo trạng thái</option>
                                            <option value="Hoàn thành">Hoàn thành</option>
                                            <option value="Trễ">Trễ</option>
                                            <option value="Đang tiến hành">Đang tiến hành</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-3 me-3">
                                        <button class="btn btn-md btn-success w-75" data-bs-toggle="modal"
                                            data-bs-target="#addTransactionModal">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction List -->
                    <div id="list-transactions">
                        <div class="container table-container">
                            <h3 class="mt-4 mb-4">Danh Sách Giao Dịch</h3>
                            <table class="mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Dịch vụ</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">Đánh giá</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="transaction-list">
                                    <!-- Transactions will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div id="paginate-transactions">
                            <nav aria-label="pagination-area-button">
                                <ul class="pagination justify-content-center" id="pagination">
                                    <!-- Pagination will be populated by JavaScript -->
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Modal: Add New Transaction -->
                    <div class="modal fade" id="addTransactionModal" tabindex="-1"
                        aria-labelledby="addTransactionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 60%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTransactionModalLabel">Thêm Giao Dịch Mới</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="transactionDate" class="form-label">Ngày</label>
                                            <input type="date" class="form-control" id="transactionDate" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transactionService" class="form-label">Dịch vụ</label>
                                            <select class="form-select" id="transactionService" required>
                                                <option value="">Chọn dịch vụ</option>
                                                <option value="Vệ sinh">Vệ sinh</option>
                                                <option value="Điện">Điện</option>
                                                <option value="Cơ khí">Cơ khí</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transactionStatus" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="transactionStatus" required>
                                                <option value="">Chọn trạng thái</option>
                                                <option value="Hoàn thành">Hoàn thành</option>
                                                <option value="Trễ">Trễ</option>
                                                <option value="Đang tiến hành">Đang tiến hành</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transactionNotes" class="form-label">Ghi chú (ngắn gọn)</label>
                                            <textarea class="form-control" id="transactionNotes" rows="3"
                                                placeholder="Nhập ghi chú"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transactionDocument" class="form-label">Tài liệu</label>
                                            <input type="file" class="form-control" id="transactionDocument"
                                                accept=".pdf,.jpg,.png">
                                        </div>
                                        <div class="mb-3">
                                            <label for="transactionEvaluation" class="form-label">Đánh giá</label>
                                            <input type="number" class="form-control" id="transactionEvaluation" min="1"
                                                max="10" placeholder="Đánh giá từ 1 đến 10">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="alert('Đã thêm giao dịch mới (Demo)!')">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal: Edit Transaction -->
                    <div class="modal fade" id="editTransactionModal" tabindex="-1"
                        aria-labelledby="editTransactionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 60%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTransactionModalLabel">Chỉnh Sửa Giao Dịch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="editTransactionDate" class="form-label">Ngày</label>
                                            <input type="date" class="form-control" id="editTransactionDate">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTransactionService" class="form-label">Dịch vụ</label>
                                            <select class="form-select" id="editTransactionService">
                                                <option value="Vệ sinh">Vệ sinh</option>
                                                <option value="Điện">Điện</option>
                                                <option value="Cơ khí">Cơ khí</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTransactionStatus" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="editTransactionStatus">
                                                <option value="Hoàn thành">Hoàn thành</option>
                                                <option value="Trễ">Trễ</option>
                                                <option value="Đang tiến hành">Đang tiến hành</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTransactionNotes" class="form-label">Ghi chú</label>
                                            <textarea class="form-control" id="editTransactionNotes"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTransactionDocument" class="form-label">Tài liệu</label>
                                            <input type="file" class="form-control" id="editTransactionDocument"
                                                accept=".pdf,.jpg,.png">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editTransactionEvaluation" class="form-label">Đánh giá</label>
                                            <input type="number" class="form-control" id="editTransactionEvaluation"
                                                min="1" max="10">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="alert('Đã cập nhật giao dịch (Demo)!')">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal: Delete Confirmation -->
                    <div class="modal fade" id="deleteTransactionModal" tabindex="-1"
                        aria-labelledby="deleteTransactionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteTransactionModalLabel">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn xóa giao dịch này? Hành động này không thể hoàn tác.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="alert('Đã xóa giao dịch (Demo)!')">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../public/assets/js/main.js"></script>
        <script src="../../public/assets/js/transaction-history.js"></script>
</body>

</html>
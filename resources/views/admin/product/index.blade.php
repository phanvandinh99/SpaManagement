@extends('admin.layoutAdmin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<main>
    <div class="container">
        <div class="page-title-container">
            <div class="row g-0">
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <h1 class="mb-0 pb-0 display-4" id="title">Product</h1>
                    </div>
                </div>
                <div class="w-100 d-md-none"></div>
                <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#discountAddModal">
                        <i data-cs-icon="plus"></i>
                        <span>Add New Product</span>
                    </button>
                </div>
            </div>
        </div>

       
        <div id="checkboxTable">
            <table id="product-table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <!-- Các cột khác -->
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Phần chi tiết sản phẩm -->
        <div class="modal modal-right fade" id="discountDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control" value="SUMMERSALE">
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label">Type</label>
                                <select class="select-single-no-search">
                                    <option label="&nbsp;"></option>
                                    <option value="Fixed Amount">Fixed Amount</option>
                                    <option value="Free Shipping">Free Shipping</option>
                                    <option value="Percentage" selected="selected">Percentage</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Start</label>
                                <input type="text" class="form-control date-picker-close" value="06/01/2020">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">End</label>
                                <input type="text" class="form-control date-picker-close" value="07/01/2020">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Limit</label>
                                <input type="text" class="form-control" value="5000">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usage</label>
                                <input type="text" class="form-control" value="2723" readonly="readonly">
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label">Status</label>
                                <select class="select-single-no-search">
                                    <option label="&nbsp;"></option>
                                    <option value="Active" selected="selected">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Expired">Expired</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="#" class="btn btn-icon btn-icon-only btn-outline-primary" data-delay='{"show":"500", "hide":"0"}' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-dismiss="modal">
                            <i data-cs-icon="bin"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-icon-end btn-primary" data-bs-dismiss="modal">
                            <span>Save</span>
                            <i data-cs-icon="save"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Phần chi tiết sản phẩm -->

        <!-- Phần thêm mới sản phẩm -->
        <form class="modal modal-right fade" id="discountAddModal" tabindex="-1" role="dialog" aria-hidden="true" action="/admin/product/store">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm mới sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Tên Sản Phẩm</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3 w-100">
                                <label class="form-label">Loại Sản Phẩm</label>
                                <select class="form-select">
                                    <option label="&nbsp;"></option>
                                    <option value="Fixed Amount">Fixed Amount</option>
                                    <option value="Free Shipping">Free Shipping</option>
                                    <option value="Percentage">Percentage</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình Ảnh</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá Bán</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô Tả</label>
                                <textarea name="description" id="CKEditor" rows="10" cols="80">Mô tả sản phẩm</textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary">Thêm Mới <i data-cs-icon="send"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END Phần thêm mới sản phẩm -->
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin/product') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    // Các cột khác
                ]
            });
        });
    </script>
<script>
    $(document).ready(function() {
        // Lấy danh sách các mục từ server
        $.ajax({
            url: '/items',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Xóa dữ liệu cũ trong tbody
                $('#item-table tbody').empty();

                // Duyệt qua danh sách các mục và thêm vào tbody
                $.each(response.data, function(index, item) {
                    var row = '<tr>' +
                        '<td>' + item.id + '</td>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + item.description + '</td>' +
                        '<td>' +
                        '<button class="btn btn-primary btn-edit" data-id="' + item.id + '">Edit</button>' +
                        '<button class="btn btn-danger btn-delete" data-id="' + item.id + '">Delete</button>' +
                        '</td>' +
                        '</tr>';
                    $('#item-table tbody').append(row);
                });
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi
            }
        });
    });
</script>

<script>
    // Hiển thị CKEditor
    CKEDITOR.replace('CKEditor');

    $(document).ready(function() {

        // Cấu hình Ajax CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Xử lý sự kiện submit form thêm sản phẩm
        $('#discountAddModal').submit(function(event) {
            event.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                contentType: "application/json",
                success: function(response) {
                    alert("success");
                    console.log("name: ", response.name)
                    alert("data: ", data);
                    // Thêm sản phẩm mới vào danh sách
                    var product = response;
                    var row = $('<tr><td>' + product.name + '</td><td>' + product.price + '</td><td><a href="#" class="edit-btn" data-id="' + product.id + '">Sửa</a> <a href="#" class="delete-btn" data-id="' + product.id + '">Xóa</a></td></tr>');
                    $('table tbody').append(row);

                    // Reset form
                    form.trigger('reset');
                }
            });
            alert("error");
        });
    });
</script>
@endsection
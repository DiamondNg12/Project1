<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Bộ lọc</h5>
                        </div>
                    </div>
                    <div class="card-body px-4">
                    <form method="GET" action="{{ route('khoa-dao-tao.index') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="ma_khoa_dao_tao" class="form-control" placeholder="Mã khoa đào tạo"
                                    value="{{ request('ma_khoa_dao_tao') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="ten_khoa_dao_tao" class="form-control" placeholder="Tên khoa đào tạo"
                                    value="{{ request('ten_khoa_dao_tao') }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Danh sách khoa đào tạo</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm
                                Khoa Đào tạo</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã khoa đào tạo</th>
                                        <th>Tên khoa đào tạo</th>
                                        <th>Ngày thành lập</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($khoa_dao_taos as $khoa_dao_tao)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $khoa_dao_tao->ma_khoa_dao_tao }}</td>
                                            <td>{{ $khoa_dao_tao->ten_khoa_dao_tao }}</td>
                                            <td>{{ \Carbon\Carbon::parse($khoa_dao_tao->ngay_thanh_lap)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                @if ($khoa_dao_tao->tinh_trang == 1)
                                                    <span class="badge bg-success">Đang hoạt động</span>
                                                @else
                                                    <span class="badge bg-danger">Ngưng hoạt động</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $data_object = json_encode($khoa_dao_tao);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}"
                                                    class="btn btn-sm btn-primary edit-button" role="button">Chỉnh
                                                    sửa</a>
                                                <a href="#" data-id="{{ $khoa_dao_tao->id }}"
                                                    data-name="{{ $khoa_dao_tao->ten_khoa_dao_tao }}"
                                                    class="btn btn-sm btn-danger delete-btn" role="button">Xoá</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="createNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Khoa Đào Tạo mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('khoa-dao-tao.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_khoa_dao_tao" class="form-label">Mã khoa đào tạo</label>
                            <input type="text" class="form-control" id="ma_khoa_dao_tao" name="ma_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ten_khoa_dao_tao" class="form-label">Tên khoa đào tạo</label>
                            <input type="text" class="form-control" id="ten_khoa_dao_tao" name="ten_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_thanh_lap" class="form-label">Ngày thành lập</label>
                            <input type="date" class="form-control" id="ngay_thanh_lap" name="ngay_thanh_lap">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ
                        bỏ</button>
                    <button type="button" class="btn btn-primary" id="submit-btn">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa Khoa đào tạo</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('khoa-dao-tao.update', ['khoa_dao_tao' => 0]) }}" method="POST" id="form-create">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_khoa_dao_tao" class="form-label">Mã khoa đào tạo</label>
                            <input type="text" class="form-control" id="ma_khoa_dao_tao" name="ma_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ten_khoa_dao_tao" class="form-label">Tên khoa đào tạo</label>
                            <input type="text" class="form-control" id="ten_khoa_dao_tao"
                                name="ten_khoa_dao_tao">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_thanh_lap" class="form-label">Ngày thành lập</label>
                            <input type="date" class="form-control" id="ngay_thanh_lap" name="ngay_thanh_lap">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ
                        bỏ</button>
                    <button type="button" class="btn btn-primary" id="submit-update-btn">Chỉnh sửa</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xoá Khoa đào tạo</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('khoa-dao-tao.destroy', ['khoa_dao_tao' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá khoa đào tạo: </h3>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ</button>
                    <button type="button" id="delete-submit-btn" class="btn btn-primary">Xoá</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var update_id = 0;
        var delete_id = 0;
        $('#create-new-btn').on('click', function() {
            $('#createNewModal').modal('show');
        });

        $('#submit-btn').on('click', function() {
            $('#form-create').submit();
        });

        $('.edit-button').on('click', function() {
            data = $(this).data('object');
            update_id = data.id;
            $('#editModal form').attr('action', '/khoa-dao-tao/' + update_id);
            $('#editModal #ma_khoa_dao_tao').val(data.ma_khoa_dao_tao);
            $('#editModal #ten_khoa_dao_tao').val(data.ten_khoa_dao_tao);
            $('#editModal #ngay_thanh_lap').val(data.ngay_thanh_lap);
            $('#editModal').modal('show');
        });

        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });


        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận xoá khoa đào tạo: ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/khoa-dao-tao/' + delete_id);
            $('#deleteModal').modal('show');
        });

        $('#delete-submit-btn').on('click', function() {
            $('#deleteModal form').submit();
        });

        $('.close-modal').on('click', function() {
            $('#createNewModal').modal('hide');
            $('#editModal').modal('hide');
            $('#deleteModal').modal('hide');
        });
    </script>


</x-app-layout>

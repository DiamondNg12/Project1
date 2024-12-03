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
                    <form method="GET" action="{{ route('khoa-hoc.index') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="ma_khoa_hoc" class="form-control" placeholder="Mã khoá học"
                                    value="{{ request('ma_khoa_hoc') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="ten_khoa_hoc" class="form-control" placeholder="Tên khóa học"
                                    value="{{ request('ten_khoa_hoc') }}">
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
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Danh sách khóa học</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm Khoá</a>
                       </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã khóa học</th>
                                        <th>Tên khóa học</th>
                                        <th>Ngày thành lập</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($khoa_hocs as $khoaHoc)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $khoaHoc->ma_khoa_hoc }}</td>
                                            <td>{{ $khoaHoc->ten_khoa_hoc }}</td>
                                            <td>{{ $khoaHoc->ngay_bat_dau }}</td>
                                            <td>
        
                                            @php
                                                    $data_object = json_encode($khoaHoc);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}"
                                                    class="btn btn-sm btn-primary edit-button" role="button">Chỉnh
                                                    sửa</a>
                                                <a href="#" data-id="{{ $khoaHoc->id }}"
                                                    data-name="{{ $khoaHoc->ten_khoa_hoc }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tạo Khoá Học mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('khoa-hoc.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_khoa_hoc" class="form-label">Mã khoá học</label>
                            <input type="text" class="form-control" id="ma_khoa_hoc" name="ma_khoa_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_khoa_hoc" class="form-label">Tên khoá học</label>
                            <input type="text" class="form-control" id="ten_khoa_hoc" name="ten_khoa_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Huỷ bỏ</button>
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa khoá học</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('khoa-hoc.update', ['khoa_hoc' => 0]) }}" method="POST" id="form-create">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_khoa_hoc" class="form-label">Mã khoá học</label>
                            <input type="text" class="form-control" id="ma_khoa_hoc" name="ma_khoa_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ten_khoa_hoc" class="form-label">Tên khoá học</label>
                            <input type="text" class="form-control" id="ten_khoa_hoc"
                                name="ten_khoa_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
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
                    <h5 class="modal-title" id="deleteModalLabel">Xoá khoá học</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('khoa-hoc.destroy', ['khoa_hoc' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá khoá học: </h3>
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
            $('#editModal form').attr('action', '/khoa-hoc/' + update_id);
            $('#editModal #ma_khoa_hoc').val(data.ma_khoa_hoc);
            $('#editModal #ten_khoa_hoc').val(data.ten_khoa_hoc);
            $('#editModal #ngay_bat_dau').val(data.ngay_bat_dau);
            $('#editModal').modal('show');
        });

        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });

        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận xoá khoá học: ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/khoa-hoc/' + delete_id);
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

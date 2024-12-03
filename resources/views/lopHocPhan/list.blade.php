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
                        <form method="GET" action="{{ route('lop-hoc-phan.index') }}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ma_lop_hoc" class="form-label">Mã lớp học phần</label>
                                        <input type="text" name="ma_lop_hoc_phan" class="form-control" id="ma_lop_hoc_phan" 
                                            value="{{ request('ma_lop_hoc_phan') }}" placeholder="Nhập mã lớp học phần">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ten_lop_hoc_phan" class="form-label">Tên lớp học phần</label>
                                        <input type="text" name="ten_lop_hoc_phan" class="form-control" id="ten_lop_hoc_phan" 
                                            value="{{ request('ten_lop_hoc_phan') }}" placeholder="Nhập tên lớp học phần">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="hoc_ki" class="form-label">Học kỳ</label>
                                        <input type="text" name="hoc_ki" class="form-control" id="hoc_ki" 
                                            value="{{ request('hoc_ki') }}" placeholder="Nhập học kỳ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="dot_hoc" class="form-label">Đợt học</label>
                                        <input type="text" name="dot_hoc" class="form-control" id="dot_hoc" 
                                            value="{{ request('dot_hoc') }}" placeholder="Nhập đợt học">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="ten_mon_hoc" class="form-label">Tên môn học</label>
                                        <input type="text" name="ten_mon_hoc" class="form-control" id="ten_mon_hoc" 
                                            value="{{ request('ten_mon_hoc') }}" placeholder="Nhập tên môn học">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="giang_vien" class="form-label">Giảng viên đứng lớp</label>
                                        <input type="text" name="giang_vien" class="form-control" id="giang_vien" 
                                            value="{{ request('giang_vien') }}" placeholder="Nhập giảng viên đứng lớp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 text-end">
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
                            <h5 class="card-title">Danh sách lớp học phần</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Lớp
                                học phần mới</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã lớp học phần</th>
                                        <th>Tên lớp học phần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Ngày mở đăng ki</th>
                                        <th>Ngày đóng đăng kí</th>
                                        <th>Địa điểm học</th>
                                        <th>Học kì</th>
                                        <th>Đợt học</th>
                                        <th>Tên môn học</th>
                                        <th>Sinh viên tối đa</th>
                                        <th>Giảng viên đứng lớp</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    @foreach ($lop_hoc_phans as $lop_hoc_phan)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $lop_hoc_phan->ma_lop_hoc_phan }}</td>
                                            <td>{{ $lop_hoc_phan->ten_lop_hoc_phan }}</td>
                                            <td>{{ $lop_hoc_phan->ngay_bat_dau }}</td>
                                            <td>{{ $lop_hoc_phan->ngay_ket_thuc }}</td>
                                            <td>{{ $lop_hoc_phan->mo_dang_ki }}</td>
                                            <td>{{ $lop_hoc_phan->dong_dang_ki }}</td>
                                            <td>{{ $lop_hoc_phan->dia_diem_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->hoc_ki }}</td>
                                            <td>{{ $lop_hoc_phan->dot_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->monHoc->ten_mon_hoc }}</td>
                                            <td>{{ $lop_hoc_phan->sv_toi_da }}</td>
                                            <td>{{ $lop_hoc_phan->giangVien->ho_ten }}</td>
                                            <td>
                                                @php
                                                    $data_object = json_encode($lop_hoc_phan);
                                                @endphp
                                                <a href="#" data-object="{{ $data_object }}"
                                                    class="btn btn-sm btn-primary edit-button" role="button">Chỉnh
                                                    sửa</a>
                                                <a href="#" data-id="{{ $lop_hoc_phan->id }}"
                                                    data-name="{{ $lop_hoc_phan->ten_lop_hoc_phan }}"
                                                    class="btn btn-sm btn-danger delete-btn" role="button">Xoá</a>
                                            </td>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tạo lớp học phần mới</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-phan.store') }}" method="POST" id="form-create">
                        @csrf
                        <div class="mb-3">
                            <label for="ma_lop_hoc_phan_create" class="form-label">Mã lớp học phần</label>
                            <input type="text" class="form-control" id="ma_lop_hoc_phan_create"
                                name="ma_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc_phan_create" class="form-label">Tên lớp học phần</label>
                            <input type="text" class="form-control" id="ten_lop_hoc_phan_create"
                                name="ten_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau_create" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau_create" name="ngay_bat_dau">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc_create" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="ngay_ket_thuc_create"
                                name="ngay_ket_thuc">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau_create" class="form-label">Ngày mở đăng kí</label>
                            <input type="date" class="form-control" id="ngay_mo_dang_ki_create"
                                name="ngay_mo_dang_ki">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc_create" class="form-label">Ngày khoá đăng kí</label>
                            <input type="date" class="form-control" id="ngay_khoa_dang_ki_create"
                                name="ngay_khoa_dang_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dia_diem_hoc_create" class="form-label">Địa điểm học</label>
                            <input type="text" class="form-control" id="dia_diem_hoc_create" name="dia_diem_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="hoc_ki_create" class="form-label">Học kì</label>
                            <input type="text" class="form-control" id="hoc_ki_create" name="hoc_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dot_hoc_create" class="form-label">Đợt học</label>
                            <input type="text" class="form-control" id="dot_hoc_create" name="dot_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mon_hoc_selector_create">Tên môn học</label>
                            <select class="form-select" id="mon_hoc_selector_create" name="ma_mon_hoc_id">
                                <option selected="" disabled="">Chọn Tên môn học</option>
                                @foreach ($mon_hocs as $mon_hoc)
                                    <option value="{{ $mon_hoc->id }}">{{ $mon_hoc->ten_mon_hoc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sv_toi_da_create" class="form-label">Sinh viên tối đa</label>
                            <input type="text" class="form-control" id="sv_toi_da_create" name="sv_toi_da">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="giang_vien_selector_create">Giảng viên đứng lớp</label>
                            <select class="form-select" id="giang_vien_selector_create" name="giang_vien">
                                <option selected="" disabled="">Chọn giảng viên</option>
                                @foreach ($giang_vien as $user)
                                    <option value="{{ $user->id }}">{{ $user->ho_ten }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa lớp học phần</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lop-hoc-phan.update', ['lop_hoc_phan' => 0]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ma_lop_hoc_phan" class="form-label">Mã lớp học phần</label>
                            <input type="text" class="form-control" id="ma_lop_hoc_phan" name="ma_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ten_lop_hoc_phan" class="form-label">Tên lớp học phần</label>
                            <input type="text" class="form-control" id="ten_lop_hoc_phan"
                                name="ten_lop_hoc_phan">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_bat_dau_create" class="form-label">Ngày mở đăng kí</label>
                            <input type="date" class="form-control" id="ngay_mo_dang_ki" name="ngay_mo_dang_ki">
                        </div>
                        <div class="mb-3">
                            <label for="ngay_ket_thuc_create" class="form-label">Ngày khoá đăng kí</label>
                            <input type="date" class="form-control" id="ngay_khoa_dang_ki"
                                name="ngay_khoa_dang_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dia_diem_hoc" class="form-label">Địa điểm học</label>
                            <input type="text" class="form-control" id="dia_diem_hoc" name="dia_diem_hoc">
                        </div>
                        <div class="mb-3">
                            <label for="hoc_ki" class="form-label">Học kì</label>
                            <input type="text" class="form-control" id="hoc_ki" name="hoc_ki">
                        </div>
                        <div class="mb-3">
                            <label for="dot_hoc" class="form-label">Đợt học</label>
                            <input type="text" class="form-control" id="dot_hoc" name="dot_hoc">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mon_hoc_selector_edit">Tên môn học</label>
                            <select class="form-select" id="mon_hoc_selector_edit" name="ma_mon_hoc_id">
                                <option selected="" disabled="">Chọn Tên môn học</option>
                                @foreach ($mon_hocs as $mon_hoc)
                                    <option value="{{ $mon_hoc->id }}">{{ $mon_hoc->ten_mon_hoc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sv_toi_da" class="form-label">Sinh viên tối đa</label>
                            <input type="text" class="form-control" id="sv_toi_da" name="sv_toi_da">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="giang_vien_selector_edit">Giảng viên đứng lớp</label>
                            <select class="form-select" id="giang_vien_selector_edit" name="giang_vien">
                                <option selected="" disabled="">Chọn giảng viên</option>
                                @foreach ($giang_vien as $user)
                                    <option value="{{ $user->id }}">{{ $user->ho_ten }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="deleteModalLabel">Xoá lớp học phần</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('lop-hoc-phan.destroy', ['lop_hoc_phan' => 0]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <h3 id="delete_title">Xác nhận xoá lớp học phần: </h3>
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
            console.log('Button clicked');
            $('#form-create').submit();
        });
        $('.edit-button').on('click', function() {
            data = $(this).data('object');
            update_id = data.id;
            $('#editModal form').attr('action', '/lop-hoc-phan/' + update_id);
            $('#editModal #ma_lop_hoc_phan').val(data.ma_lop_hoc_phan);
            $('#editModal #ten_lop_hoc_phan').val(data.ten_lop_hoc_phan);
            $('#editModal #ngay_bat_dau').val(data.ngay_bat_dau);
            $('#editModal #ngay_ket_thuc').val(data.ngay_ket_thuc);
            $('#editModal #dia_diem_hoc').val(data.dia_diem_hoc);
            $('#editModal #ngay_mo_dang_ki').val(data.mo_dang_ki);
            $('#editModal #ngay_dong_dang_ki').val(data.ngay_dong_dang_ki);
            $('#editModal #hoc_ki').val(data.hoc_ki);
            $('#editModal #dot_hoc').val(data.dot_hoc);
            $('#mon_hoc_selector_edit option[value="' + data.ma_mon_hoc_id + '"]').prop('selected', true);
            $('#editModal #sv_toi_da').val(data.sv_toi_da);
            $('#giang_vien_selector_edit option[value="' + data.giang_vien.id + '"]').prop('selected', true);
            $('#editModal').modal('show');
        });
        $('#submit-update-btn').on('click', function() {
            $('#editModal form').submit();
        });
        $('.delete-btn').on('click', function() {
            delete_id = $(this).data('id');
            $('#delete_title').text('Xác nhận lớp học phần : ' + $(this).data('name'));
            $('#deleteModal form').attr('action', '/lop-hoc-phan/' + delete_id);
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

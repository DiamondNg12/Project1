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
                    <div class="card-body px-0">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Mã sinh viên</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-primary">Tìm kiếm</button>
                            </div>
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
                            <h5 class="card-title">Danh sách user</h5>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-sm btn-primary" id="create-new-btn" role="button">Thêm user</a>
                       </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên sinh viên</th>
                                        <th>Mã sinh viên</th>
                                        <th>Ngày sinh</th>
                                        <th>Khoa đào tạo</th>
                                        <th>Khóa</th>
                                        <th>Lớp</th>
                                        <th>Giới tính</th>
                                        <th>CCCD</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td><img src="{{ $user->avatar }}" alt="avatar" width="50"></td>
                                    <td>{{ $user->ho_ten }}</td>
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->ngay_sinh }}</td>
                                    <td>{{ $user->khoa_dao_tao_id }}</td>
                                    <td>{{ $user->khoa_hoc_id }}</td>
                                    <td>{{ $user->lop_hoc_co_so_id }}</td>
                                    <td>{{ $user->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    <td>{{ $user->cccd }}</td>
                                    <td>{{ $user->dia_chi }}</td>
                                    <td>{{ $user->so_dien_thoai }}</td>
                                    <td>{{ $user->email }}</td>
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


</x-app-layout>
<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Hiển thị ảnh người dùng -->
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                <!-- Ảnh người dùng mặc định -->
                                <img src="{{ asset('images/avatars/01.png') }}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                            </div>
                        </div>
                    </div>
                    <!-- Hiển thị tên và mã số người dùng dưới ảnh -->
                    <div class="d-flex flex-wrap align-items-center">
                        <h4 class="me-2 h4">{{ old('ho_ten', 'Tên người dùng') }}</h4>
                        <span class="text-capitalize"> - {{ old('code', 'Mã số người dùng') }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="profile-content tab-content">
                    <div id="profile-profile" class="tab-pane fade active show">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="hoTen">Họ và tên:</label>
                <input type="text" class="form-control" id="hoTen" placeholder="Họ và tên" name="ho_ten" required>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="maSinhVien">Mã người dùng:</label>
                <input type="text" class="form-control" id="maNguoiDung" placeholder="Mã người dùng" name="code" required>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="ngaySinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngay_sinh">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Khoa đào tạo:</label>
                <select class="form-select" id="exampleFormControlSelect1" name="khoa_dao_tao_id">
                    <option selected disabled>Chọn khoa đào tạo</option>
                    @foreach($khoa_dao_taos as $khoa_dao_tao)
                        <option value="{{ $khoa_dao_tao->id }}">{{ $khoa_dao_tao->ten_khoa_dao_tao }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="exampleFormControlSelect2">Khóa học:</label>
                <select class="form-select" id="exampleFormControlSelect2" name="khoa_hoc_id">
                    <option selected disabled>Chọn khóa học</option>
                    @foreach($khoa_hocs as $khoa_hoc)
                        <option value="{{ $khoa_hoc->id }}">{{ $khoa_hoc->ten_khoa_hoc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="exampleFormControlSelect3">Lớp học:</label>
                <select class="form-select" id="exampleFormControlSelect3" name="lop_hoc_co_so_id">
                    <option selected disabled>Chọn lớp học</option>
                    @foreach($lop_hoc_co_sos as $lop_hoc_co_so)
                        <option value="{{ $lop_hoc_co_so->id }}">{{ $lop_hoc_co_so->ten_lop_hoc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="gioiTinh">Giới tính:</label><br>
                <input type="radio" id="nam" name="gioi_tinh" value="Nam"> Nam
                <input type="radio" id="nu" name="gioi_tinh" value="Nữ"> Nữ
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="userType">Loại user:</label>
                <input type="text" class="form-control" id="userType" placeholder="Loại User" name="user_type">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="tinhTrang">Tình trạng:</label><br>
                <input type="radio" id="active" name="tinh_trang" value="Hoạt động"> Hoạt động
                <input type="radio" id="inactive" name="tinh_trang" value="Không hoạt động"> Không hoạt động
            </div>
        </div>
    </div>
                                                                    
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary">Thêm user</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       
        $('#create-new-btn').on('click', function() {
            $('#createNewModal').modal('show');
        });
       
        $('#submit-btn').on('click', function() {
            console.log('Button clicked');
            $('#form-create').submit();
        });
       
        $('.close-modal').on('click', function() {
            $('#createNewModal').modal('hide');
        });
    </script>
</x-app-layout>

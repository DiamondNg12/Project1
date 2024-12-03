<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                <img src="{{ $profileImage ?? asset('images/avatars/01.png') }}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                    <h4 class="me-2 h4">{{ $auth->ho_ten }}</h4>
                                    <span class="text-capitalize"> - {{ str_replace('_', ' ', $auth->user_type) ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="profile-content tab-content">
                    <div id="profile-profile" class="tab-pane fade active show">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('users.create', $auth->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Các trường trên cùng một dòng -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="hoTen">Họ và tên:</label>
                                                <input type="text" class="form-control" id="hoTen" placeholder="Họ và tên"
                                                    value="{{ $auth->ho_ten ?? '' }}" name="ho_ten">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="maSinhVien">Mã sinh viên:</label>
                                                <input type="text" class="form-control" id="maSinhVien" placeholder="Mã sinh viên"
                                                    value="{{ $auth->code ?? '' }}" name="code">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="khoa">Khoa:</label>
                                                <input type="text" class="form-control" id="khoa" placeholder="Khoa" 
                                                    value="{{ $auth->khoa ?? '' }}" name="khoa">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Các trường trên một dòng nữa -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="khoaDaoTao">Khoa đào tạo:</label>
                                                <input type="text" class="form-control" id="khoaDaoTao" placeholder="Khoa đào tạo"
                                                    value="{{ $auth->khoaDaoTao ? $auth->khoaDaoTao->ten_khoa_dao_tao : '' }}"
                                                    name="khoa_dao_tao">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="lop">Lớp:</label>
                                                <input type="text" class="form-control" id="lop" placeholder="Lớp" 
                                                    value="{{ $auth->lop ?? '' }}" name="lop">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="danToc">Dân tộc:</label>
                                                <input type="text" class="form-control" id="danToc" placeholder="Dân tộc"
                                                    value="{{ $auth->dan_toc ?? '' }}" name="dan_toc">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Các trường tiếp theo -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="cccd">CCCD:</label>
                                                <input type="text" class="form-control" id="cccd" placeholder="CCCD"
                                                    value="{{ $auth->cccd ?? '' }}" name="cccd">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tonGiao">Tôn giáo:</label>
                                                <input type="text" class="form-control" id="tonGiao" placeholder="Tôn giáo"
                                                    value="{{ $auth->ton_giao ?? '' }}" name="ton_giao">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="ngaySinh">Ngày sinh:</label>
                                                <input type="date" class="form-control" id="ngaySinh" name="ngay_sinh"
                                                    value="{{ $auth->ngay_sinh ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Các trường cuối cùng -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="diaChi">Địa chỉ:</label>
                                                <input type="text" class="form-control" id="diaChi" placeholder="Địa chỉ"
                                                    value="{{ $auth->dia_chi ?? '' }}" name="dia_chi">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="soDienThoai">Số điện thoại:</label>
                                                <input type="tel" class="form-control" id="soDienThoai" placeholder="Số điện thoại"
                                                    value="{{ $auth->so_dien_thoai ?? '' }}" name="so_dien_thoai">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email"
                                                    value="{{ $auth->email ?? '' }}" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Giới tính -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gioiTinh">Giới tính:</label><br>
                                                <input type="radio" id="nam" name="gioi_tinh" value="Nam" 
                                                    {{ $auth->gioi_tinh == 'Nam' ? 'checked' : '' }}> Nam
                                                <input type="radio" id="nu" name="gioi_tinh" value="Nữ" 
                                                    {{ $auth->gioi_tinh == 'Nữ' ? 'checked' : '' }}> Nữ
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nút lưu thông tin -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.components.share-offcanvas')
</x-app-layout>

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
                                    <span class="text-capitalize"> -
                                        {{ str_replace('_', ' ', $auth->user_type) ?? '' }}</span>
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
                            {{-- <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title">THÔNG tin đào tạo</h4>
                                </div>
                            </div> --}}
                            <div class="card-body">

                                <form>
                                    <div class="row">
                                        <h5 class="card-title">Thông tin đào tạo</h5>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="hoTen">Họ và tên:</label>
                                                <input type="text" class="form-control" id="hoTen"
                                                    placeholder="Họ và tên" value="{{ $auth->ho_ten ?? '' }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="maSinhVien">Mã sinh viên:</label>
                                                <input type="text" class="form-control" id="maSinhVien"
                                                    placeholder="Mã sinh viên" value="{{ $auth->code ?? '' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="khoaDaoTao">Khoa đào tạo:</label>
                                                <input type="text" class="form-control" id="khoaDaoTao"
                                                    placeholder="Khoa đào tạo" value="{{ $auth->khoaDaoTao ? $auth->khoaDaoTao->ten_khoa_dao_tao : '' }}"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="khoaDaoTao">Khoá:</label>
                                                <input type="text" class="form-control" id="khoaDaoTao"
                                                    placeholder="Khoá" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="lop">Lớp:</label>
                                                <input type="text" class="form-control" id="lop"
                                                    placeholder="Lớp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="card-title">Thông tin khác</h5>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="danToc">Dân tộc:</label>
                                                <input type="text" class="form-control" id="danToc"
                                                    placeholder="Dân tộc">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tonGiao">Tôn giáo:</label>
                                                <input type="text" class="form-control" id="tonGiao"
                                                    placeholder="Tôn giáo">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="cccd">CCCD:</label>
                                                <input type="text" class="form-control" id="cccd"
                                                    placeholder="CCCD" value="{{ $auth->cccd ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="ngaySinh">Ngày sinh:</label>
                                                <input type="date" class="form-control" id="ngaySinh"
                                                    value="{{ $auth->ngay_sinh ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="diaChi">Địa chỉ:</label>
                                                <input type="text" class="form-control" id="diaChi"
                                                    placeholder="Địa chỉ" value="{{ $auth->dia_chi ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gioiTinh">Giới tính:</label><br>
                                                <input type="radio" id="nam" name="gioiTinh" value="Nam"> Nam
                                                <input type="radio" id="nu" name="gioiTinh" value="Nữ"> Nữ
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="soDienThoai">Số điện thoại:</label>
                                                <input type="tel" class="form-control" id="soDienThoai"
                                                    placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email">
                                            </div>
                                        </div>
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

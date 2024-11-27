<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4>Hệ thống thông tin cá nhân</h4>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="hoTen">Họ và tên:</label>
                                <input type="text" class="form-control" id="hoTen" placeholder="Họ và tên" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="maSinhVien">Mã sinh viên:</label>
                                <input type="text" class="form-control" id="maSinhVien" placeholder="Mã sinh viên" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="khoa">Khoa:</label>
                                <input type="text" class="form-control" id="khoa" placeholder="Khoa" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="danToc">Dân tộc:</label>
                                <input type="text" class="form-control" id="danToc" placeholder="Dân tộc" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tonGiao">Tôn giáo:</label>
                                <input type="text" class="form-control" id="tonGiao" placeholder="Tôn giáo" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cccd">CCCD:</label>
                                <input type="text" class="form-control" id="cccd" placeholder="CCCD" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ngaySinh">Ngày sinh:</label>
                                <input type="date" class="form-control" id="ngaySinh" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="diaChi">Địa chỉ:</label>
                                <input type="text" class="form-control" id="diaChi" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gioiTinh">Giới tính:</label><br>
                                <input type="radio" id="nam" name="gioiTinh" value="Nam" disabled> Nam
                                <input type="radio" id="nu" name="gioiTinh" value="Nữ" disabled> Nữ
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="soDienThoai">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="soDienThoai" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lop">Lớp:</label>
                                <input type="text" class="form-control" id="lop" placeholder="Lớp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="khoaDaoTao">Khoa đào tạo:</label>
                                <input type="text" class="form-control" id="khoaDaoTao" placeholder="Khoa đào tạo" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

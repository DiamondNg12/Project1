<x-app-layout>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Bộ lọc</h5>
                        </div>
                        {{-- <div class="card-action">
                             <a href="http://localhost/users/create" class="btn btn-sm btn-primary" role="button">Add User</a>
                        </div> --}}
                    </div>
                    <div class="card-body px-0">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput" class="form-label">Khoa</label>
                                    <input type="text" name="input" class="form-control" id="baseInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput1" class="form-label">Môn học</label>
                                    <input type="text" name="input1" class="form-control" id="baseInput1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput2" class="form-label">Giảng viên</label>
                                    <input type="text" name="input2" class="form-control" id="baseInput2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput3" class="form-label">Học kì</label>
                                    <input type="text" name="input3" class="form-control" id="baseInput3">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 ms-3">
                                    <label for="baseInput4" class="form-label">Tên lớp học phần</label>
                                    <input type="text" name="input4" class="form-control" id="baseInput4">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-primary">Search</button>
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
                            <h5 class="card-title">Danh sách môn học</h5>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive ">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lớp học phần</th>
                                        <th>Môn học</th>
                                        <th>Số tín chỉ</th>
                                        <th>Giảng viên</th>
                                        <th>Thời gian học</th>
                                        <th>Địa điểm</th>
                                        <th>Sĩ số</th>
                                        <th>Đã đăng kí</th>  
                                    </tr>
                                </thead>
                                @php
                                    $key = 1;
                                @endphp
                                <tbody>
                                    <!-- @foreach ([] as $user)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $user->getFullNameAttribute() }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" role="button">Edit</a>
                                                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-sm btn-danger" role="button">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach -->
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
</x-app-layout>

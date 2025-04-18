@extends('layouts.Adminlayout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Thêm Sinh Viên Mới</h1>

    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <!-- full_name -->
                <div class="form-group mb-3">
                    <label for="full_name">Họ và tên</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}">
                    @error('full_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- gender -->
                <div class="form-group mb-3">
                    <label for="gender">Giới tính</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Nam</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Nữ</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Khác</option>
                    </select>
                    @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- date_of_birth -->
                <div class="form-group mb-3">
                    <label for="date_of_birth">Ngày sinh</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- email -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- phone -->
                <div class="form-group mb-3">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- address -->
                <div class="form-group mb-3">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- submit -->
                <button type="submit" class="btn btn-primary">Lưu sinh viên</button>
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </form>
</div>
@endsection

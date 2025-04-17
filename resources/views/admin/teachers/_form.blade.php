<div class="mb-3">
     <label class="form-label">Mã giảng viên:</label>
     <input type="text" name="teacher_code" class="form-control" value="{{ old('teacher_code', $teacher?->teacher_code) }}" required>
 </div>
 
 <div class="mb-3">
     <label class="form-label">Họ và tên:</label>
     <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $teacher?->full_name) }}" required>
 </div>
 
 <div class="mb-3">
     <label class="form-label">Email:</label>
     <input type="email" name="email" class="form-control" value="{{ old('email', $teacher?->email) }}" required>
 </div>
 
 <div class="mb-3">
     <label class="form-label">Số điện thoại:</label>
     <input type="text" name="phone" class="form-control" value="{{ old('phone', $teacher?->phone) }}" required>
 </div>
 
 <div class="mb-3">
     <label class="form-label">Bộ môn:</label>
     <input type="text" name="department" class="form-control" value="{{ old('department', $teacher?->department) }}" required>
 </div>
 
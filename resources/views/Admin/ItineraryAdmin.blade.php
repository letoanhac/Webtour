<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
       
    </style>
</head>
<body>
    <div class="admin-layout">
        <nav class="sidebar">
            @include('Admin.blocks.left-menu')
        </nav>

        <main class="admin-content">
            @include('Admin.blocks.manage-top')
            <div class="container-fluid">
                <h2 class="text-center mb-4">Quản lý Tour</h2>
                <a href="{{ route('admin.tour.index') }}">
                    <button style="margin-bottom:30px;border-radius:20px;height:30px;width:180px;background: linear-gradient(135deg,rgb(195, 197, 200),rgb(89, 46, 110));">Quay lại</button>
                </a>
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead style="background-color: black; color: white;" class="text-center">
                            <tr style="background-color: black;">
                                <th>Ngày</th>
                                <th>Tiêu đề</th>
                                <th>Thêm URL cho ngày</th>
                                <th>Mô tả</th>
                                <th>Lưu ý</th>
                                <th style="width: 150px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($itineraries as $item)
                                <tr>
                                    <form method="POST" action="{{ route('admin.tour.itineraries.update', [$tour->tourID, $item->itineraryID]) }}">
                                        @csrf
                                        <td><input type="number" name="day" class="form-control" value="{{ $item->day }}" required min="1" /></td>
                                        <td><input type="text" name="title" class="form-control" value="{{ $item->title }}" required /></td>
                                        <td><input type="text" name="itineraryImageURL" class="form-control" value="{{ $item->itineraryImageURL }}" /></td>
                                        <td><input type="text" name="description" class="form-control" value="{{ $item->description }}" /></td>
                                        <td><input type="text" name="information" class="form-control" value="{{ $item->information }}" /></td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <button type="submit" class="btn btn-success btn-sm">Lưu</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.tour.itineraries.delete', [$tour->tourID, $item->itineraryID]) }}" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                            </div>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Chưa có lịch trình nào cho tour này.</td>
                                </tr>
                            @endforelse

                            {{-- Hàng thêm mới --}}
                            <form method="POST" action="{{ route('admin.tour.itineraries.store', $tour->tourID) }}">
                                @csrf
                                <tr>
                                    <td><input type="number" name="day" class="form-control" placeholder="Ngày" required min="1" /></td>
                                    <td><input type="text" name="title" class="form-control" placeholder="Tiêu đề" required /></td>
                                    <td><input type="text" name="itineraryImageURL" class="form-control" placeholder="Lịch trình" /></td>
                                    <td><input type="text" name="description" class="form-control" placeholder="Mô tả" /></td>
                                    <td><input type="text" name="information" class="form-control" placeholder="Thông tin" /></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm w-100">Thêm</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

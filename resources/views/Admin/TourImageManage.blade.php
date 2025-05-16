@include('User.blocks.header')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý ảnh Tour: {{ $tour->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
<div class="container py-4">
    <h2>Quản lý ảnh Tour: <strong>{{ $tour->title }}</strong></h2>
    <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Quay lại danh sách Tour</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Ngày tải lên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tour->images as $image)
                <tr>
                    <td>
                        <img src="{{ $image->imageURL }}" alt="Ảnh tour" style="max-height: 80px;">
                    </td>
                    <td>
                        <form action="{{ route('admin.tour.image.update', $image->imageID) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <input type="text" name="description" value="{{ $image->description }}" class="form-control me-2" required>
                            <button type="submit" class="btn btn-sm btn-success" title="Lưu mô tả"><i class="fas fa-save"></i></button>
                        </form>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($image->uploadDate)->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.tour.image.delete', $image->imageID) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá ảnh này?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" title="Xoá ảnh"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <tr>
                <form action="{{ route('admin.tour.image.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tourID" value="{{ $tour->tourID }}">
                    <td><input type="url" name="imageURL" class="form-control" placeholder="URL ảnh" required></td>
                    <td><input type="text" name="description" class="form-control" placeholder="Mô tả ảnh" required></td>
                    <td>—</td>
                    <td><button class="btn btn-primary btn-sm" title="Thêm ảnh"><i class="fas fa-plus"></i></button></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

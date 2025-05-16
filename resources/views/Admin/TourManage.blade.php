@include('User.blocks.header')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 30px;
        }
        h2 {
            margin-bottom: 20px;
        }
        table th, table td {
            vertical-align: middle !important;
        }
        .form-control {
            min-width: 100px;
        }
        .btn {
            padding: 4px 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Quản lý Tour</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Số lượng</th>
                    <th>Giá NL</th>
                    <th>Giá TE</th>
                    <th>Thời gian</th>
                    <th>Điểm đến</th>
                    <th>Trạng thái</th>
                    <th>Lịch trình</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                    <tr>
                        <form action="{{ route('admin.tour.update', $tour->tourID) }}" method="POST">
                            @csrf
                            <td><input name="title" class="form-control" value="{{ $tour->title }}"></td>
                            <td><input name="description" class="form-control" value="{{ $tour->description }}"></td>
                            <td><input name="quantity" type="number" class="form-control" value="{{ $tour->quantity }}"></td>
                            <td><input name="priceAdult" type="number" class="form-control" value="{{ $tour->priceAdult }}"></td>
                            <td><input name="priceChild" type="number" class="form-control" value="{{ $tour->priceChild }}"></td>
                            <td><input name="duration" class="form-control" value="{{ $tour->duration }}"></td>
                            <td><input name="destination" class="form-control" value="{{ $tour->destination }}"></td>
                            <td><input name="availability" class="form-control" value="{{ $tour->availability }}"></td>
                            <td><input name="itinerary" class="form-control" value="{{ $tour->itinerary }}"></td>
                            <td>
                                <a href="{{ route('admin.tour.image.manage', $tour->tourID) }}" class="btn btn-info btn-sm" title="Quản lý ảnh">
                                    <i class="fas fa-image"></i>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm" title="Lưu"><i class="fas fa-save"></i></button>
                            </td>
                        </form>
                    </tr>
                @endforeach

                <!-- Form thêm mới -->
                <tr>
                    <form action="{{ route('admin.tour.store') }}" method="POST">
                        @csrf
                        <td><input name="title" class="form-control" placeholder="Tiêu đề"></td>
                        <td><input name="description" class="form-control" placeholder="Mô tả"></td>
                        <td><input name="quantity" type="number" class="form-control" placeholder="Số lượng"></td>
                        <td><input name="priceAdult" type="number" class="form-control" placeholder="Giá NL"></td>
                        <td><input name="priceChild" type="number" class="form-control" placeholder="Giá TE"></td>
                        <td><input name="duration" class="form-control" placeholder="Thời gian"></td>
                        <td><input name="destination" class="form-control" placeholder="Điểm đến"></td>
                        <td><input name="availability" class="form-control" placeholder="Tình trạng"></td>
                        <td><input name="itinerary" class="form-control" placeholder="Lịch trình"></td>
                        <td>—</td>
                        <td>
                            <button class="btn btn-primary btn-sm" title="Thêm"><i class="fas fa-plus-circle"></i></button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

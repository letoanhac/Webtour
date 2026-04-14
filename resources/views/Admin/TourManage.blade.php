<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Quản lý Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
        table th, table td {
            vertical-align: middle !important;
        }
        .form-control {
            min-width: 120px;
        }
        .btn {
            padding: 4px 10px;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <nav class="sidebar">
            @include('Admin.blocks.left-menu')
        </nav>

        <main class="admin-content">
            <div class="container-fluid">
                <h2 class="text-center mb-4">Quản lý Tour</h2>

                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Thông tin</th>
                                <th>Chỗ trống</th>
                                <th>Lịch trình</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                                <tr>
                                    <form id="editTourForm{{ $tour->tourID }}" action="{{ route('admin.tour.update', $tour->tourID) }}" method="POST">
                                        @csrf
                                    </form>
                                    
                                    <td>
                                        <input name="title" class="form-control" value="{{ $tour->title }}" form="editTourForm{{ $tour->tourID }}">
                                    </td>
                                    <td>
                                        <button type="button" style="background-color: white;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editTourInfoModal{{ $tour->tourID }}" title="Quản lý Thông tin">
                                            <i class="fas fa-info-circle text-primary"></i>
                                        </button>
                                    </td>
                                    <td>{{ $tour->quantityleft }}</td>
                                    <td>
                                        <a style="background-color: white;" href="{{ route('admin.tour.itineraries.index', $tour->tourID) }}" class="btn btn-info btn-sm" title="Quản lý Lịch trình">
                                            <i class="fas fa-route"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tour.image.manage', $tour->tourID) }}" class="btn btn-info btn-sm" title="Quản lý ảnh">
                                            <i class="fas fa-image"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm" title="Lưu" form="editTourForm{{ $tour->tourID }}">
                                            <i class="fas fa-save"></i>
                                        </button>
                                        <form action="{{ route('admin.tour.destroy', $tour->tourID) }}" method="POST" class="m-0 d-inline-block" onsubmit="return confirm('Bạn có chắc không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                            <tr>
                                <form id="addTourForm" action="{{ route('admin.tour.store') }}" method="POST">
                                    @csrf
                                </form>
                                <td><input name="title" class="form-control" placeholder="Tiêu đề" required form="addTourForm"></td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTourInfoModal">
                                        <i class="fas fa-plus-circle me-1"></i>Thêm chi tiết
                                    </button>
                                </td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm" title="Thêm" form="addTourForm"><i class="fas fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    
    @include('Admin.blocks.overlay')

    <div class="modal fade" id="addTourInfoModal" tabindex="-1" aria-labelledby="addTourInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTourInfoModalLabel">Thông tin chi tiết Tour mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Khu vực</label>
                            <select name="domain" form="addTourForm" class="form-select">
                                <option value="b">Miền Bắc</option>
                                <option value="t">Miền Trung</option>
                                <option value="n">Miền Nam</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Số lượng khách tối đa</label>
                            <input type="number" name="quantity" form="addTourForm" class="form-control" value="20" min="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Thẻ (Tag)</label>
                        <input type="text" name="tag" form="addTourForm" class="form-control" placeholder="Ví dụ: Tour HOT, Khuyến mãi...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <textarea name="description" form="addTourForm" class="form-control" rows="3">Hướng dẫn viên nhiệt tình, lịch trình hấp dẫn...</textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Giá Người lớn (VNĐ)</label>
                            <input type="number" name="priceAdult" form="addTourForm" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Giá Trẻ em (VNĐ)</label>
                            <input type="number" name="priceChild" form="addTourForm" class="form-control" value="0" min="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Thời gian (VD: 3 ngày 2 đêm)</label>
                            <input type="text" name="time" form="addTourForm" class="form-control" placeholder="3 ngày 2 đêm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Điểm đến cụ thể</label>
                            <input type="text" name="destination" form="addTourForm" class="form-control" placeholder="Hà Nội, Vịnh Hạ Long...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Ngày bắt đầu</label>
                            <input type="date" name="startDate" form="addTourForm" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Ngày kết thúc</label>
                            <input type="date" name="endDate" form="addTourForm" class="form-control" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đã xong</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($tours as $tour)
        <div class="modal fade" id="editTourInfoModal{{ $tour->tourID }}" tabindex="-1" aria-labelledby="editTourInfoModalLabel{{ $tour->tourID }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTourInfoModalLabel{{ $tour->tourID }}">Chỉnh sửa Tour: {{ $tour->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Khu vực</label>
                                <select name="domain" form="editTourForm{{ $tour->tourID }}" class="form-select">
                                    <option value="b" {{ ($tour->domain ?? '') == 'b' ? 'selected' : '' }}>Miền Bắc</option>
                                    <option value="t" {{ ($tour->domain ?? '') == 't' ? 'selected' : '' }}>Miền Trung</option>
                                    <option value="n" {{ ($tour->domain ?? '') == 'n' ? 'selected' : '' }}>Miền Nam</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Số lượng khách tối đa</label>
                                <input type="number" name="quantity" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->quantity ?? 20 }}" min="1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Thẻ (Tag)</label>
                            <input type="text" name="tag" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->tag ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mô tả</label>
                            <textarea name="description" form="editTourForm{{ $tour->tourID }}" class="form-control" rows="3">{{ $tour->description ?? '' }}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Giá Người lớn (VNĐ)</label>
                                <input type="number" name="priceAdult" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->priceAdult ?? 0 }}" min="0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Giá Trẻ em (VNĐ)</label>
                                <input type="number" name="priceChild" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->priceChild ?? 0 }}" min="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Thời gian</label>
                                <input type="text" name="time" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->time ?? '' }}" placeholder="3 ngày 2 đêm">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Điểm đến cụ thể</label>
                                <input type="text" name="destination" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->destination ?? '' }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Ngày bắt đầu</label>
                                <input type="date" name="startDate" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->startDate ?? date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Ngày kết thúc</label>
                                <input type="date" name="endDate" form="editTourForm{{ $tour->tourID }}" class="form-control" value="{{ $tour->endDate ?? date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đã xong</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

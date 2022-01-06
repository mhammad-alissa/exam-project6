<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content text-right">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-right">إاضافة صنف</h5>
                    </div>
                    <form method="post" action="{{ route('manage_categories.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                                @csrf
                                {{-- @include('alerts.success') --}}
                                <div class="form-group">
                                    <label>الصنف</label>
                                    <input type="text" name="category_name" class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}" placeholder="الصنف">
                                    {{-- @include('alerts.feedback', ['field' => 'category_name']) --}}
                                </div>
                                <div class="form-group">
                                  <label>الوصف</label>
                                  <input type="text" name="category_description" class="form-control {{ $errors->has('category_description') ? ' is-invalid' : '' }}" placeholder="الوصف">
                                  {{-- @include('alerts.feedback', ['field' => 'category_description']) --}}
                              </div>
                                    <label>الصورة</label>
                                    <input type="file" name="category_image" class="form-control {{ $errors->has('category_image') ? ' is-invalid' : '' }}" >
                                    {{-- @include('alerts.feedback', ['field' => 'category_image']) --}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">إضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
</body>
</html>

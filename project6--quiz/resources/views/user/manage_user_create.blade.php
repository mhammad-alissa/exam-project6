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
                    <form method="post" action="{{ route('manage_users.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                                @csrf
                                {{-- @include('alerts.success') --}}
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}" placeholder="الصنف">
                                    {{-- @include('alerts.feedback', ['field' => 'category_name']) --}}
                                </div>
                                <div class="form-group">
                                  <label>email</label>
                                  <input type="email" name="email" class="form-control {{ $errors->has('category_description') ? ' is-invalid' : '' }}" placeholder="الوصف">
                                  {{-- @include('alerts.feedback', ['field' => 'category_description']) --}}
                              </div>

                                <div class="form-group">
                                  <label>password</label>
                                  <input type="password" name="password" class="form-control {{ $errors->has('category_description') ? ' is-invalid' : '' }}" placeholder="الوصف">
                                  {{-- @include('alerts.feedback', ['field' => 'category_description']) --}}
                              </div>

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

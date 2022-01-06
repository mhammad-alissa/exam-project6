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
                    <form method="post" action="{{ route('manage_exams.store') }}" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                                @csrf
                                {{-- @include('alerts.success') --}}
                                <div class="form-group">
                                    <label>exam</label>
                                    <input type="text" name="exam_name" class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}" placeholder="الصنف">
                                    {{-- @include('alerts.feedback', ['field' => 'category_name']) --}}
                                </div>
                                <div class="form-group">
                                  <label>description</label>
                                  <input type="text" name="exam_description" class="form-control {{ $errors->has('category_description') ? ' is-invalid' : '' }}" placeholder="الوصف">
                                  {{-- @include('alerts.feedback', ['field' => 'category_description']) --}}
                              </div>
                                    <label>category</label>
                                    {{-- <input type="text" name="category_name" class="form-control {{ $errors->has('category_image') ? ' is-invalid' : '' }}" > --}}
                                    {{-- @include('alerts.feedback', ['field' => 'category_image']) --}}
                                    <select name="category_id" class="form-select form-control" id="">

                                        @php
                                             $exams = DB::table('exams')

                                             ->select('*')
                                            ->join('categories', 'categories.category_id', '=', 'exams.category_id')
                                            ->orderByDesc('exams.created_at')
                                            ->paginate(5);
                                        @endphp
                                        @foreach ($exams as $item)
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
</body>
</html>

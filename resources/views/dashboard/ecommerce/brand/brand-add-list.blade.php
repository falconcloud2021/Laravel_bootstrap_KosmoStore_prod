@extends('dashboard.layouts.dashboard-main')
@section('dashboard')

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="col-xl-12">
      <div class="row align-items-center my-1">
        <div class="col">
          <h5>Розділ "Бренди"</h5>
        </div>
        <div class="col-auto">
          <a href="{{ route('brands.list-add') }}"><button class="btn btn-sm btn-success waves-effect" type="submit" title="Список основних Брендів"><i class="fe fe-list"></i></button></a>
          <a href="{{ route('brands.chart-list') }}"><button class="btn btn-sm btn-primary waves-effect" type="submit"><i class="fe fe-bar-chart-2" title="Статистика по основних Брендах"></i></button></a>
          <a href="{{ route('brands.grid-detail') }}"><button class="btn btn-sm btn-info waves-effect" type="submit" title="Віджет основних Брендів"><i class="fe fe-grid"></i></button></a>
          <a href="{{ route('manager') }}"><button class="btn btn-sm btn-dark waves-effect" type="submit"><i class="fe fe-home" title="На головну сторінку"></i></button></a>
          <button class="btn dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Меню форми">
            <span class="text-muted sr-only">Дії</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-xl" title="1"><i class="fe fe-list mr-1"></i>1</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-xl" title="2"><i class="fe fe-grid mr-1"></i>2</a>         
          </div>
        </div>       
      </div>        
    </div> <!-- .col-xl-12 -->
    <div class="row">

      <!---------------------- Brand list --------------------------->
      <div class="col-xl-8">
        <div class="card shadow mb-4">
          <div class="card-header">
              <strong class="card-title">Таблиця доданих Брендів</strong>
          </div> 
          <!-- Small Brand table -->
          <div class="card-body">
            <table class="table datatables table-hover" id="dataTable-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Бренд</th>
                  <th>Логотип</th>
                  <th>Рейтинг</th>
                  <th>Чек</th>
                  <th>Статус</th>
                  <th>Дії</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brandsList as $key => $brand)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $brand->brand_name }}</td>
                  <td>
                    <div class="col-auto">
                      @if (file_exists($brand->brand_logo)) 
                        <img src="{{ asset($brand->brand_logo) }}" style="width: 62px; height: 42px;">
                      @else 
                        <span class="fe fe-camera-off fe-24 text-warning"></span>                          
                      @endif 
                    </div>                                
                  </td>
                  <td>
                    <div class="col-auto">                                                
                        <strong>{{ $brand->brand_rated }}  %</strong>
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $brand->brand_rated }}%" 
                          aria-valuenow="{{ $brand->brand_rated }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{ $brand->id }}" checked>
                      <label class="custom-control-label" for="{{ $brand->id }}"></label>
                    </div>
                  </td>
                  <td>
                    <div class="col-auto">
                      @if($brand->brand_status == 'active')
                        <span class="badge badge-pill badge-success"><i class="fe fe-smile mr-1"></i>Active</span>
                      @elseif($brand->brand_status == 'hold')
                        <span class="badge badge-warning"><i class="fe fe-frown mr-1"></i>Hold</span>
                      @elseif($brand->brand_status == 'stop')
                        <span class="badge badge-danger"><i class="fe fe-alert-octagon mr-1"></i>Stop</span>
                      @else
                        <span class="badge badge-secondary"><i class="fe fe-alert-octagon mr-1"></i>NO STATUS!</span> 
                      @endif
                    </div>  
                  </td>                 
                  <td>
                    <div class="col-auto">
                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Дії</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('brands.grid-detail',$brand->id) }}" data-toggle="modal" data-target=".bd-example-modal-xl" title="Детальніше про Бренд"><i class="fe fe-eye mr-2"></i>Детальніше</a>
                        <a class="dropdown-item" href="{{ route('brand.edit',$brand->id) }}" title="Редагувати картку Бренда"><i class="fe fe-pen-tool mr-2"></i>Редагувати</a>
                        <a class="dropdown-item" href="{{ route('brand.destroy',$brand->id) }}" id="delete" title="Видалити картку Бренда"><i class="fe fe-trash-2 mr-2"></i>Видалити</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>  
            </table>
          </div> <!-- /.card-body -->
          <!-- /.Small Brand table -->
        </div> <!-- /.shadow mb-4 -->     
      </div> <!-- /.col-xl-8 -->

      <!---------------------- Brand add-form --------------------------->
      <div class="col-xl-4">
        <div class="card shadow mb-4">
          <div class="card-header">
              <strong class="card-title">Форма додавання Брендів</strong>
          </div>
          <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group mb-3">
                <label for="inputBrandName">Назва Бренду</label>
                <input type="text" class="form-control" name="brand_name" maxlength="56" required>
                  <div class="valid-feedback"> Тут все нібито чудово! </div>
                  <div class="invalid-feedback"> Будь ласка введіть назву Бренду! </div>
                  @error('brand_name') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror 
              </div>
              <div class="form-group mb-3">
                <label for="inputDescriptionUA">Короткий опис Бренду</label>
                <textarea class="form-control" name="brand_description_ua" maxlength="1000" 
                  required="" rows="6" placeholder="Введіть короткий опис Бренду">
                </textarea>
                <div class="valid-feedback"> Тут все нібито чудово! </div>
                <div class="invalid-feedback"> Будь ласка введіть короткий опис Бренду! </div>
                @error('brand_description_ua') 
                  <span class="text-danger">{{ $message }}</span>
                @enderror 
              </div>      
              <div class="form-group mb-3">
                <label for="inputBrandImage">Логотип Бренду</label>
                <input type="file" class="form-control" name="brand_logo" required>
                  <div class="valid-feedback"> Тут все нібито чудово! </div>
                  <div class="invalid-feedback"> Будь ласка додайте Логотип Бренду! </div>
                  @error('brand_image') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror 
              </div>
              <div class="form-group mb-3">
                <label for="inputDescriptionRU">Короткое описание Бренда</label>
                <textarea class="form-control" name="brand_description_ru" maxlength="1000" 
                  required="" rows="6" placeholder="Введите короткое описание Бренда на русском">
                </textarea>
                <div class="valid-feedback"> Тут все вроде нормально! </div>
                <div class="invalid-feedback"> Обязательно введите короткое описание Бренда на русском! </div>
                @error('brand_description_ru') 
                  <span class="text-danger">{{ $message }}</span>
                @enderror 
              </div>
              <button class="btn btn-success" type="submit"><i class="fe fe-plus"></i> Додати</button>
              <button class="btn btn-secondary waves-effect" type="reset">Відміна</button>
            </form>
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-xl-4 -->

    </div> <!-- /.row -->
  </div>  <!-- /.container-fluid -->
   
</main> <!-- main -->
   
@endsection
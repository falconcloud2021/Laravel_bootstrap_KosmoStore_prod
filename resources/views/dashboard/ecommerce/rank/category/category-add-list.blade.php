@extends('dashboard.layouts.dashboard-main')
@section('dashboard')

@push('dataTableCSS')

<!-- DataTables -->
<link href="{{ asset('assets/dashboard/vendor/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/vendor/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/vendor/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/dashboard/vendor/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/vendor/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

<main role="main" class="main-content">
  <div class="container-fluid">

    <!--------------- Topnav include ----------------->
    @include('dashboard.partials.rank.category-topnav')

    <div class="row">

      <!---------------------- Category advanced --------------------------->
      <div class="col-xl-8">
        <div class="card shadow mb-3">
          <div class="card-header">
              <strong class="card-title"> Таблиця доданих Категорій </strong>
          </div> 
          <!-- Small Category table -->
          <div class="card-body">
            <table class="table datatables table-hover" id="dataTable-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Категорія</th>
                  <th>Логотип</th>
                  <th>Рейтинг</th>
                  <th>Статус</th>
                  <th>Дії</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categoriesList as $key => $category)
                <tr >
                  <td>{{ $key+1 }}</td>
                  <td>{{ $category->category_name_ua }}</td>
                  <td>
                    <div class="col-auto">
                      @if (file_exists($category->category_icon)) 
                        <img src="{{ asset($category->category_icon) }}" style="width: 62px; height: 42px;">
                      @else 
                        <span class="fe fe-camera-off fe-24 text-warning"></span>                          
                      @endif 
                    </div>                                
                  </td>
                  <td>
                    <div class="col-auto">                                                
                        <strong>{{ $category->category_rated }}  %</strong>
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $category->category_rated }}%" 
                          aria-valuenow="{{ $category->category_rated }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="col-auto">
                      @if($category->category_status == 'active')
                        <span class="badge badge-success"><i class="fe fe-smile mr-1"></i>Active</span>
                      @elseif($category->category_status == 'hold')
                        <span class="badge badge-warning"><i class="fe fe-coffee mr-1"></i>Hold</span>
                      @else
                        <span class="badge badge-secondary"><i class="fe fe-alert-octagon mr-1"></i></span> 
                      @endif
                    </div>  
                  </td>                 
                  <td>
                    <div class="col-auto">
                      <button class="btn btn-sm btn-outline-secondary dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Дії</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('categories.grid-detail',$category->id) }}" data-toggle="modal" data-target=".bd-example-modal-xl" title="Детальніше про Категорію"><i class="fe fe-eye mr-2"></i>Детальніше</a>
                        <a class="dropdown-item" href="{{ route('category.edit',$category->id) }}" title="Редагувати картку Категорії"><i class="fe fe-pen-tool mr-2"></i>Редагувати</a>
                        <a class="dropdown-item" href="{{ route('category.archive',$category->id) }}" id="archive" title="Видалити картку Категорії"><i class="fe fe-archive mr-2"></i>До Архіву</a>
                      </div>
                    </div>
                  </td>
                </tr>

                  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="{{ $category->id }}" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-body"> metus sit. {{ $category->category_name_ua }}</div>
                      </div>
                    </div>
                  </div> <!-- large modal -->

                @endforeach
              </tbody>  
            </table>
          </div> <!-- /.card-body -->
          <!-- /.Small category table -->
        </div> <!-- /.shadow mb-4 -->     
      </div> <!-- /.col-xl-8 -->

      <!---------------------- Category add-form --------------------------->
      <div class="col-xl-4">
        <div class="card shadow mb-3">
          <div class="card-header">
              <strong class="card-title"> Форма додавання Категорій </strong>
          </div>
          <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group mb-3">
                <label for="inputCategoryName">Назва нової Категорії</label>
                <input type="text" class="form-control" name="category_name_ua" maxlength="56" required>
                  <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                  <div class="invalid-feedback"> Будь ласка введіть назву Категорії! </div>
                  @error('category_name_ua') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror 
              </div>
              <div class="form-group mb-3">
                <label for="categoryDescriptionUA">Короткий опис нової Категорії</label>
                <textarea class="form-control" rows="4" id="validationTextarea" name="category_description_ua" 
                  maxlength="1000" placeholder="Опис Категорії" required></textarea>
                <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                <div class="invalid-feedback"> Будь ласка введіть короткий опис Категорії! </div>
                @error('category_description_ua') 
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="inputCategoryImage">Фото Категорії</label>
                <input type="file" class="form-control" name="category_icon" required>
                  <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                  <div class="invalid-feedback"> Будь ласка додайте Іконку Категорії! </div>
                  @error('category_icon') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror 
              </div>
              <div class="form-group mb-3">
                <label for="inputCategoryName">Название новой Категории</label>
                <input type="text" class="form-control" name="category_name_ru" maxlength="56" required>
                  <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                  <div class="invalid-feedback"> Будь ласка введіть назву Категорії російською! </div>
                  @error('category_name_ru') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror 
              </div>
              <div class="form-group mb-3">
                <label for="categoryDescriptionRU">Короткое описание новой Категории</label>
                <textarea class="form-control" rows="4" id="validationTextarea2" name="category_description_ru" 
                  maxlength="1000" placeholder="Описание Категории на русском" required></textarea>
                <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                <div class="invalid-feedback"> Будь ласка введіть короткий опис Категорії російською! </div>
                @error('category_description_ru') 
                  <span class="text-danger">{{ $message }}</span>
                @enderror 
              </div>
              <div class="form-group">
                <p class="mb-3"><small><i>Підтверджую, що дані вірні - хочу додати нову Категорію!</i></small></p>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                  <label class="custom-control-label" for="customSwitch1">Так</label>
                </div>
              </div>
              <button class="btn btn-success" type="submit"><i class="fe fe-plus"></i> Додати</button>
              <button class="btn btn-secondary waves-effect" type="reset">Відміна</button>
            </form>
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-xl-4 -->

    </div> <!-- /.row -->

      <!---------------------- Full list Category --------------------------->
      <hr>
      <div class="col-xl-12">
        <div class="card shadow mb-3">
          <div class="card-header">
              <strong class="card-title"> Деталізація по доданих Категоріях </strong>
          </div> 
          <div class="card-body">
            <table id="selection-datatable" class="table table-hover dt-responsive nowrap w-100">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Редактор</th>
                  <th>Категорія</th>
                  <th>Логотип</th>
                  <th>Рейтинг</th>
                  <th>Чек</th>
                  <th>Статус</th>
                  <th>ID</th>
                  <th>Дата</th>
                  <th>Дії</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categoriesList as $key => $category)
                <tr >
                  <td>{{ $key+1 }}</td>
                  <td>
                    <div class="col-auto">
                      <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-primary"><i class="fe fe-user-check"></i></span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        @if (empty($category->created_by || $category->updated_by || $category->deleted_by))
                            <span><i class="fe fe-x-circle mr-1"></i>Відсутні дані про автора!</span>    
                        @else
                            @if (!empty($category->created_by))
                              <small>Створив: {{ $category->created_by }}</small>
                            @endif
                            @if (!empty($category->updated_by))
                              <small>Редаг-в: {{ $category->updated_by }}</small>
                            @endif
                            @if (!empty($category->deleted_by))
                              <small>Видалив: {{ $category->deleted_by }}</small>
                            @endif                                  
                        @endif                                                            
                      </div>
                    </div>
                  </td>         
                  <td>{{ $category->category_name_ua }}</td>
                  <td>
                    <div class="col-auto">
                      @if (file_exists($category->category_icon)) 
                        <img src="{{ asset($category->category_icon) }}" style="width: 62px; height: 42px;">
                      @else 
                        <span class="fe fe-camera-off fe-24 text-warning"></span>                          
                      @endif 
                    </div>                                
                  </td>
                  <td>
                    <div class="col-auto">                                                
                        <strong>{{ $category->category_rated }}  %</strong>
                      <div class="progress mt-2" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $category->category_rated }}%" 
                          aria-valuenow="{{ $category->category_rated }}" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="{{ $category->id }}" checked>
                      <label class="custom-control-label" for="{{ $category->id }}"></label>
                    </div>
                  </td>
                  <td>
                    <div class="col-auto">
                      @if($category->category_status == 'active')
                        <span class="badge badge-success"><i class="fe fe-smile mr-1"></i>Active</span>
                      @elseif($category->category_status == 'hold')
                        <span class="badge badge-warning"><i class="fe fe-coffee mr-1"></i>Hold</span>
                      @elseif($category->category_status == 'stop')
                        <span class="badge badge-danger"><i class="fe fe-alert-triangle mr-1"></i>Stop</span>
                      @else
                        <span class="badge badge-secondary"><i class="fe fe-alert-octagon mr-1"></i></span> 
                      @endif
                    </div>  
                  </td>
                  <td>{{ $category->id }}</td> 
                  <td>
                    <div class="col-auto">
                      <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-info"><i class="fe fe-clock"></i></span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        @if (!empty($category->created_at))
                          <small>Створено: {{ $category->created_at }}</small>
                        @endif
                        @if (!empty($category->updated_at))
                          <small>Редаг-но: {{ $category->updated_at }}</small>
                        @endif
                        @if (!empty($category->deleted_at))
                          <small>Видалено: {{ $category->deleted_at }}</small>
                        @endif                                
                      </div>
                    </div>
                  </td>                   
                  <td>
                    <div class="col-auto">
                      <button class="btn btn-sm btn-outline-warning dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Дії</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('categories.grid-detail',$category->id) }}" data-toggle="modal" data-target=".bd-example-modal-xl" title="Детальніше про Категорію"><i class="fe fe-eye mr-2"></i>Детальніше</a>
                        <a class="dropdown-item" href="{{ route('category.edit',$category->id) }}" title="Редагувати картку Категорії"><i class="fe fe-pen-tool mr-2"></i>Редагувати</a>
                        <a class="dropdown-item" href="{{ route('category.archive',$category->id) }}" id="archive" title="Видалити картку Категорії"><i class="fe fe-archive mr-2"></i>До Архіву</a>
                      </div>
                    </div>
                  </td>
                </tr>

                  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="{{ $category->id }}" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-body"> metus sit. {{ $category->category_name_ua }}</div>
                      </div>
                    </div>
                  </div> <!-- large modal -->

                @endforeach
              </tbody>  
            </table>
              
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
      <!---------------------- Archived Category --------------------------->
      <hr>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Категорії перенесені в Архів</h6>
              <div class="table-rep-plugin">
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="3">Статус</th>
                        <th data-priority="6">Іконка</th>
                        <th data-priority="1">Категорія</th>
                        <th data-priority="1">ID</th>
                        <th data-priority="1">Редакція</th>                       
                        <th data-priority="1">Дотиків</th>
                        <th data-priority="1">Рейтинг</th>
                        <th data-priority="6">Дата</th>                       
                        <th>Дії</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($catArchivedList as $key => $category)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                          <div class="col-auto">
                            @if(!empty($category->deleted_at))
                              <span class="badge badge-danger"><i class="fe fe-alert-triangle mr-1"></i>archived</span>   
                            @else
                              <span class="badge badge-secondary"><i class="fe fe-alert-octagon mr-1"></i></span> 
                            @endif
                          </div>  
                        </td>
                        <td>
                          <div class="col-auto">
                            @if (file_exists($category->category_icon)) 
                              <img src="{{ asset($category->category_icon) }}" style="width: 62px; height: 42px;">
                            @else 
                              <span class="fe fe-camera-off fe-24 text-warning"></span>                          
                            @endif 
                          </div>                                
                        </td>      
                        <td>{{ $category->category_name_ua }}</td>
                        <td>{{ $category->id }}</td>
                        <td>
                          <div class="col-auto">
                            <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="badge badge-primary"><i class="fe fe-user-check"></i></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              @if (empty($category->created_by || $category->updated_by || $category->deleted_by))
                                  <span><i class="fe fe-x-circle mr-1"></i>Відсутні дані про автора!</span>    
                              @else
                                  @if (!empty($category->created_by))
                                    <small>Створив: {{ $category->created_by }}</small>
                                  @endif
                                  @if (!empty($category->updated_by))
                                    <small>Редаг-в: {{ $category->updated_by }}</small>
                                  @endif
                                  @if (!empty($category->deleted_by))
                                    <small>Видалив: {{ $category->deleted_by }}</small>
                                  @endif                                  
                              @endif                                                            
                            </div>
                          </div>
                        </td>                                               
                        <td>{{ $category->category_touches }}</td>
                        <td>
                          <div class="col-auto">                                                
                              <strong>{{ $category->category_rated }}  %</strong>
                            <div class="progress mt-2" style="height: 4px;">
                              <div class="progress-bar" role="progressbar" style="width: {{ $category->category_rated }}%" 
                                aria-valuenow="{{ $category->category_rated }}" aria-valuemin="0" aria-valuemax="100">
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="col-auto">
                            <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="badge badge-info"><i class="fe fe-clock"></i></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              @if (!empty($category->created_at))
                                <small>Створено: {{ $category->created_at }}</small>
                              @endif
                              @if (!empty($category->updated_at))
                                <small>Редаг-но: {{ $category->updated_at }}</small>
                              @endif
                              @if (!empty($category->deleted_at))
                                <small>Видалено: {{ $category->deleted_at }}</small>
                              @endif                                
                            </div>
                          </div>
                        </td>   
                        <td>
                          <div class="col-auto">
                            <button class="btn btn-sm btn-outline-danger dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Дії</span>
                            </button> 
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{ route('category.restore',$category->id) }}" title="Поновити картку Категорії"><i class="fe fe-folder-plus mr-2"></i>Поновити</a>
                              <a class="dropdown-item" href="{{ route('categories.grid-detail',$category->id) }}" data-toggle="modal" data-target=".bd-example-modal-xl" title="Детальніше про Категорію"><i class="fe fe-eye mr-2"></i>Детальніше</a>
                              <a class="dropdown-item" href="{{ route('category.delete',$category->id) }}" id="delete" title="Видалити картку Категорії"><i class="fe fe-trash-2 mr-2"></i>Видалити з бази</a>
                            </div>
                          </div>
                        </td>
                      </tr>

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="{{ $category->id }}" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-body"> metus sit. {{ $category->category_name_ua }}</div>
                            </div>
                          </div>
                        </div> <!-- large modal -->

                      @endforeach
                    </tbody>                           
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div> <!-- end col -->
      <!---------------------- Nav footer --------------------------->
      <hr>
      <div class="col-auto">
        <a href="{{ route('categories.list-add') }}"><button class="btn btn-sm btn-success waves-effect" type="submit" title="Список основних Категорій"><i class="fe fe-list"></i></button></a>
        <a href="{{ route('categories.chart-list') }}"><button class="btn btn-sm btn-primary waves-effect" type="submit"><i class="fe fe-bar-chart-2" title="Статистика по основних Категоріях"></i></button></a>
        <a href="{{ route('categories.grid-detail') }}"><button class="btn btn-sm btn-info waves-effect" type="submit" title="Віджет основних Категорій"><i class="fe fe-grid"></i></button></a>
        <button class="btn btn-outline-primary dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Меню форми">
          <span class="text-muted sr-only">Дії</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-xl" title="1"><i class="fe fe-list mr-1"></i>1</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-xl" title="2"><i class="fe fe-grid mr-1"></i>2</a> 
          <a class="dropdown-item" href="{{ route('manager') }}"><button class="btn btn-sm btn-dark waves-effect" type="submit"><i class="fe fe-home mr-2"></i>На головну</button></a>        
        </div>
      </div>       

  </div>  <!-- /.container-fluid -->
   
</main> <!-- main -->

@push('dataTableJS')

<!-- Required datatable js -->
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-bs4/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-buttons-bs4/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-buttons/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-keytable/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-select/dataTables.select.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/datatables.net-responsive-bs4/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/rwd-table/rwd-table.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets/dashboard/vendor/js/datatables.init.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js/table-responsive.init.js') }}"></script>

<script>  
  $(document).on("click", "#archive", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
        swal({
          title: "Ви впевнені, що хочете відправити Категорію до архіву?",
          text: "Дані про Категорію будуть переміщені до архіву з можливістю поновлення!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
                window.location.href = link;
          } else {
            swal("Зберегти дані!");
          }
        });
    });
</script>
<script>  
  $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
        swal({
          title: "ВИ ВПЕВНЕНІ, ЩО ЩОЧЕТЕ ВИДАЛИТИ КАРТКУ КАТЕГОРІЇ?",
          text: "Дані про Категорію будуть видалені з бази даних без можливості поновлення!",
          icon: "danger",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
                window.location.href = link;
          } else {
            swal("Зберегти дані!");
          }
        });
    });
</script>

@endpush

   
@endsection
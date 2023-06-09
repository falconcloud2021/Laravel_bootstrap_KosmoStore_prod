@extends('dashboard.layouts.dashboard-main')
@section('dashboard')

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="col-xl-10">
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
      <div class="card shadow mb-4"> 
        <div class="card-header">
          <strong class="card-title">Форма редагування картки Брендів</strong>    
        </div>
          <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('brand.update', $brandEdit->id) }}" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="hidden" name="id" value="{{ $brandEdit->id }}">	
                <input type="hidden" name="old_logo" value="{{ $brandEdit->brand_logo }}">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="col-auto">
                      <label for="brandName">Вже встановлений Логотип Бренду</label>
                      <div class="col-auto">
                        @if (file_exists($brandEdit->brand_logo)) 
                          <img class="card-img-top" src="{{ asset($brandEdit->brand_logo) }}" style="width: 190px; height: 102px;" alt="Brand Logo">
                        @else 
                          <span class="fe fe-camera-off fe-24 text-warning"></span>                          
                        @endif 
                      </div>  
                    </div>         
                  </div>
                  <div class="form-group col-md-6">
                    <label for="brandName">Назва Бренду:</label>
                    <input type="text" class="form-control" name="brand_name" value="{{ $brandEdit->brand_name }}" maxlength="56">
                      <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                      <div class="invalid-feedback"> Будь ласка введіть назву Категорії! </div>
                      @error('brand_name') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6 md-3">
                    <label for="brandLogo">"Старий" текст опису Бренду:</label>
                    <p class="card-text"><i>&#171{{ $brandEdit->brand_description_ua }}&#187</i></p>
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="validationTextarea1">Короткий опис Бренду:</label>
                    <div class="input-group">
                      <span class="input-group-text"><small>УКР</small></span>
                      <textarea class="form-control" name="brand_description_ua" maxlength="1000" required="" rows="8" 
                        placeholder="Введіть короткий опис Бренду" aria-label="With textarea">{{ $brandEdit->brand_description_ua }}</textarea>
                    </div>
                      <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                      <div class="invalid-feedback"> Будь ласка введіть короткий опис Бренду! </div>
                      @error('brand_description_ua') 
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="validationCustom3">"Старый" текст описания Бренда:</label>
                    <p class="card-text"><i>&#171{{ $brandEdit->brand_description_ru }}&#187</i></p>
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="validationTextarea1">Короткое описание Бренда:</label>
                    <div class="input-group">
                      <span class="input-group-text"><small>РУС</small></span>
                      <textarea class="form-control" name="brand_description_ru" maxlength="1000" required="" rows="8" 
                        placeholder="Введіть короткий опис Бренду" aria-label="With textarea">{{ $brandEdit->brand_description_ru }}</textarea>
                    </div>
                      <div class="valid-feedback"> Тут вже є текст і все нібито чудово, але краще ще раз перевірити! </div>
                      <div class="invalid-feedback"> Будь ласка введіть короткий опис Бренду російською! </div>
                      @error('brand_description_ru') 
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </div> 
                <div class="form-group col-md-6 mb-3">
                  <label for="validationCustom3">Новий Логотип Бренду</label>
                  <input type="file" class="form-control" name="brand_logo">
                    @error('brand_logo') 
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div>               
                <div class="row align-items-center my-4">
                  <div class="col">
                    <h2 class="h3 mb-0 page-title"></h2>
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Редагувати</button>
                    <button class="btn btn-secondary waves-effect" type="reset">Відміна</button>
                  </div>
                </div>
            </form>
          </div> <!-- /.card-body -->
          </div> <!-- /.card -->       
    </div> <!-- .col-xl-10 -->
  </div> <!-- .container-fluid -->


  <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="list-group list-group-flush my-n3">
            <div class="list-group-item bg-transparent">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="fe fe-box fe-24"></span>
                </div>
                <div class="col">
                  <small><strong>Package has uploaded successfull</strong></small>
                  <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                  <small class="badge badge-pill badge-light text-muted">1m ago</small>
                </div>
              </div>
            </div>
            <div class="list-group-item bg-transparent">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="fe fe-download fe-24"></span>
                </div>
                <div class="col">
                  <small><strong>Widgets are updated successfull</strong></small>
                  <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                  <small class="badge badge-pill badge-light text-muted">2m ago</small>
                </div>
              </div>
            </div>
            <div class="list-group-item bg-transparent">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="fe fe-inbox fe-24"></span>
                </div>
                <div class="col">
                  <small><strong>Notifications have been sent</strong></small>
                  <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                  <small class="badge badge-pill badge-light text-muted">30m ago</small>
                </div>
            </div> <!-- / .row -->
            </div>
            <div class="list-group-item bg-transparent">
            <div class="row align-items-center">
                <div class="col-auto">
                <span class="fe fe-link fe-24"></span>
                </div>
                <div class="col">
                <small><strong>Link was attached to menu</strong></small>
                <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                <small class="badge badge-pill badge-light text-muted">1h ago</small>
                </div>
            </div>
            </div> <!-- / .row -->
        </div> <!-- / .list-group -->
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body px-5">
        <div class="row align-items-center">
            <div class="col-6 text-center">
            <div class="squircle bg-success justify-content-center">
                <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
            </div>
            <p>Control area</p>
            </div>
            <div class="col-6 text-center">
            <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-activity fe-32 align-self-center text-white"></i>
            </div>
            <p>Activity</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6 text-center">
            <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
            </div>
            <p>Droplet</p>
            </div>
            <div class="col-6 text-center">
            <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
            </div>
            <p>Upload</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6 text-center">
            <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-users fe-32 align-self-center text-white"></i>
            </div>
            <p>Users</p>
            </div>
            <div class="col-6 text-center">
            <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
            </div>
            <p>Settings</p>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

</main> <!-- main -->
    
@endsection
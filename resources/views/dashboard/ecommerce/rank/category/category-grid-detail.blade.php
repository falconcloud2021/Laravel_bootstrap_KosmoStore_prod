@extends('dashboard.layouts.dashboard-main')
@section('dashboard')

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
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
        
    
        <div class="file-container border-top">
          <div class="file-panel mt-1">

            <div class="row align-items-center mb-2">
              <div class="col">
                <strong>Основні Бренди</strong>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm">
                    <i class="fe fe-16 fe-grid text-primary"></i>
                </button>
                <button type="button" class="btn btn-sm">
                    <i class="fe fe-16 fe-list text-muted"></i>
                </button>
              </div>
            </div>
            
            <div class="row my-4">

            @foreach ($brandsGrid as $key => $cell)
              <div class="col-md-3">
                <div class="card shadow text-center mb-4">
                  <div class="card-body file">                   
                    <div class="circle circle-lg bg-secondary my-4">
                        @if (isset($cell->brand_logo)) 
                            <img src="{{ asset($cell->brand_logo) }}" style="width: 62px; height: 42px;">
                        @else <span class="fe fe-folder fe-24 text-white"></span>                          
                        @endif                                                                 
                    </div>
                  </div> <!-- .card-body -->
                  <div class="card-body text-center">
                    <div class="card-text my-2">
                        <h4>{{ $cell->brand_name }}</h4>
                        <p class="small text-muted mb-0">Accumsan Consulting</p>
                        <p class="small"><span class="badge badge-light text-muted">New York, USA</span></p>
                    </div>
                  </div> <!-- ./card-text -->
                  <div class="card-footer">
                    <div class="row align-items-center justify-content-between">
                      <div class="col-auto">
                        @if($cell->brand_status == 'active')
                          <span class="badge badge-success"><i class="fe fe-smile mr-1"></i>Active</span>
                        @elseif($cell->brand_status == 'hold')
                          <span class="badge badge-warning"><i class="fe fe-frown mr-1"></i>Hold</span>
                        @elseif($cell->brand_status == 'stop')
                          <span class="badge badge-danger"><i class="fe fe-alert-octagon mr-1"></i>Stop</span>
                        @else
                          <span class="badge badge-secondary"><i class="fe fe-alert-octagon mr-1"></i>NO STATUS!</span> 
                        @endif
                      </div>
                      <div class="col-auto">
                        <div class="file-action">
                            <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu m-2">
                              <a class="dropdown-item" href="{{ route('brands.grid-detail',$cell->id) }}" data-toggle="modal" data-target=".bd-example-modal-xl" title="Детальніше про Бренд"><i class="fe fe-eye mr-2"></i>Детальніше</a>
                              <a class="dropdown-item" href="{{ route('brand.edit',$cell->id) }}" title="Редагувати картку Бренда"><i class="fe fe-pen-tool mr-2"></i>Редагувати</a>
                              <a class="dropdown-item" href="{{ route('brand.destroy',$cell->id) }}" id="delete" title="Видалити картку Бренда"><i class="fe fe-trash-2 mr-2"></i>Видалити</a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- /.card-footer -->
                </div> <!-- .card -->
              </div> <!-- .col -->

              <!---------------------- Brand-grid info-panel modal-details-activities --------------------------->
              <div class="info-panel">
                <div class="info-content p-3 border-left">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-fill">
                            <span class="circle circle-sm bg-white mr-2">
                                <span class="fe fe-image fe-12 text-success"></span>
                            </span>
                            <span class="h6">Creative Logo.PNG</span>
                        </div>
                        <span class="btn close-info">
                        <i class="fe fe-x"></i>
                        </span>
                    </div>
                    <ul class="nav nav-tabs nav-fill mb-3" id="file-detail" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="tab-detail" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="tab-activity" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activities</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="file-tabs">
                        <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="tab-detail">
                        <img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded">
                        <ul class="avatars-list my-4 mx-0">
                            <li>
                            <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-2.jpg">
                            </a>
                            </li>
                            <li>
                            <a href="#!" class="avatar avatar-sm">
                                <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                            </a>
                            </li>
                        </ul>
                        <dl class="row my-4 small">
                            <dt class="col-6 text-muted">Owner</dt>
                            <dd class="col-6">Whilemina Pate</dd>
                            <dt class="col-6 text-muted">Type</dt>
                            <dd class="col-6">Image</dd>
                            <dt class="col-6 text-muted">Size</dt>
                            <dd class="col-6">32M</dd>
                            <dt class="col-6 text-muted">Location</dt>
                            <dd class="col-6"><a href="#" class="text-muted">Design File</a></dd>
                            <dt class="col-6 text-muted">Created at</dt>
                            <dd class="col-6">Aug 20, 2020</dd>
                            <dt class="col-6 text-muted">Last update</dt>
                            <dd class="col-6">Aug 21, 2020</dd>
                        </dl>
                        </div> <!-- .tab-pane -->
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="tab-activity">
                        <div class="timeline">
                            <div class="pb-3 timeline-item item-primary">
                            <div class="pl-5 small">
                                <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted mx-1">have uploaded</span><strong>Tinydash</strong></div>
                                <span class="badge badge-pill badge-dark">1h ago</span>
                            </div>
                            </div>
                            <div class="pb-3 timeline-item item-warning">
                            <div class="pl-5 small">
                                <div class="mb-3"><strong>@Fletcher</strong><span class="text-muted mx-1">shared</span><strong>Tiny Admin</strong></div>
                                <ul class="avatars-list mb-2">
                                <li>
                                    <a href="#!" class="avatar avatar-sm">
                                    <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-1.jpg">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="avatar avatar-sm">
                                    <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="avatar avatar-sm">
                                    <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-3.jpg">
                                    </a>
                                </li>
                                </ul>
                                <span class="badge badge-pill badge-dark">1h ago</span>
                            </div>
                            </div>
                            <div class="pb-3 timeline-item item-success">
                            <div class="pl-5 small">
                                <div class="mb-2"><strong>@Kelley Sonya</strong><span class="text-muted small mx-1">has commented on</span><strong>Advanced table</strong></div>
                                <div class="card d-inline-flex mb-2">
                                    <div class="card-body bg-light py-2 px-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                                </div>
                                <span class="badge badge-pill badge-dark">1h ago</span>
                            </div>
                            </div>
                        </div> <!-- / .timeline -->
                        </div> <!-- .tab-pane -->
                    </div> <!-- .tab-content -->
                </div>
              </div>

            <!---------------------- Brand large modal-detail --------------------------->
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                           
                    <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button> 
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Детальна інформація про Бренд: "{{ $cell->brand_name }}".</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Назва Бренду</label>
                                    <input type="email" class="form-control" name="" value="{{ $cell->brand_name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Назва Бренду</label>
                                    <input type="email" class="form-control" name="" value="{{ $cell->brand_description_ua }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="validationTextarea2">Короткий опис Бренду</label>
                                    <textarea class="form-control" rows="3" 
                                        name="brand_description_ua" placeholder="{{ $cell->brand_description_ua }}">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="validationTextarea2">Короткое описание Бренда</label>
                                    <textarea class="form-control" rows="3" 
                                        name="brand_description_ua" value="{{ $cell->brand_description_ru }}">
                                    </textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4"> Логотип Бренду </label>
                                    <img src="{{ asset($cell->brand_image) }}" style="width: 162px; height: 102px;">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="validationTextarea2">Короткое описание Категории</label>
                                    <textarea class="form-control" name="brand_description_ru" value="#" 
                                    required="" rows="3">
                                    </textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-3 col-lg-4">
                                    <div class="card shadow eq-card mb-4">
                                    <div class="card-body">
                                        <div class="chart-widget mb-2">
                                        <div id="radialbar"></div>
                                        </div>
                                        <div class="row items-align-center">
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-1">Cost</p>
                                            <h6 class="mb-1">$1,823</h6>
                                            <p class="text-muted mb-0">+12%</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-1">Revenue</p>
                                            <h6 class="mb-1">$6,830</h6>
                                            <p class="text-muted mb-0">+8%</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-1">Earning</p>
                                            <h6 class="mb-1">$4,830</h6>
                                            <p class="text-muted mb-0">+8%</p>
                                        </div>
                                        </div>
                                    </div> <!-- .card-body -->
                                    </div> <!-- .card -->
                                </div> <!-- .col -->
                                <div class="col-xl-9 col-lg-4">
                                    <div class="card-body">
                                    <div class="row align-items-center my-4">
                                        <div class="col-md-4">
                                        <div class="mx-6">
                                            <strong class="mb-0 text-uppercase text-muted">Сумма по Бренду</strong><br />
                                            <h3>$2,562.30</h3>
                                            <p class="text-muted">Загальна сумма продажів по Бренду за весь період з моменту реєстрації.</p>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                            <div class="p-6">
                                                <p class="small text-muted mb-1">Продажі</p>
                                                <span class="h6 mb-0">$1.2K</span>
                                                <p class="small mb-0">
                                                <span class="fe fe-arrow-up text-success fe-12"></span>
                                                <span class="text-muted ml-1">+1.5%</span>
                                                </p>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="p-6">
                                                <p class="small text-muted mb-1">Замовлень</p>
                                                <span class="h6 mb-0">1K+</span>
                                                <p class="small mb-0">
                                                <span class="fe fe-arrow-up text-success fe-12"></span>
                                                <span class="text-muted ml-1">+28.5%</span>
                                                </p>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                            <div class="p-6">
                                                <p class="small text-muted mb-1">Дотиків</p>
                                                <span class="h6 mb-0">1626</span>
                                                <p class="small mb-0">
                                                <span class="text-muted ml-1">+1.5%</span>
                                                </p>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="p-6">
                                                <p class="small text-muted mb-1">Customers</p>
                                                <span class="h6 mb-0">186</span>
                                                <p class="small mb-0">
                                                <span class="fe fe-arrow-down text-danger fe-12"></span>
                                                <span class="text-muted ml-1">-2.5%</span>
                                                </p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-9">
                                        <div class="mr-6">
                                            <div id="areaChart"></div>
                                        </div>
                                        </div> <!-- .col-md-8 -->
                                    </div> <!-- end section -->
                                    </div> <!-- .card-body -->
                                </div> <!-- .card -->
                                </div>                                  
                                <button type="submit" class="btn btn-primary">На головну</button>
                            </div> <!-- /. card-body -->
                            </div> <!-- /. card -->
                        </div> <!-- /. col -->
                        </div> <!-- /. end-section -->
                    </div> <!-- .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Закрити</button>
                        <button type="button" class="btn mb-2 btn-primary">Редагувати</button>
                    </div>
                    </div> <!-- /.modal-content --> 
               

                </div>
            </div> <!-- /.large modal-detail -->


               @endforeach
            </div> <!-- .row -->
           
          </div> <!-- .file-panel -->

          <div class="info-panel">
            <div class="info-content p-3 border-left">
              <div class="d-flex align-items-center mb-3">
                <div class="flex-fill">
                    <span class="circle circle-sm bg-white mr-2">
                        <span class="fe fe-image fe-12 text-success"></span>
                    </span>
                    <span class="h6">Creative Logo.PNG</span>
                </div>
                <span class="btn close-info">
                <i class="fe fe-x"></i>
                </span>
            </div>
            <ul class="nav nav-tabs nav-fill mb-3" id="file-detail" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="tab-detail" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="tab-activity" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activities</a>
                </li>
            </ul>
            <div class="tab-content" id="file-tabs">
                <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="tab-detail">
                <img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded">
                <ul class="avatars-list my-4 mx-0">
                    <li>
                    <a href="#!" class="avatar avatar-sm">
                        <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-2.jpg">
                    </a>
                    </li>
                    <li>
                    <a href="#!" class="avatar avatar-sm">
                        <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                    </a>
                    </li>
                </ul>
                <dl class="row my-4 small">
                    <dt class="col-6 text-muted">Owner</dt>
                    <dd class="col-6">Whilemina Pate</dd>
                    <dt class="col-6 text-muted">Type</dt>
                    <dd class="col-6">Image</dd>
                    <dt class="col-6 text-muted">Size</dt>
                    <dd class="col-6">32M</dd>
                    <dt class="col-6 text-muted">Location</dt>
                    <dd class="col-6"><a href="#" class="text-muted">Design File</a></dd>
                    <dt class="col-6 text-muted">Created at</dt>
                    <dd class="col-6">Aug 20, 2020</dd>
                    <dt class="col-6 text-muted">Last update</dt>
                    <dd class="col-6">Aug 21, 2020</dd>
                </dl>
                </div> <!-- .tab-pane -->
                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="tab-activity">
                <div class="timeline">
                    <div class="pb-3 timeline-item item-primary">
                    <div class="pl-5 small">
                        <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted mx-1">have uploaded</span><strong>Tinydash</strong></div>
                        <span class="badge badge-pill badge-dark">1h ago</span>
                    </div>
                    </div>
                    <div class="pb-3 timeline-item item-warning">
                    <div class="pl-5 small">
                        <div class="mb-3"><strong>@Fletcher</strong><span class="text-muted mx-1">shared</span><strong>Tiny Admin</strong></div>
                        <ul class="avatars-list mb-2">
                        <li>
                            <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-1.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-3.jpg">
                            </a>
                        </li>
                        </ul>
                        <span class="badge badge-pill badge-dark">1h ago</span>
                    </div>
                    </div>
                    <div class="pb-3 timeline-item item-success">
                    <div class="pl-5 small">
                        <div class="mb-2"><strong>@Kelley Sonya</strong><span class="text-muted small mx-1">has commented on</span><strong>Advanced table</strong></div>
                        <div class="card d-inline-flex mb-2">
                            <div class="card-body bg-light py-2 px-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                        </div>
                        <span class="badge badge-pill badge-dark">1h ago</span>
                    </div>
                    </div>
                  </div> <!-- / .timeline -->
                </div> <!-- .tab-pane -->
              </div> <!-- .tab-content -->
            </div>
          </div>
          
          <hr class="my-4">
            <div class="row align-items-center mb-4">
              <div class="col">
                <strong>Folders</strong>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm">
                <i class="fe fe-16 fe-grid text-primary"></i>
                </button>
                <button type="button" class="btn btn-sm">
                <i class="fe fe-16 fe-list text-muted"></i>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="card shadow mb-4">
                  <div class="card-body file-list">
                    <div class="d-flex align-items-center">
                      <div class="circle circle-md bg-secondary">
                        <span class="fe fe-folder fe-16 text-white"></span>
                      </div>
                      <div class="flex-fill ml-4 fname">
                        <strong>Components</strong><br />
                        <span class="badge badge-light text-muted">3 files</span>
                        <i class="fe fe-users fe-12 ml-2 text-muted"></i>
                      </div>
                    <div class="file-action">
                        <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu m-2">
                        <a class="dropdown-item" href="#"><i class="fe fe-chevrons-right fe-12 mr-4"></i>Move</a>
                        <a class="dropdown-item" href="#"><i class="fe fe-copy fe-12 mr-4"></i>Copy</a>
                        <a class="dropdown-item" href="#"><i class="fe fe-edit-3 fe-12 mr-4"></i>Rename</a>
                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                        <a class="dropdown-item" href="#"><i class="fe fe-share fe-12 mr-4"></i>Share</a>
                        <a class="dropdown-item" href="#"><i class="fe fe-download fe-12 mr-4"></i>Download</a>
                        </div>
                    </div>
                    </div>
                  </div> <!-- .card-body -->
                </div> <!-- .card -->
              </div> <!-- .col -->
            </div> <!-- .row -->
            <hr class="my-4">

        </div> <!-- .file-container -->
      </div> <!-- .col -->  
      
      
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
  
</main> <!-- main -->

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
    dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
    
@endsection
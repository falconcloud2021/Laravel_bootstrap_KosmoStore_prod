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
      <div class="row justify-content-center">
        <div class="col-12 mx-auto">
          <div class="row items-align-center my-4  d-none d-lg-flex">
              <div class="col-md">
                <ul class="nav nav-pills justify-content-start">
                  <li class="nav-item">
                    <a class="nav-link active bg-transparent pr-2 pl-0 text-primary" href="#">Всього <span class="badge badge-pill bg-primary text-white ml-2">164</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted px-1" href="#">Active <span class="badge badge-pill bg-success border text-white ml-2">64</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted px-1" href="#">Hold <span class="badge badge-pill bg-info border text-white ml-2">48</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted px-1" href="#">Stop <span class="badge badge-pill bg-danger border text-white ml-2">52</span></a>
                  </li>
                </ul>
              </div>
              <div class="col-md-auto ml-auto text-right">
                <div class="row">                                                                                           
                  <span class="small bg-white border py-1 px-2 rounded mr-1">                  
                    <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                    <span class="text-muted">Status : <strong>Active</strong></span>                                                        
                  </span>            
                  <span class="small bg-white border py-1 px-2 rounded mr-2">
                    <div id="reportrange" class="text-muted">
                      <i class="fe fe-calendar fe-16 mx-1"></i>
                      <span></span>
                    </div>
                  </span>              
                  <button type="button" class="btn" data-toggle="modal" data-target=".modal-slide"><span class="fe fe-filter fe-16 text-muted"></span></button>
                  <button type="button" class="btn"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 my-3">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <strong class="card-title">Sparkline Bar</strong>
                        <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span class="text-muted">37.7%</span></p>
                      </div>
                      <div class="col-4 text-right">
                        <span class="sparkline inlinebar"></span>
                      </div>
                    </div> <!-- /. row -->
                  </div> <!-- /. card-body -->
                </div> <!-- /. card -->
              </div> <!-- /. col -->
              <div class="col-md-3 my-3">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <strong class="card-title">Sparkline line</strong>
                        <p class="small mb-0"><span class="fe fe-12 fe-arrow-down text-danger"></span><span class="text-muted">-6.8%</span></p>
                      </div>
                      <div class="col-4 text-right">
                        <span class="sparkline inlineline"></span>
                      </div>
                    </div> <!-- /. row -->
                  </div> <!-- /. card-body -->
                </div> <!-- /. card -->
              </div> <!-- /. col -->
              <div class="col-md-3 my-3">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <strong class="card-title">Sparkline line</strong>
                        <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span class="text-muted">32.7%</span></p>
                      </div>
                      <div class="col-4 text-right">
                        <span class="sparkline inlinepie"></span>
                      </div>
                    </div> <!-- /. row -->
                  </div> <!-- /. card-body -->
                </div> <!-- /. card -->
              </div> <!-- /. col -->
              <div class="col-md-3 my-3">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <strong class="card-title">Sparkline line</strong>
                        <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span class="text-muted">32.7%</span></p>
                      </div>
                      <div class="col-4 text-right">
                        <span class="sparkline inlinepie"></span>
                      </div>
                    </div> <!-- /. row -->
                  </div> <!-- /. card-body -->
                </div> <!-- /. card -->
              </div> <!-- /. col -->
            </div> <!-- end section -->

              <div class="row">
                <div class="col-md-3 my-4">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <p class="small mb-3"><strong>RAM</strong></p>
                      <div id="gauge2" class="gauge-container mx-auto">
                      </div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
                <div class="col-md-3 my-4">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <p class="small mb-3"><strong>Disk</strong></p>
                      <div id="gauge3" class="gauge-container g3 mx-auto">
                      </div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
                <div class="col-md-3 my-4">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <p class="small mb-3"><strong>Network</strong></p>
                      <div id="gauge4" class="gauge-container g4 mx-auto">
                        <span class="value-text text-muted small">MB/s</span>
                      </div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
              </div> <!-- end section -->

              <!-- Charts -->
              <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title mb-0">Column Chart</strong>
                    </div>
                    <div class="card-body">
                      <div id="columnChart"></div>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /. col -->
                <div class="col-12 col-lg-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title mb-0">Bar Chart</strong>
                    </div>
                    <div class="card-body">
                      <div id="barChart"></div>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /. col -->
              </div>

              <!-- Apex Radialbar Charts -->
              <div class="row">
                <div class="col-md-3 my-3">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <div id="radialbar"></div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
                <div class="col-md-3 my-3">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <div id="multiRadialbar"></div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
                <div class="col-md-3 my-3">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <div id="gradientRadial"></div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
                <div class="col-md-3 my-3">
                  <div class="card shadow">
                    <div class="card-body text-center">
                      <div id="strokeRadial"></div>
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- /. col -->
              </div> <!-- end section -->

              <!-- Charts -->
              <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title mb-0">Line Chart</strong>
                    </div>
                    <div class="card-body">
                      <div id="lineChart"></div>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /. col -->
                <div class="col-12 col-lg-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title mb-0">Area Chart</strong>
                    </div>
                    <div class="card-body">
                      <div id="areaChart"></div>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /. col -->
              </div>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
          
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row items-align-center my-4  d-none d-lg-flex">
                <div class="col-md">
                  <ul class="nav nav-pills justify-content-start">
                    <li class="nav-item">
                      <a class="nav-link active bg-transparent pr-2 pl-0 text-primary" href="#">Всього <span class="badge badge-pill bg-primary text-white ml-2">164</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-1" href="#">Active <span class="badge badge-pill bg-success border text-white ml-2">64</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-1" href="#">Hold <span class="badge badge-pill bg-info border text-white ml-2">48</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-muted px-1" href="#">Stop <span class="badge badge-pill bg-danger border text-white ml-2">52</span></a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-auto ml-auto text-right">
                  <div class="row"> 
                      <select class="form-control select2-multi" id="multi-select2">                     
                        <option value="Active">Active</option>
                        <option value="Hold">Hold</option>
                        <option value="Stop">Stop</option>                                                                     
                      </select>           
                    <span class="small bg-white border py-1 px-2 rounded mr-2">
                      <div id="reportrange" class="text-muted">
                        <i class="fe fe-calendar fe-16 mx-1"></i>
                        <span></span>
                      </div>
                    </span>              
                    <button type="button" class="btn" data-toggle="modal" data-target=".modal-slide"><span class="fe fe-filter fe-16 text-muted"></span></button>
                    <button type="button" class="btn"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                  </div>
                </div>
              </div>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Дата</th>
                            <th>Бренд</th>
                            <th>Лого</th>
                            <th>Рейтинг</th>
                            <th>Дотиків</th>
                            <th>Чек</th>
                            <th>Статус</th>
                            <th>Ред-я</th>
                            <th>ID</th>
                            <th>Дії</th>
                          </tr>
                        </thead>
                        <tbody>                      
                          @foreach ($brandsChart as $key => $brand)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                              <div class="col-auto">
                                <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="badge badge-info"><i class="fe fe-clock"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  @if (!empty($brand->created_at))
                                    <small>Створено: {{ $brand->created_at }}</small>
                                  @endif
                                  @if (!empty($brand->updated_at))
                                    <small>Редаг-но: {{ $brand->updated_at }}</small>
                                  @endif
                                  @if (!empty($brand->deleted_at))
                                    <small>Видалено: {{ $brand->deleted_at }}</small>
                                  @endif                                
                                </div>
                              </div>
                            </td>
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
                                  <strong><small>{{ $brand->brand_rated }}  %</small></strong>
                                <div class="progress mt-2" style="height: 4px;">
                                  <div class="progress-bar" role="progressbar" style="width: {{ $brand->brand_rated }}%" 
                                    aria-valuenow="{{ $brand->brand_rated }}" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td><small>{{ $brand->brand_touches }}</small></td>
                            <td>
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="{{ $brand->id }}" checked>
                                <label class="custom-control-label" for="{{ $brand->id }}"></label>
                              </div>
                            </td>
                            <td>
                              <div class="col-auto">
                                @if($brand->brand_status == 'active')
                                  <span class="badge badge-success"><i class="fe fe-smile mr-1"></i>Active</span>
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
                                <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="badge badge-primary"><i class="fe fe-user-check"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  @if (empty($brand->created_by || $brand->updated_by || $brand->deleted_by))
                                      <span><i class="fe fe-x-circle mr-1"></i>Відсутні дані про автора!</span>    
                                  @else
                                      @if (!empty($brand->created_by))
                                        <small>Створив: {{ $brand->created_by }}</small>
                                      @endif
                                      @if (!empty($brand->updated_by))
                                        <small>Редаг-в: {{ $brand->updated_by }}</small>
                                      @endif
                                      @if (!empty($brand->deleted_by))
                                        <small>Видалив: {{ $brand->deleted_by }}</small>
                                      @endif                                  
                                  @endif                                                            
                                </div>
                              </div>
                            </td> 
                            <td>{{$brand->id}}</td>               
                            <td>
                              <div class="col-auto">
                                <button class="btn dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->   
        
    </div> <!-- .col-xl-12 -->
  </div> <!-- .container-fluid -->


</main> <!-- main -->
   
@endsection
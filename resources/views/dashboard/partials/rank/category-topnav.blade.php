<div class="col-xl-12">
  <div class="row align-items-center my-1">
    <div class="col">
        <h5>Розділ "Категорії"</h5>
    </div>
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
  </div>        
</div> <!-- .col-xl-12 -->
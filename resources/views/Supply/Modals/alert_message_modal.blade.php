 <!-- The Modal -->
<!--  <div class="modal fade" id="purchasingAlert">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{$head}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          {{$msg}}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div> -->
<div class="modal fade" id="purchasingAlert" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 500px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <legend class="text-center">{{$msg}}</legend>
                    <hr>
                    <div class="row">
                        <div class="offset-5 scol-1">
                            <input type="button"value="Close" data-dismiss="modal" class="btn btn-md btn-danger">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="purchasingConfirm" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <form action="{{ route('purchasing.delete')}}" method="POST">
                        {{ csrf_field() }}
                        <legend class="text-center">Are you sure to delete this order?</legend>
                        <input type="hidden" name="delete_id" id="delete_id" value="">
                        <hr>
                        <div class="row">
                            <div class="offset-4 col-1">
                                <input type="submit" name="submit" value="Yes" class="btn btn-md btn-success">
                            </div>
                            <div class="offset-1 scol-1">
                                <input type="button" value="No" data-dismiss="modal" class="btn btn-md btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="purchasingConfirmDeliver" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <form action="{{ route('purchasing.delete_deliver')}}" method="POST">
                        {{ csrf_field() }}
                        <legend class="text-center">Are you sure to delete this delivered purchase order?</legend>
                        <input type="hidden" name="delete_id" id="delete_deli_id" value="">
                        <hr>
                        <div class="row">
                            <div class="offset-4 col-1">
                                <input type="submit" name="submit" value="Yes" class="btn btn-md btn-success">
                            </div>
                            <div class="offset-1 scol-1">
                                <input type="button" value="No" data-dismiss="modal" class="btn btn-md btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="purchasingConfirmArchive" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <form action="{{ route('purchasing.kill')}}" method="POST">
                        {{ csrf_field() }}
                        <legend class="text-center">Are you sure to completely delete this archived order?</legend>
                        <input type="hidden" name="delete_id" id="delete_arch_id" value="">
                        <hr>
                        <div class="row">
                            <div class="offset-4 col-1">
                                <input type="submit" name="submit" value="Yes" class="btn btn-md btn-success">
                            </div>
                            <div class="offset-1 scol-1">
                                <input type="button" value="No" data-dismiss="modal" class="btn btn-md btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

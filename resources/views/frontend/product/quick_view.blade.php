@forelse ($products as $pro)

<!-- Modal -->
<div class="modal fade" id="produt{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">QUICK VIEW</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Product ID :</b> {{ $pro->id }}</li>
                            <li class="list-group-item"><b>Product NAME :</b> {{ $pro->name }}</li>
                            <li class="list-group-item"><b>Product PRICE :</b> $ {{ $pro->selling_price }}</li>
                            <li class="list-group-item"><b>Quantity :</b> not specified</li>


                        </ul>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="{{$pro->name}} thumbnail" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach